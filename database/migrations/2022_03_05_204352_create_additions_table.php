<?php

use App\Models\Student;
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
        Schema::create('additions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->string('nism')->nullable();
            $table->string('kip')->nullable();
            $table->string('pkh')->nullable();
            $table->string('kks')->nullable();

            $table->string('agama')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('status_rumah')->nullable();
            $table->string('status_mukim')->nullable();


            $table->string('lembaga_formal')->nullable();
            $table->string('madin')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->string('alamat_sekolah_asal')->nullable();
            $table->string('npsn_sekolah_asal')->nullable();
            $table->string('nsm_sekolah_asal')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('no_un')->nullable();
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
        Schema::dropIfExists('additions');
    }
};
