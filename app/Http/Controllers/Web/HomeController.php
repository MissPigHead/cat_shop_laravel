<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResources;

use App\Models\Banner;
use App\Models\News;
use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $categories = Category::where([['show', 1], ['parent', 0]])->orderBy('order', 'asc')->get();
        view()->share('mainCategories', $categories);
    }

    public function main()
    {
        $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get(['image_path', 'text']);
        $news = News::where('show', 1)->orderBy('updated_at', 'desc')->take(6)->get(['id', 'title']);
        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->limit(9)->get();
        return view('frontend.main', ['banners' => $banners, 'news' => $news, 'products' => $products]);
    }

    public function getCategories($id)
    {
        $categories = Category::where('show', 1)->orderBy('order')->get()->groupBy('parent');
        if ($id == 'all') {
            $products = Product::where([['show', 1], ['in_stock', '>', 1]])
                ->whereIn('category_id', Category::where('show', 1)->orderBy('order')->get('id'))
                ->orderBy('updated_at', 'desc')
                ->paginate(12);
            $title = '所有商品';
        } else {
            $cate_breadcrumb = Category::findOrFail($id);
            if ($cate_breadcrumb->parent != 0) {
                $products = Product::where([['show', 1], ['category_id', $id], ['in_stock', '>', 1]])
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            } else {
                $products = Product::whereHas('category', function ($query) use ($id) {
                    $query->where('parent', $id)->where('show', '1');
                })
                    ->where([['show', 1], ['in_stock', '>', 1]])
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            }
            $title = $cate_breadcrumb->title;
        }
        $data = [
            'categories' => $categories,
            'products' => $products,
            'cate_breadcrumb' => $cate_breadcrumb ?? '',
            'title' => $title, 'include' => 'products'
        ];
        return $data;
    }

    public function category($id)
    {
        $data = $this->getCategories($id);
        return view('frontend.category', $data);
    }

    public function user()
    {
        $cities = City::get();
        return view('frontend.personal', ['cities' => $cities]);
    }

    public function recipient()
    {
        $recipients = Auth::user()->recipients;
        $cities = City::get();
        return view('frontend.recipient', ['recipients' => $recipients, 'cities' => $cities]);
    }

    public function cart()
    {
        $items = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        return view('frontend.cart', ['items' => $items]);
    }


    public function news($id)
    {
        if ($id == 'all') {
            $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get(['image_path', 'text']);
        } else {
            $news = News::findOrFail($id);
        }
        $newsList = News::select(['id', 'title'])->where('show', 1)->orderBy('updated_at', 'desc')->paginate(6);
        return view('frontend.news', ['news' => $news ?? '', 'newsList' => $newsList, 'banners' => $banners ?? '']);
    }

    public function product($id)
    {
        $product = Product::find($id);
        if (!isset($product)) { // 商品不存在
            return redirect('category/all')->with('msg', '無此商品');
        } else {
            if ($product->in_stock == 0) { // 銷售完畢暫無存貨
                return redirect('category/all')->with('msg', '商品銷售一空，請待補貨');
            } elseif ($product->show == 0 || $product->category->show == 0) { // 商品或目錄被下架
                return redirect('category/all')->with('msg', '商品尚未上架');
            } else {
                $data = $this->getCategories($product->category_id);
                $data['title'] = $product->name;
                $data['product'] = $product;
                $data['include'] = 'productDetail';
                return view('frontend.category', $data);
            }
        }
    }

    public function order()
    {
        return view('frontend.orderHistory');
    }

    public function orderShow($id)
    {
        return "Order" . $id;
    }
}
