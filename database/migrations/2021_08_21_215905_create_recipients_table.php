<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->commet('用戶');
            $table->string('name')->commet('收件人名稱');
            $table->string('title')->commet('稱謂')->nullable();
            $table->string('tel_no')->commet('座機電話')->nullable();
            $table->string('mobile_no')->commet('手機電話');
            $table->string('zip_code')->commet('郵遞區號');
            $table->string('addr')->commet('地址');
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
        Schema::dropIfExists('recipients');
    }
}
