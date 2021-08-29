<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function main() // 資料未塞入
    {
        return view('backend.main');
    }

    public function banner()
    {
        $b= new BannerController;
        $banners=$b->index()->sortBy('order');
        // $banners=$b->index()->sortBy('order')->paginage(2);
        return view('backend.banner', ['banners' => $banners]);
    }

    public function category() // 資料未塞入
    {
        return view('backend.main');
    }

    public function news()
    {
        $n=new NewsController;
        $news=$n->index()->sortByDesc('updated_at');
        return view('backend.news', ['news' => $news]);
    }

    public function order() // 資料未塞入
    {
        return view('backend.main');
    }

    public function product() // 資料未塞入
    {
        $data=ProductResource::collection(Product::with('category')->paginate(10));

        // return ($products);
        return view('backend.products', ['data'=>$data]);
    }

    public function user()
    {
        $u=new UserController;
        $users=$u->index();
        return view('backend.user', ['users' => $users]);
    }
}
