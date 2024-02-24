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
        Schema::create('form_question_pra_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->longText('batch')->nullable();
            $table->longText('wilayah_tugas')->nullable();
            $table->longText('ingin_malanjutkan_pekerjaan')->nullable();
            $table->longText('ingin_posisi_yang_sama')->nullable();
            $table->longText('komitmen')->nullable();
            $table->longText('ketentuan')->nullable();
            $table->longText('kendala')->nullable();
            $table->longText('kesan_pesan')->nullable();
            $table->longText('kritik_saran')->nullable();
            $table->json('other_fields')->nullable();
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
        Schema::dropIfExists('form_question_pra_registrations');
    }
};
