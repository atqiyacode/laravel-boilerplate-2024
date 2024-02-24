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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->longText('about_us')->nullable();
            $table->string('main_email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('main_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('call_center')->nullable();
            $table->string('website_aduan')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('location')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

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
        Schema::dropIfExists('company_information');
    }
};
