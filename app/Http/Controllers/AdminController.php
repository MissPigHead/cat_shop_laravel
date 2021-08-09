<?php

namespace App\Http\Controllers;

use App\Category as AppCategory;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
  public function index()
  {
    return view('backend.main');
  }

  public function content($content)
  {
    switch ($content) {
      case ('news'):
        $news = News::orderBy('updated_at', 'desc')->get();
        $data = ['news' => $news];
        break;

      case ('category'):
        $parentCategories = Category::where('parent', 0)->orderBy('order', 'asc')->get();
        $data = [
          'parentCategories' => $parentCategories,
        ];
        break;

      default:
        $data = [];
        break;
    }
    return view('backend.' . $content, $data);
  }
}
