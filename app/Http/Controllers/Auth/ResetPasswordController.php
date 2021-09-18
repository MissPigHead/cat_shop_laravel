<?php
// 讓使用者重設密碼
// 參考trait 後，先可能會用到的 顯示頁面showResetForm() & 驗證規則rules() 放在下面

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = "/login";

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'string', 'min:8', 'max:20', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{1,}$/', 'confirmed']
        ];
    }

    public function resetPasswordWeb(Request $request)
    {
        $confirm = new ConfirmPasswordController;
        $confirm->confirm($request);
        $token = Password::broker()->createToken(Auth::user());
        $request->merge([
            'token' => $token,
            'password' => $request->newPassword,
        ]); // 用來替換Request 實例中的 request parameter
        $this->reset($request);
        return redirect($this->redirectPath());
    }
}
