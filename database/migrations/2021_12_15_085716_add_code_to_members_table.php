<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string("code", 20)->nullable();
        });
        Schema::table('book_issues', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            //
            $table->dropColumn('code');
        });

        Schema::table('book_issues', function (Blueprint $table) {
            $table->dropForeign('member_id');
        });
    }
}
