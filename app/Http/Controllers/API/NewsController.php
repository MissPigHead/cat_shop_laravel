<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function index() // 取全部
    {
        return News::all();
    }

    public function store(NewsRequest $request) // 儲存資料
    {
        $data = $request->all();
        if ($data) {
            $news = News::make($request->all());
            if ($request->hasFile('image_path')) {
                $news->image_path = $this->saveFile($request->image_path); // 存圖片
            } else {
                $news->image_path = '';
            }
            $news->save();
            return back();
        } else {
            return back()->withInput();
        }
    }

    public function show($id) // 取得id資料
    {
        $news = News::findOrFail($id);
        return $news;
    }

    public function update(Request $request, $id) // 更新id資料
    {
        $news = News::find($id);
        $news->update($request->all());
    }

    public function destroy($id) // 刪除id資料
    {
        $news = News::find($id);
        if (File::exists(public_path($news->image_path))) { // 先檢查檔案是否存在，不存在就不用處理了
            Storage::move("public/" . substr($news->image_path, 9), "user_delete/" . substr($news->image_path, 9)); // 暫時移到這個路徑，再定期刪除（！？）
        }
        News::destroy($id);
    }

    public function updateWithFile(NewsRequest $request) // 先存圖片 再更新資料 這個update是用POST！
    {
        /* 撈出要更新的資料 */
        $re = $request->input();
        $news = News::find($re['id']);
        $re['image_path'] = '';

        /* 處理圖片*/
        if ($request->image_path) { // 有上傳圖片
            if ($news->image_path) { // 移除舊圖片
                if (File::exists(public_path($news->image_path))) { // 先檢查檔案是否存在，不存在就不用處理了
                    Storage::move("public/" . substr($news->image_path, 9), "user_delete/" . substr($news->image_path, 9)); // 暫時移到這個路徑，再定期刪除（！？）
                }
            }
            $re['image_path'] = $this->saveFile($request->image_path); // 將新的圖片路徑寫到更新資料中
        } else { // 無上傳圖片
            if ($news->image_path) { // 有舊圖片
                if ($request->original_image) { // 沿用舊圖不變化
                    $re['image_path'] = $news->image_path;
                } else { // 刪除舊圖，不再使用圖片
                    if (File::exists(public_path($news->image_path))) {
                        Storage::move("public" . substr($news->image_path, 8), "user_delete" . substr($news->image_path, 8));
                    }
                }
            } // else 一直都不使用圖片
        }

        /* 整理要做更新的項目，將資料更新到資料庫 */
        unset($re['_token']);
        unset($re['original_image']);

        $news->update($re);
        return back();
    }

    public function saveFile($file) // 儲存圖片，回傳圖片public讀取路徑
    {
        $storage_path = "public/news";
        $file_name = $file->hashName(); // 雜湊名稱
        $file->storeAs($storage_path, $file_name); // 將image 存到指定路徑
        $public_path = "/storage/news/" . $file_name; // 圖片路徑
        return $public_path;
    }
}
