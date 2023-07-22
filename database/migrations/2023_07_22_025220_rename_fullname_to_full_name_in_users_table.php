<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFullnameToFullNameInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->nullable();
            $table->dropColumn('fullName');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullName')->nullable();
            $table->dropColumn('full_name');
        });
    }
}