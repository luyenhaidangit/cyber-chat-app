<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Thêm trường code
            $table->string('code')->unique();

            // Thêm trường code_parent (để liên kết với chính nó)
            $table->unsignedBigInteger('code_parent')->nullable();
            $table->foreign('code_parent')->references('id')->on('permissions');

            // Thêm trường level (kiểu số)
            $table->unsignedInteger('level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropForeign(['code_parent']);
            $table->dropColumn('code_parent');
            $table->dropColumn('level');
        });
    }
};