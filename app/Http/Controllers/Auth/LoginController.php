<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Category;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {
        $this->middleware('guest')->except('logout');
        $categories = Category::where([['show', 1], ['parent', 0]])->orderBy('order', 'asc')->get(); // 只抓主目錄
        view()->share('mainCategories', $categories);
    }

    public function showLoginForm() // 調用AuthenticatesUsers 後 改寫裡面登入的頁面
    {
        $this->middleware('guest')->except('logout');
        return view('frontend.login');
    }
}
