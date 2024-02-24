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
        Schema::create('employee_permit_remainings', function (Blueprint $table) {
            $table->id();
            $table->integer('has_use');
            $table->integer('limit');
            $table->integer('total');
            $table->text('note')->nullable();
            $table->foreignId('employee_id')->unique()->constrained('employees')->onDelete('cascade');
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
        Schema::dropIfExists('employee_permit_remainings');
    }
};
