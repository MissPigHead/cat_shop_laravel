<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.main');
    }
}
