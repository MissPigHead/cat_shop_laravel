<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 取全部
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
    public function store(Request $request) // 儲存資料
    {
        $news = News::make($request->all());

        if ($request->hasFile('image')) {
            $dir_sub = "news";
            $storage_path = "public/" . $dir_sub;
            // $request->validate([
            //     'image' => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
            // ]); // 驗證失敗的部分，還沒寫
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->storeAs($storage_path, $file_name);
            // 以上是將image 存到public 指定路徑

            // 以下是寫入資料庫內容
            $public_path = "/storage/" . $dir_sub . "/" . $file_name;

            $news->image_path = $public_path;
        }

        $news->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // 取得id資料
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
    public function update(Request $request, $id) // 更新id資料
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
    public function destroy($id) // 刪除id資料
    {
        News::destroy($id);
    }

    public function updateWithFile(Request $request) //先存圖片 再更新資料
    {
        /* 驗證 */
        $rules = [
            'title' => 'required|max:30',
            'article' => 'required|max:1000',
            'image' => 'mimes:jpg,jpeg,bmp,png|max:2048',
        ];
        $message = [
            'title.required' => '標題不得為空白',
            'title.max' => '最多30個字',
            'article.required' => '內容不得為空白',
            'article.max' => '最多1000個字',
            'image.mimes' => '請使用 jpg, jpeg, bmp, png 圖片',
            'image.max' => '圖片尺寸需在2MB以下'
        ];
        $re = $request->validate($rules, $message);

        /* 撈出要更新的資料 */
        $re = $request->input();
        $news = News::find($re['id']);
        /* 處理圖片*/
        if ($request->image) { // 有上傳圖片
            if ($news->image_path) { // 修改：有回傳圖片檔案 / 有舊圖片路徑; 移除舊圖片
                if (File::exists($news->image_path)) {
                    Storage::move("public" . substr($news->image_path, 8), "user_delete" . substr($news->image_path, 8)); // 暫時移到這個路徑，再定期刪除（！？）
                    File::delete($path); // 刪除

                    File::replace($path, $content); // 写入文件，存在的话覆盖写入

                }
            } // else 新增：有回傳圖片檔案 / 無舊圖片路徑; 單純新增圖片
            $public_path = $this->saveFile($request->image); // 存圖片
        } else { // 無上傳圖片
            if ($news->image_path) { // 無回傳圖片檔案 / 有舊圖片路徑 >> 有可能沿用舊圖 or 刪除圖片
                if ($request->original_image) { // 沿用舊圖不變化
                    $public_path = $news->image_path;
                } else { // 刪除舊圖，不再使用圖片
                    if (File::exists($news->image_path)) {
                        Storage::move("public" . substr($news->image_path, 8), "user_delete" . substr($news->image_path, 8)); // 暫時移到這個路徑，再定期刪除（！？）
                    }
                    $public_path = '';
                }
            } else { // 一直都不使用圖片：無回傳圖片檔案 / 無舊圖片路徑
                $public_path = '';
            }
        }

        /* 整理要做更新的項目 */
        $re['image_path'] = $public_path;
        unset($re['_token']);
        unset($re['id']);

        $news->update($re);

        return back();
    }

    public function saveFile($file) // 儲存圖片，回傳圖片public路徑
    {
        $dir_sub = "news";
        $storage_path = "public/" . $dir_sub;
        // $file_name = time() . $request->image->hashName(); // 雜湊名稱
        $file_name = time() . $file->hashName(); // 雜湊名稱
        // $file_name = time() . $request->image->getClientOriginalName(); // 原始檔名
        $file->storeAs($storage_path, $file_name); // 將image 存到指定路徑
        $public_path = "/storage/" . $dir_sub . "/" . $file_name; // 圖片路徑
        return $public_path;
    }

}
