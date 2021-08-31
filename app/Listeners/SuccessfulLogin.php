<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/* 產生 token

官方範例在使用者註冊時同時產生 token，但如果沒有另外實作更新機制可能不是很安全。

在使用者登入時重新產生一組 token，使用者不用自己管理 token，也不會永遠使用同一組 token。

建立一個 listener
php artisan make:listener SuccessfulLogin

事件觸發時更新 API token。*/

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        $user->api_token = Str::random(60);
        $user->save();
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
