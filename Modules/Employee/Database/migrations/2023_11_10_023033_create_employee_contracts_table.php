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
        Schema::create('employee_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable(); //
            $table->text('nama_paket')->nullable(); //Manajemen Unit Pelaksana Teknis Administrasi dan Keuangan untuk Persiapan dan Pelaksanaan Administrasi dan Keuangan dalam rangka Kegiatan Pemeliharaan Dan Peningkatan Kualitas Data Geospasial Pajak Daerah Tahun 2023
            $table->string('kode_sirup')->nullable(); //40984167
            $table->string('nomor_permohonan_pengadaan')->nullable(); //
            $table->date('tanggal_permohonan_pengadaan')->nullable(); //12/19/2022
            $table->string('no_und_dpl')->nullable(); //1.9/UND/PL/JK/ORG/XII/2022
            $table->date('tanggal_und_dpl')->nullable(); //20 December 2022
            $table->string('no_ba_hpl')->nullable(); //1.9/HPL/PL/JK/ORG/XII/2022
            $table->date('tanggal_ba_hpl')->nullable(); //29 December 2022
            $table->string('no_sppbj')->nullable(); //1/SPPBJ/PPK-PEND.1/I/2023
            $table->date('tanggal_sppbj')->nullable(); //2 Januari 2023
            $table->string('no_spk')->nullable(); //1/SPK/PPK-PEND.1/I/2023
            $table->date('tanggal_spk')->nullable(); //2 Januari 2023
            $table->string('no_spmk')->nullable(); //1/SPK/PPK-PEND.1/I/2023
            $table->date('tanggal_spmk')->nullable(); //2 Januari 2023
            $table->string('no_adendum_spk')->nullable(); //
            $table->date('tanggal_adendum_spk')->nullable(); //
            $table->text('kegiatan')->nullable();
            $table->text('sub_kegiatan')->nullable();
            $table->text('penugasan')->nullable();
            $table->boolean('status')->default(1); // 0 / 1
            $table->foreignId('employee_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('employee_contracts');
    }
};
