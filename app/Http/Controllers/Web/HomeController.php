<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResources;
use App\Http\Resources\Category as CategoryResources;


use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use App\Models\Product;
use App\Models\Category;

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
        $news = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id', 'title']);
        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->limit(9)->get();
        return view('frontend.main', ['banners' => $banners, 'news' => $news, 'products' => $products]);
    }

    public function categoryShow($id)
    {
        if ($id == 'all') {
            $categories = CategoryResources::collection(Category::orderBy('order')->get())->groupBy('parent');
            $p = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc');
            // $p = Product::with('category')->where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc');
        }
        // return
        $products= ProductResources::collection($p->paginate(12));
        return view('frontend.category', ['categories' => $categories, 'products' => $products]);
    }

    public function news()
    {
        $newsList = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id', 'title']);
        $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get(['image_path', 'text']);
        return view('frontend.news', ['newsList' => $newsList, 'banners' => $banners]);
    }

    public function user()
    {
        return view('frontend.personal');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function orders()
    {
        return view('frontend.orderHistory');
    }

    public function newsShow($id)
    {
        $news = News::findOrFail($id);
        $newsList = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id', 'title']);
        return view('frontend.newsDetail', ['news' => $news, 'newsList' => $newsList]);
    }

    public function productShow($id)
    {
        // return "productDetails".$id;
        return view('frontend.product');
    }

    public function orderShow($id)
    {
        return "Order" . $id;
    }
}
