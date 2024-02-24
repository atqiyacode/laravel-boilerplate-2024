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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('full_name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            $table->foreignId('employee_type_id')->constrained('employee_types');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('religion_id')->constrained('religions');
            $table->foreignId('field_of_work_id')->constrained('field_of_works');
            $table->foreignId('working_area_id')->constrained('working_areas');
            $table->foreignId('position_id')->constrained('positions');
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('main_class_id')->constrained('main_classes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
