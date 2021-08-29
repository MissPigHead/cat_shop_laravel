<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function main()
    {
        $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get(['image_path', 'text']);
        $news = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id', 'title']);
        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->limit(9)->get();
        return view('frontend.main', ['banners' => $banners, 'news' => $news, 'products' => $products]);
    }

    public function category()
    {
        $categories = Category::where([['show', 1], ['parent', 0]])->orderBy('order', 'asc')->get(); // 只抓主目錄

        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->get();

        $data = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('frontend.categories', $data);
    }

    public function categoryShow()
    {
        $categories = Category::where([['show', 1], ['parent', 0]])->orderBy('order', 'asc')->get(); // 只抓主目錄

        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->get();

        $data = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('frontend.categories', $data);
    }

    public function news()
    {
        $newsList = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id','title']);
        $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get(['image_path', 'text']);
        return view('frontend.news', ['newsList' => $newsList, 'banners' => $banners]);
    }

    public function product()
    {
        $data = [];
        // dd($data);
        return view('frontend.products', $data);
    }

    public function user()
    {
        return view('frontend.personal');
    }

    public function cart($id)
    {
        return view('frontend.cart');
    }

    public function orders($id)
    {
        return view('frontend.orderHistory');
    }

        public function newsDetail($id)
    {
        $news = News::findOrFail($id);
        $newsList = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id','title']);
        return view('frontend.newsDetail', ['news' => $news, 'newsList' => $newsList]);
    }
        public function productDetails($id)
    {
        return "productDetails".$id;
    }
}



// class UserController extends Controller
// {
//     public function show($id)
//     {
//         return new UserResource(User::with('recipients')->find(1));
//         // $user=UserResource::collection(User::with('recipients')->with('orders')->find(1));
//         // dd($user);

//         // $user = User::find($id);
//         // return view('frontend.personal', ['user' => $user]);
//     }
// }
