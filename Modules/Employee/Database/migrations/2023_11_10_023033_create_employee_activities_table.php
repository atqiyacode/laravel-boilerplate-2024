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
        Schema::create('employee_activities', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_of_activity');
            $table->longText('detail');
            $table->string('attachment')->nullable();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('type_of_activity_id')->constrained('type_of_activities')->onDelete('cascade');
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('employee_activities');
    }
};
