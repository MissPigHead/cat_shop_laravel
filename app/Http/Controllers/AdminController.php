<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    public function index(){
        return view('backend.main');
    }
    public function content($content){
        switch($content){
            case('news'):
                $news=News::orderBy('updated_at','desc')->get();
                $data=['news'=>$news];
            break;
            default:
                $data=[];
            break;
        }
        return view('backend.'.$content,$data);
    }
}
