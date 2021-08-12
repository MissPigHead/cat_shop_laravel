<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
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
      $originBanner=Banner::find($id);
      $originBannerOrder=$originBanner->order;

      $replacedBannerID=Banner::orderBy('order','asc')->skip($request->skip)->take(1)->value('id');

      $replacedBanner=Banner::find($replacedBannerID);
      $replacedBannerOrder=$replacedBanner->order;

      $originBanner->update(['order'=>$replacedBannerOrder]);
      $replacedBanner->update(['order'=>$originBannerOrder]);
    }
}
