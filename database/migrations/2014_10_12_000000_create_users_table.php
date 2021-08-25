<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->commet('帳號');
            $table->string('role')->default(User::ROLE_USER)->comment('權限'); // 加入角色欄位
            $table->string('email')->unique()->comment('信箱');
            $table->timestamp('email_verified_at')->nullable()->comment('信箱認證時間');
            $table->string('password')->comment('密碼');
            $table->date('birthday')->nullable()->comment('生日');
            $table->string('phone_no')->nullable()->comment('手機號');
            $table->boolean('status')->default(0)->comment('停權');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
