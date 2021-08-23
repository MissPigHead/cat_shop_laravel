<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('recipient_id')->commet('收件人');
            $table->integer('amount_raw')->commet('原始金額');
            // $table->integer('invoice_type')->commet('發票類型');
            // $table->string('uniform_no')->commet('發票統編');
            // $table->string('uniform_title')->commet('發票抬頭');
            $table->string('description')->nullable()->commet('訂單備註');
            $table->integer('amount_discount')->default(0)->commet('折扣金額');
            $table->integer('amount_total')->commet('總金額');
            $table->softDeletes('delete_mark')->commet('軟刪除');
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
        Schema::dropIfExists('orders');
    }
}
