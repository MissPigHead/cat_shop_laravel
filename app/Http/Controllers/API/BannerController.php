<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order', 'asc')->get();
        return view('backend.banner', ['banners' => $banners,]);
    }

    public function store(BannerRequest $request)
    {
        $data = $request->all();
        if ($data) {
            $banner = Banner::make($request->all());
            $banner->image_path = $this->saveFile($request->image_path); // 存圖片
            $banner->order = Banner::max('order') + 1;
            $banner->save();
            return back();
        } else {
            return back()->withInput();
        }
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return $banner;
    }

    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::find($id);
        $banner->update($request->all());
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        if (File::exists(public_path($banner->image_path))) { // 先檢查檔案是否存在，不存在就不用處理了
            Storage::move("public/" . substr($banner->image_path, 9), "user_delete/" . substr($banner->image_path, 9)); // 暫時移到這個路徑，再定期刪除（！？）
        }
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

    public function saveFile($file) // 儲存圖片，回傳圖片public讀取路徑
    {
        $storage_path = "public/banner";
        $file_name = $file->hashName(); // 雜湊名稱
        $file->storeAs($storage_path, $file_name); // 將image 存到指定路徑
        $public_path = "/storage/banner" . "/" . $file_name; // 圖片路徑
        return $public_path;
    }
}
