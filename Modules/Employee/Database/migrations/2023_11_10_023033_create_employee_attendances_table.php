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
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->id();
            $table->date('check_date');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->string('photo_check_in')->nullable();
            $table->string('photo_check_out')->nullable();
            $table->string('location_check_in')->nullable();
            $table->string('location_check_out')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
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
        Schema::dropIfExists('employee_attendances');
    }
};
