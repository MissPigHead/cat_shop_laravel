<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $cart = Cart::firstOrNew(['user_id' => $request->user_id, 'product_id' => $request->product_id]);
        if (!empty($cart->id)) {
            $this->update($request, $cart->id);
        } else {
            $in_stock = Product::find($request->product_id)->get('in_stock');
            $request->quantity = ($request->quantity < $in_stock) ? $request->quantity : $in_stock;
            Cart::create($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::with('product')->find($id);
        $cart->quantity = (($cart->quantity + $request->quantity) < $cart->product->in_stock) ? ($cart->quantity + $request->quantity) : $cart->product->in_stock;
        $cart->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (strpos($id, ',')) { // 檢查id 是單個還是多個
            $id = explode(',', $id); //把應該是陣列的字串轉囘陣列
        }
        Cart::destroy($id);
    }
}
