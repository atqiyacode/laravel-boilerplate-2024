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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('id_card')->nullable()->unique();
            $table->string('npwp')->nullable()->unique();
            $table->string('account_number')->nullbale()->unique();
            $table->boolean('online_attendance')->default(0);

            $table->string('tipe_penyedia_jasa')->nullable(); //JK/JL
            $table->string('kontrak_ke')->nullable(); //1,2,dst
            $table->string('status_personil')->nullable(); //UNIT SAMA/GOLONGAN SAMA/POSISI SAMA/SAMA
            $table->date('tanggal_mulai_kerja')->nullable(); //1/2/2023
            $table->double('harga_satuan')->nullable(); //16650000
            $table->double('bulan_kerja')->nullable(); //6
            $table->double('total_nilai_spk')->nullable(); //99900000
            $table->double('harga_spk')->nullable(); //99900000
            $table->text('terbilang_spk')->nullable(); //Sembilan Puluh Sembilan Juta Sembilan Ratus Ribu Rupiah
            $table->date('tanggal_selesai_kerja')->nullable(); //6/30/2023
            $table->string('keterangan_status')->nullable(); //(DIKELUARKAN/RESIGN/ABIS KONTRAK/ BELUM KONTRAK)
            $table->date('tanggal_efektif_keterangan_status')->nullable(); //4/30/2023
            $table->integer('jumlah_izin')->nullable(); //6
            $table->date('tanggal_pengajuan_surat_resign')->nullable(); //
            $table->date('tanggal_efektif_berhenti_kerja')->nullable(); //
            $table->string('keterangan')->nullable(); //
            $table->string('tahap')->nullable(); //1
            $table->json('other_fields')->nullable(); //json
            $table->tinyInteger('status')->default(1);

            $table->foreignId('employee_id')
                ->unique()
                ->constrained('employees')
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
        Schema::dropIfExists('employee_details');
    }
};
