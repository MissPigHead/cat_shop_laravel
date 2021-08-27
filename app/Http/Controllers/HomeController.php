<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use App\Models\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    // 上面全部是原來框架的內容

    public function frontend()
    {
        $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get();
        $news = News::where('show', 1)->orderBy('updated_at', 'desc')->get();
        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->get();

        $data = [
            'banners' => $banners,
            'news' => $news,
            'products' => $products,
        ];
        // dd($data);
        return view('frontend.main', $data);
    }

    public function backend()
    {
        return view('backend.main');
    }

}
