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
            $table->boolean('madin_is_verified')->after('madin_institution_id')->nullable();
            $table->unsignedBigInteger('madin_rombel_id')->after('madin_is_verified')->nullable();
            $table->foreign('madin_rombel_id')->references('id')->on('madin_rombel');
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
            $table->dropColumn('madin_is_verified');
            $table->dropColumn('madin_rombel');
        });
    }
};
