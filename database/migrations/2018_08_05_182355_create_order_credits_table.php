<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('クレジットカード名義者の名前');
            $table->string('zip_code')->nullable()->comment('クレジットカード名義者の住所(郵便番号)');
            $table->integer('pref_id')->nullable()->comment('クレジットカード名義者の住所(都道府県ID)');
            $table->string('address1')->nullable()->comment('クレジットカード名義者の住所(住所１)');
            $table->string('address2')->nullable()->comment('クレジットカード名義者の住所(住所2)');
            $table->string('tel')->nullable()->comment('クレジットカード名義者の電話番号（申込者と同じは不可）');
            $table->string('relationship')->nullable()->comment('クレジットカード名義者と申込者の関係');
            $table->string('doc_1')->nullable()->comment('クレジットカード名義者の本人確認書類1');
            $table->string('doc_2')->nullable()->comment('クレジットカード名義者の本人確認書類2');

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
        Schema::dropIfExists('order_credits');
    }
}
