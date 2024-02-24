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
        Schema::create('response_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('response_id')->constrained('responses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('form_field_id')->constrained('form_fields')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('option_id')->nullable();
            $table->string('value')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('response_data');
    }
};
