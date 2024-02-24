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
        Schema::create('applicant_resumes', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat_domisili');
            $table->string('alamat_ktp');

            $table->longText('tentang_diri')->nullable();

            $table->json('other_fields')->nullable();

            $table->string('foto_ktp')->nullable();
            $table->string('foto_npwp')->nullable();
            $table->string('foto_pasfoto')->nullable();
            $table->string('foto_selfie')->nullable();
            $table->string('foto_kswp')->nullable();
            $table->string('foto_cv')->nullable();

            $table->foreignId('religion_id')
                ->constrained('religions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('gender_id')->constrained('genders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('applicant_resumes');
    }
};
