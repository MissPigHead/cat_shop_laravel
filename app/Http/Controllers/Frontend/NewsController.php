<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Banner;


class NewsController extends Controller
{
    public function index()
    {
        $banners = Banner::where('show', 1)->orderBy('order', 'asc')->get(['image_path','text']);
        return view('frontend.news', ['newsList' => $this->list(), 'banners' => $banners]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('frontend.newsDetail', ['news' => $news, 'newsList' => $this->list()]);
    }

    public function list()
    {
        $newsList = News::where('show', 1)->orderBy('updated_at', 'desc')->get(['id','title']);
        return $newsList;
    }
}
