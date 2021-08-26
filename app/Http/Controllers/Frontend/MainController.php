<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;



class MainController extends Controller
{
    public function index()
    {

        $banners=Banner::where('show',1)->orderBy('order','asc')->get();
        $news=News::where('show',1)->orderBy('updated_at','desc')->get();

        // $categories=Category::where('show',1)->orderBy('order','asc')->get()->groupBy('parent');
        $categories=Category::where([['show',1],['parent',0]])->orderBy('order','asc')->get(); // 只抓主目錄

        $products=Product::where([['show',1],['in_stock','>',1]])->orderBy('updated_at','desc')->get();

        $data=[
            'banners'=>$banners,
            'news'=>$news,
            'categories'=>$categories,
            'products'=>$products,
        ];
        // dd($data);
        return view('frontend.main', $data);
    }

}
