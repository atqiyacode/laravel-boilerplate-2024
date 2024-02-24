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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->longText('general_qualifications')->nullable();
            $table->longText('job_description')->nullable();
            $table->tinyText('type');
            $table->boolean('status')->default(0);
            $table->dateTime('open_date');
            $table->dateTime('close_date');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
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
        Schema::dropIfExists('job_vacancies');
    }
};
