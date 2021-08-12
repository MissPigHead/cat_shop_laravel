<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category= new Category();
        $category->title=$request->title;
        $category->parent=$request->parent;
        $category->show=false;
        $category->order=Category::where('parent',($request->parent))->max('order')+1;
        $category->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category = Category::findOrFail($id);
      return $category;
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
      $category = Category::find($id);
      $category->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
      // $preCate=Category::where('parent',$originCate->parent)->orderBy('order','asc')->skip($request->order-2)->take(1)->get();
      // 這個方法取回的資料是物件陣列=Collection；上面的方法取回的是Model，不一樣！！
      // Model: {"id":3,"title":"Parent2","parent":0,"show":1}
      // Collection: [{"id":3,"title":"Parent2","parent":0,"show":1}]

      $originCate->update(['order'=>$preCateOrder]);
      $preCate->update(['order'=>$originCateOrder]);
    }
}

