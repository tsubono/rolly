<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('last_name')->comment('名前（姓）');
            $table->string('first_name')->comment('名前（名）');
            $table->string('last_name_kana')->comment('名前（姓）カナ');
            $table->string('first_name_kana')->comment('名前（名）カナ');
            $table->string('mobile_tel')->comment('電話番号');
            $table->string('tel')->comment('FAX番号')->nullable();
            $table->string('zip_code')->comment('郵便番号');
            $table->integer('pref_id')->comment('都道府県ID');
            $table->string('address1')->comment('住所１');
            $table->string('address2')->comment('住所2')->nullable();
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->integer('brand_id')->comment('希望ブランド')->nullable();
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->string('identification_doc')->comment('身分証明書類')->nullable();
            $table->string('doc_other')->comment('その他の証明書類')->nullable();
            $table->string('identification_no')->comment('身分証No')->nullable();
            $table->tinyInteger('identification_status')->comment('本人確認 null,0:未確認 1:確認済み')->nullable();
            $table->text('note')->comment('備考')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
