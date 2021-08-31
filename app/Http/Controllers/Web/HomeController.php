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
        $news = News::where('show', 1)->orderBy('updated_at', 'desc')->take(6)->get(['id', 'title']);
        $products = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc')->limit(9)->get();
        return view('frontend.main', ['banners' => $banners, 'news' => $news, 'products' => $products]);
    }

    public function category($id)
    {
        $categories = CategoryResources::collection(Category::orderBy('order')->get())->groupBy('parent');
        // 左側目錄
        if ($id == 'all') {
            $product = Product::where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc');
            // 右側商品
        } else {
            // return
            $cate_breadcrumb = new CategoryResources(Category::find($id));
            // dd($cate_breadcrumb);
            // 右側商品上的麵包屑
            if ($cate_breadcrumb->parent != 0) {

                $product = Product::where([['show', 1], ['category_id', $id], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc');
            } else {
                $product = Product::whereHas('category', function ($query) use ($id) {
                    $query->where('parent', $id);
                })->where([['show', 1], ['in_stock', '>', 1]])->orderBy('updated_at', 'desc');
                // $product =Product::with(['category'=>function($query) use ($id){
                //     $query->where('parent',$id);
                // }]);
                // 1. $query 使用的變數需要先 function ($query) use ($var){...}
                // 2. 關聯部分使用with 是把符合條件的關聯資料抓回，其餘不抓關聯資料，繼續往下走，沒被filter掉
                // 3. 關聯部分使用whereHas 則是把符合條件的關聯資料抓回，其餘不抓且直接被filter掉
            }
        }
        $products = ProductResources::collection($product->paginate(12));
        return view('frontend.category', ['categories' => $categories, 'products' => $products, 'cate_breadcrumb' => $cate_breadcrumb ?? '']);
    }

    public function user()
    {
        return view('frontend.personal');
    }

    public function cart()
    {
        return view('frontend.cart');
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
        // return "productDetails".$id;
        return view('frontend.product');
    }

    public function orders()
    {
        return view('frontend.orderHistory');
    }

    public function orderShow($id)
    {
        return "Order" . $id;
    }
}
