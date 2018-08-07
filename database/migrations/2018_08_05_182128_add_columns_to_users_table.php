<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('doc_other_3')->comment('その他の証明書類3')->nullable()->after('doc_other');
            $table->string('doc_other_2')->comment('その他の証明書類2')->nullable()->after('doc_other');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('doc_other_2');
            $table->dropColumn('doc_other_3');
        });
    }
}
