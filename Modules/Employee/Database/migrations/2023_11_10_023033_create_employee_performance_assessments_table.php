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
        Schema::create('employee_performance_assessments', function (Blueprint $table) {
            $table->id();
            $table->integer('poin');
            $table->unsignedBigInteger('performance_assessment_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('performance_assessment_id', 'fk_employee_performance_assessment')
                ->references('id')
                ->on('performance_assessments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_performance_assessments');
    }
};
