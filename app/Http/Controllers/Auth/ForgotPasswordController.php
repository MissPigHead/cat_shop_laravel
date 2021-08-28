<?php
// 讓使用者填email 重設密碼
// 原始框架沒有鎖權限
// 覺得這樣對已登入者而言很麻煩(還沒想完安全問題)
// 先改成只有 guest 使用ForgetPasswordController 去重設密碼
// 若auth user 就直接在個人資訊的form 表單修改

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails; // 需要改的部分就去看這個 trait 再依照它的寫法加進來
use App\Models\Category;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
        $categories = Category::where([['show', 1], ['parent', 0]])->orderBy('order', 'asc')->get(); // 只抓主目錄
        view()->share('mainCategories', $categories);
    }

    public function showLinkRequestForm()
    {
        return view('frontend.setPassword');
    }
}
