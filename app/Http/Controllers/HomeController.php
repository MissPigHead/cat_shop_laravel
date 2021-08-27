<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function frontend()
    {
        $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get(['image_path', 'text']);
        $news = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id', 'title']);
        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->limit(9)->get();
        return view('frontend.main', ['banners' => $banners,'news' => $news,'products' => $products]);
    }

    public function backend()
    {
        return view('backend.main');
    }
}
