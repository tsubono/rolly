<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('brand_id')->comment('ブランドID');
            $table->string('model_number')->comment('型番号');
            $table->string('model_name')->comment('モデル名');
            $table->string('serial_no')->comment('シリアルNo');
            $table->string('color')->comment('カラー');
            $table->string('image1')->comment('写真1')->nullable();
            $table->string('image2')->comment('写真2')->nullable();
            $table->string('plan_id')->comment('プランID');
            $table->string('status')->comment('ステータス')->nullable();
            $table->text('note')->comment('備考・メモ')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
