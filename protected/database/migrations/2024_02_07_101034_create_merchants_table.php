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
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('token_applicant', 100)->nullable();
            $table->string('merchant_id', 20)->nullable();
            $table->bigInteger('layer_id')->nullable();
            $table->string('status_detail', 50)->nullable();
            $table->string('catatan_detail')->nullable();
            $table->string('alasan_detail')->nullable();
            $table->string('user_id', 60)->nullable();
            $table->string('nama_merchant', 100)->nullable();
            $table->string('pengajuan_sebagai', 100)->nullable();
            $table->string('tahun_berdiri', 10)->nullable();
            $table->string('jenis_usaha', 100)->nullable();
            $table->string('mcc', 100)->nullable();
            $table->mediumText('fitur_transaksi')->nullable();
            $table->string('bisnis_email', 100)->nullable();
            $table->string('bisnis_no_hp', 100)->nullable();
            $table->mediumText('alamat_bisnis')->nullable();
            $table->mediumText('tempat_bisnis')->nullable();
            $table->string('store_url', 100)->nullable();
            $table->string('status_tempat_usaha', 100)->nullable();
            $table->string('nama_pemilik_merchant', 100)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->string('tanggal_lahir', 50)->nullable();
            $table->mediumText('alamat_sesuai_ktp')->nullable();
            $table->mediumText('alamat_domisili')->nullable();
            $table->string('kewarganegaraan', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('nomor_identitas', 100)->nullable();
            $table->string('nomor_hp', 100)->nullable();
            $table->string('npwp', 100)->nullable();
            $table->string('nama_pengurus_merchant', 100)->nullable();
            $table->string('kewarganegaraan_pengurus', 100)->nullable();
            $table->string('nomor_identitas_pengurus', 100)->nullable();
            $table->string('npwp_pengurus', 100)->nullable();
            $table->string('email_pengurus', 100)->nullable();
            $table->string('nomor_hp_pengurus', 100)->nullable();
            $table->string('nama_bank', 100)->nullable();
            $table->string('nomor_rekening_bank_penampung', 100)->nullable();
            $table->string('nama_pemilik_rekening_merchant_badan_usaha', 100)->nullable();
            $table->string('email_settlement', 100)->nullable();
            $table->string('lat', 100)->nullable();
            $table->string('longitude', 100)->nullable();
            $table->string('m_lat', 100)->nullable();
            $table->string('m_lng', 100)->nullable();
            $table->char('status_approval', 11)->nullable();
            $table->string('jenis_produk', 200)->nullable();
            $table->string('omset_rata_rata', 30)->nullable();
            $table->string('status_setting_mid', 10)->nullable();
            $table->string('status_setting_tid', 10)->nullable();
            $table->string('status_setting_mdr', 10)->nullable();
            $table->string('status_inject_edc', 20)->nullable();
            $table->string('status_pin_key', 20)->nullable();
            $table->string('status_tes_transaksi', 20)->nullable();
            $table->string('status_qc', 20)->nullable();
            $table->mediumText('alamat_pejabat_berwenang')->nullable();
            $table->string('npwp_merchant_badan_usaha', 50)->nullable();
            $table->string('status_ekspedisi', 100)->nullable();
            $table->string('jenis_kelamin_pemilik', 100)->nullable();
            $table->string('jenis_kelamin_pengurus', 100)->nullable();
            $table->string('sumber_data', 100)->nullable();
            $table->mediumText('catatan')->nullable();
            $table->mediumText('reason')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('pin', 100)->nullable();
            $table->string('status')->default('active');
            $table->boolean('status_tanda_tangan')->default(false);
            $table->boolean('dokumen_lengkap')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
};
