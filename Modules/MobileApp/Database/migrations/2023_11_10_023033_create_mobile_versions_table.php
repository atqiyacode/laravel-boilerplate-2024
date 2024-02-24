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
        Schema::create('mobile_versions', function (Blueprint $table) {
            $table->id();
            $table->string('version');
            $table->string('version_code');
            $table->longText('note')->nullable();
            $table->enum('device', ['iphone', 'android']);
            $table->boolean('status')->default(1);
            $table->string('package_file')->nullable();
            $table->string('download_link')->nullable();
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
        Schema::dropIfExists('mobile_versions');
    }
};
