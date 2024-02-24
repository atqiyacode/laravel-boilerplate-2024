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
        Schema::create('applicant_certificate_of_expertises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_resume_id')->constrained('applicant_resumes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nama_kegiatan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('foto_sertifikat')->nullable();
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
        Schema::dropIfExists('applicant_certificate_of_expertises');
    }
};
