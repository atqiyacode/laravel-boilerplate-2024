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
    public function up(): void
    {
        Schema::create('employee_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('level_of_education_id')->constrained('level_of_education')->onDelete('cascade');
            $table->string('nama_kegiatan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('lokasi_kegiatan')->nullable();
            $table->string('pengguna_jasa')->nullable();
            $table->text('uraian_tugas')->nullable();
            $table->date('waktu_pelaksanaan_mulai')->nullable();
            $table->date('waktu_pelaksanaan_selesai')->nullable();
            $table->string('posisi_penugasan')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->string('foto_surat_referensi')->nullable();
            $table->text('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_experiences');
    }
};
