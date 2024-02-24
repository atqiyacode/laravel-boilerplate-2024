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
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('period');
            $table->string('name_of_kak');
            $table->integer('number_of_members');
            $table->integer('time_period');
            $table->date('work_start_date');
            $table->date('end_work_date');
            $table->foreignId('unit_id')->constrained('units')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('schema', ['1', '2']);
            $table->date('petition')->nullable();
            $table->date('disposition')->nullable();
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
        Schema::dropIfExists('payment_plans');
    }
};
