<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Facade\FlareClient\Http\Response;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->get();
        $data = ['news' => $news];
        return view('backend.news', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $news=News::make($request->all());

        // if($request->hasFile('image')){
        //     $dir_sub = "news";
        //     $storage_path = "public/" . $dir_sub;
        //     $request->validate([
        //         'image' => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
        //     ]); // 驗證失敗的部分，還沒寫
        //     $file_name = time() . $request->image->getClientOriginalName();
        //     $request->image->storeAs($storage_path, $file_name);
        //     // 以上是將image 存到public 指定路徑

        //     // 以下是寫入資料庫內容
        //     $public_path = "/storage/" . $dir_sub . "/" . $file_name;

        //     $news->image_path=$public_path;
        // }

        // $news->save();
        // return redirect('/admin/news');

        return back()->withError('There was an error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return $news;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
    }

    public function updateWithFile(Request $request)
    {
        $dir_sub = "news";

        $storage_path = "public/" . $dir_sub;

        // $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
        // ]);
        // 驗證的部分，還沒寫
        // 更新圖片 是否刪除舊圖片 如何刪除或辨識

        // $file_name = time() . $request->image->getClientOriginalName(); // 原始檔名
        $file_name = time() . $request->image->hashName(); // 雜湊名稱

        $request->image->storeAs($storage_path, $file_name);
        // 以上是將image 存到public 指定路徑

        $public_path = "/storage/" . $dir_sub . "/" . $file_name;
        // 以上是寫入資料庫內容

        $request->image_path = $public_path;

        $re = $request->input();
        $re['image_path'] = $public_path;

        $news = News::find($re['id']);
        unset($re['_token']);
        unset($re['id']);

        $news->update($re);

        return redirect('/admin/news');
    }
}
