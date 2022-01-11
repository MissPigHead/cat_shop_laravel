<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use ECPay_AllInOne;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ord = Order::find(1);
        $ord->order_details;
        $ord->order_details->each(function ($order_detail) {
            $order_detail->product_name;
        });
        dd($ord);

        // $od=OrderDetail::find(10);
        // $od->product_name;
        // dd($od);

        // echo "<pre>";
        // $od->products->each(function($product){
        //     print_r($product);
        // });
        // echo "</pre>";

        return view('backend.order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    function ECPay_Credit($order, $items)
    {
        try {

            $obj = new ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";    //服務位置
            $obj->HashKey     = '5294y06JbISpM5x9';                                             //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = 'v77hoKGq4kWxNNIS';                                             //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = '2000132';                                                      //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                            //CheckMacValue加密類型，請固定填入1，使用SHA256加密

            //基本參數(請依系統規劃自行調整)
            $obj->Send['ReturnURL']         = "https://shop.misspighead.xyz/api/order/credit_success";    //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']     = "https://shop.misspighead.xyz/order/paid";        //Client端返回特店的按鈕連結(付款成功後下方按鈕)

            $obj->Send['MerchantTradeNo']   = $order->ECPay_MerchantTradeNo;                    //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                              //交易時間
            $obj->Send['TotalAmount']       = $order->amount_total;                             //交易金額
            $obj->Send['TradeDesc']         = "喵喵商城信用卡付款測試頁面";                          //交易描述
            $obj->Send['ChoosePayment']     = \ECPay_PaymentMethod::Credit;                     //付款方式:Credit
            $obj->Send['IgnorePayment']     = \ECPay_PaymentMethod::GooglePay;                  //不使用付款方式:GooglePay

            //訂單的商品資料
            foreach ($items as $item) {
                array_push($obj->Send['Items'], $item);
            }

            //Credit信用卡分期付款延伸參數(可依系統需求選擇是否代入)
            //以下參數不可以跟信用卡定期定額參數一起設定
            $obj->SendExtend['CreditInstallment'] = '';    //分期期數，預設0(不分期)，信用卡分期可用參數為:3,6,12,18,24
            $obj->SendExtend['InstallmentAmount'] = 0;    //使用刷卡分期的付款金額，預設0(不分期)
            $obj->SendExtend['Redeem'] = false;           //是否使用紅利折抵，預設false
            $obj->SendExtend['UnionPay'] = false;          //是否為聯營卡，預設false;

            //Credit信用卡定期定額付款延伸參數(可依系統需求選擇是否代入)
            //以下參數不可以跟信用卡分期付款參數一起設定
            // $obj->SendExtend['PeriodAmount'] = '' ;    //每次授權金額，預設空字串
            // $obj->SendExtend['PeriodType']   = '' ;    //週期種類，預設空字串
            // $obj->SendExtend['Frequency']    = '' ;    //執行頻率，預設空字串
            // $obj->SendExtend['ExecTimes']    = '' ;    //執行次數，預設空字串

            # 電子發票參數
            /*
            $obj->Send['InvoiceMark'] = ECPay_InvoiceState::Yes;
            $obj->SendExtend['RelateNumber'] = "Test".time();
            $obj->SendExtend['CustomerEmail'] = 'test@ecpay.com.tw';
            $obj->SendExtend['CustomerPhone'] = '0911222333';
            $obj->SendExtend['TaxType'] = ECPay_TaxType::Dutiable;
            $obj->SendExtend['CustomerAddr'] = '台北市南港區三重路19-2號5樓D棟';
            $obj->SendExtend['InvoiceItems'] = array();
            // 將商品加入電子發票商品列表陣列
            foreach ($obj->Send['Items'] as $info)
            {
                array_push($obj->SendExtend['InvoiceItems'],array('Name' => $info['Name'],'Count' =>
                    $info['Quantity'],'Word' => '個','Price' => $info['Price'],'TaxType' => ECPay_TaxType::Dutiable));
            }
            $obj->SendExtend['InvoiceRemark'] = '測試發票備註';
            $obj->SendExtend['DelayDay'] = '0';
            $obj->SendExtend['InvType'] = ECPay_InvType::General;
            */

            //產生訂單(auto submit至ECPay)
            $obj->CheckOut();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function credit_success(Request $request)
    {

        dump($request);
        $order = Orders::where('ECPay_MerchantTradeNo', '=', $request->MerchantTradeNo)->firstOrFail();
        $order->payment = 1;
        $order->save();
    }

    // public function paid()
    // {
    //     session()->flash('pay_success', 'Order success!');
    //     return redirect('/cart');
    // }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $carts = Auth::user()->carts;

        // 1.購物車轉訂單
        if (count($carts) != 0) {
            $order = Order::make($request->except('purchaserule1', 'purchaserule2', 'purchaserule3'));
            $order->user_id = Auth::user()->id;
            $order->amount_raw = $request->amount_total;
            $order->ECPay_MerchantTradeNo = Str::random(6) . date('YmdHis', time());
            $order->save();

            // 2.購物車商品轉訂單商品項目
            // 3.付款頁面的訂單商品項目
            $items = [];
            foreach ($carts as $cart) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                    'amount' => $cart->product->price * $cart->quantity,
                ]);

                $items[] = [
                    'Name' => $cart->product->name,
                    'Price' => $cart->product->price,
                    'Currency' => '元',
                    'Quantity' => $cart->quantity,
                    'URL' => 'dedweb'
                ];

                // Cart::destroy($cart->id);
            }
            // dump($order);
            // dump($items);
            // 此時訂單狀態為：訂單成立 + payment:0未付款,1已付款 + status:0未出貨, 1已出貨

            // 4. 將訂單資料拋到綠界進行支付程序
            $this->ECPay_Credit($order, $items);

            // 確認付款完成
            // 扣庫存
            // 更改訂單狀態
            // 轉到付款成功頁面

        } else {
            // 沒有資料就轉到購物車
            // 因結帳頁顯示邏輯需有購物車+收件者+勾選條款 才出現結帳選擇，所以不可能出現這個選項
            return back()->with('msg', '請先選購商品');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::findOrFail($id);
        $order->order_details;
        $order->order_details->each(function ($order_detail) {
            $order_detail->product_name;
        });

        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
