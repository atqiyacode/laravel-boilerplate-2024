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
        Schema::create('applicant_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_resume_id')->constrained('applicant_resumes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('foto_ktp')->nullable();
            $table->string('foto_npwp')->nullable();
            $table->string('foto_pasfoto')->nullable();
            $table->string('foto_selfie')->nullable();
            $table->string('foto_kswp')->nullable();
            $table->string('foto_cv')->nullable();
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
        Schema::dropIfExists('applicant_attachments');
    }
};
