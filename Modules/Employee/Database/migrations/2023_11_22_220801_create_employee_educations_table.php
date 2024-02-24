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
        Schema::create('employee_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('level_of_education_id')->constrained('level_of_education');
            $table->string('ptn_pts');
            $table->string('nama_institusi')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('npm')->nullable();
            $table->string('ipk')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('status_berkas')->nullable();
            $table->string('status_kelulusan')->nullable();
            $table->string('foto_ijazah')->nullable();
            $table->string('foto_transkrip_nilai')->nullable();
            $table->string('link_dikti')->nullable();
            $table->string('foto_screenshot_dikti')->nullable();
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
        Schema::dropIfExists('employee_educations');
    }
};
