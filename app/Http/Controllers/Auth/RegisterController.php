<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider; // 註冊後跳轉的路徑寫在這裡
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers; // 註冊頁面寫在這裡 showRegistrationForm(){return view('auth.register');} 直接用或改寫
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * 註冊後跳轉的路徑 預設是"/home" 在config/auth.php 改為"/"
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     * 註冊資訊驗證條件 代替使用Request
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z0-9]*$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/', 'unique:users'],
            'phone_no' => ['size:10', 'regex:/^\d{10}$/'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{1,}$/', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => User::ROLE_USER,  // 預設所有註冊者為一般使用者 blade & controller 控制權限方法去看筆記
        ]);
    }

    public function showRegistrationForm() // 調用AuthenticatesUsers 後 改寫裡面登入的頁面
    {
        return view('frontend.register');
    }
}
