<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ECPayController extends Controller
{
    public function success(Request $request)
    {
        // dd($request);
        session()->flash('pay_success', '付款成功！歡迎繼續購物');
        return redirect('/');
    }
}
