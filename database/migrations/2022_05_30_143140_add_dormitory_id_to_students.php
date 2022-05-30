<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('dormitory_id')->nullable();
            $table->string('rooms')->nullable();
            $table->foreign('dormitory_id')->references('id')->on('dormitories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['dormitory_id']);
            $table->dropColumn('dormitory_id');
            $table->dropColumn('rooms');
        });
    }
};
