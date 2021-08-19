<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $parentCategories = Category::where('parent', 0)->orderBy('order', 'asc')->get();
        return view('backend.category',['parentCategories' => $parentCategories]);
    }

    public function store(CategoryRequest $request)
    {
        $category=Category::make($request->all());
        $category->order=Category::where('parent',($request->parent))->max('order')+1;
        $category->save();
    }

    public function show($id)
    {
      $category = Category::findOrFail($id);
      return $category;
    }

    public function update(CategoryRequest $request, $id)
    {
      $category = Category::find($id);
      $category->update($request->all());
    }

    public function destroy($id)
    {
        Category::destroy($id);
        Category::where('parent',$id)->delete(); // 連同子目錄一併刪除
    }

    public function child($id)
    {
      $childCategories=Category::where('parent',$id)->orderBy('order','desc')->get();
      return $childCategories;
    }

    public function move(Request $request, $id)
    {
      $originCate=Category::find($id);
      $originCateOrder=$originCate->order;

      $preCateID=Category::where('parent',$originCate->parent)->orderBy('order','asc')->skip($request->skip)->take(1)->value('id');

      $preCate=Category::find($preCateID);
      $preCateOrder=$preCate->order;

      $originCate->update(['order'=>$preCateOrder]);
      $preCate->update(['order'=>$originCateOrder]);
    }
}

