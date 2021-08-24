<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->comment('目錄ID');
            $table->integer('unit_id')->comment('單位ID');
            $table->string('name')->comment('商品名稱');
            $table->integer('price')->comment('價格');
            $table->json('image_path')->nullable()->comment('圖片路徑[陣列]');
            $table->string('specification')->comment('規格');
            $table->text('description')->comment('商品說明');
            $table->integer('in_stock')->comment('庫存');
            $table->integer('order')->comment('顯示順序');
            $table->boolean('show')->comment('是否顯示');
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
        Schema::dropIfExists('products');
    }
}
