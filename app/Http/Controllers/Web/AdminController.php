<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Resources\Banner as BannerResource;
use App\Http\Resources\Product as ProductResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function main() // 資料未塞入
    {
        return view('backend.main');
    }

    public function banner()
    {
        $banners=Banner::orderBy('order','asc')->paginate(3);
        return view('backend.banner', ['banners' => $banners]);
    }

    public function category() // 資料未塞入
    {
        return view('backend.main');
    }

    public function news()
    {
        $news=News::orderBy('updated_at','desc')->paginate(5);
        return view('backend.news', ['news' => $news]);
    }

    public function order() // 資料未塞入
    {
        return view('backend.main');
    }

    public function product($c_id) // 資料未塞入
    {
        $categories=Category::orderBy('parent')->orderBy('order')->get()->groupBy('parent');
        if($c_id=='all'){
            $products=Product::orderBy('category_id','asc')->orderBy('order','asc')->paginate(10);
        }else{
            $products=Product::where('category_id',$c_id)->orderBy('category_id','asc')->orderBy('order','asc')->paginate(10);
        }
        return view('backend.products', ['products'=>$products,'categories'=>$categories,'now'=>$c_id??'all']);
    }

    public function user()
    {
        $users=User::where('role','user')->paginate(10);
        return view('backend.user', ['users' => $users]);
    }
}
