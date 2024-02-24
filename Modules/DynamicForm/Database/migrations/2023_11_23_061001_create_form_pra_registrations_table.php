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
        Schema::create('form_pra_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_resume_id')->constrained('applicant_resumes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('project_id')->constrained('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('form_question_pra_registration_id')->constrained('form_question_pra_registrations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('batch');
            $table->string('wilayah_tugas');
            $table->boolean('ingin_malanjutkan_pekerjaan');
            $table->boolean('ingin_posisi_yang_sama');
            $table->boolean('komitmen');
            $table->boolean('ketentuan');
            $table->text('kendala')->nullable();
            $table->text('kesan_pesan')->nullable();
            $table->text('kritik_saran')->nullable();
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
        Schema::dropIfExists('form_pra_registrations');
    }
};
