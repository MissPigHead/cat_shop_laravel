<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image; // 最後沒用到就刪掉
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('order', 'asc')->get();
        $data = [
          'banners' => $banners,
        ];
        return view('backend.banner', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dir_sub = "banner";

        $storage_path = "public/" . $dir_sub;

        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
        ]); // 驗證失敗的部分，還沒寫

        $file_name = time() . $request->image->getClientOriginalName();

        $request->image->storeAs($storage_path, $file_name);
        // 以上是將image 存到public 指定路徑


        // 以下是寫入資料庫內容
        $public_path = "/storage/" . $dir_sub . "/" . $file_name;

        $banner=Banner::make([
            'text'=>$request->text,
            'image_path'=>$public_path,
            'order'=>Banner::max('order')+1,
        ]);
        $banner->save();

        // // 取得目前處理的圖片 對外連接網址
        // $url=asset($public_path);

        return redirect('/admin/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return $banner;
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
        $banner = Banner::find($id);
        $banner->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);
    }

    public function move(Request $request, $id)
    {
        $originBanner = Banner::find($id);
        $originBannerOrder = $originBanner->order;

        $replacedBannerID = Banner::orderBy('order', 'asc')->skip($request->skip)->take(1)->value('id');

        $replacedBanner = Banner::find($replacedBannerID);
        $replacedBannerOrder = $replacedBanner->order;

        $originBanner->update(['order' => $replacedBannerOrder]);
        $replacedBanner->update(['order' => $originBannerOrder]);
    }
}
