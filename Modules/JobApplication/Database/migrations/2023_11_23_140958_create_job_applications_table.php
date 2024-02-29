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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('job_vacancy_id')->constrained('job_vacancies')->onDelete('cascade');
            $table->foreignId('applicant_resume_id')->constrained('applicant_resumes')->onDelete('cascade');

            $table->tinyInteger('status')->default(1)->comment('1= aktif, 2= tes tertulis, 3= wawancara hrd, 4= wawancara user, 5= diterima, 6= ditolak, 7= onhold');
            $table->text('keterangan')->nullable();
            $table->string('referal')->nullable();
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
        Schema::dropIfExists('job_applications');
    }
};
