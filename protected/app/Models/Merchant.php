<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = [
        'token_applicant',
        'layer_id',
        'status_detail',
        'catatan_detail',
        'alasan_detail',
        'merchant_id',
        'user_id',
        'nama_merchant',
        'pengajuan_sebagai',
        'tahun_berdiri',
        'jenis_usaha',
        'mcc',
        'fitur_transaksi',
        'bisnis_email',
        'bisnis_no_hp',
        'alamat_bisnis',
        'tempat_bisnis',
        'store_url',
        'status_tempat_usaha',
        'nama_pemilik_merchant',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_sesuai_ktp',
        'alamat_domisili',
        'kewarganegaraan',
        'email',
        'nomor_identitas',
        'nomor_hp',
        'npwp',
        'nama_pengurus_merchant',
        'kewarganegaraan_pengurus',
        'nomor_identitas_pengurus',
        'npwp_pengurus',
        'email_pengurus',
        'nomor_hp_pengurus',
        'nama_bank',
        'nomor_rekening_bank_penampung',
        'nama_pemilik_rekening_merchant_badan_usaha',
        'email_settlement',
        'lat',
        'longitude',
        'm_lat',
        'm_lng',
        'status_approval',
        'jenis_produk',
        'omset_rata_rata',
        'status_setting_mid',
        'status_setting_tid',
        'status_setting_mdr',
        'status_inject_edc',
        'status_pin_key',
        'status_tes_transaksi',
        'status_qc',
        'alamat_pejabat_berwenang',
        'npwp_merchant_badan_usaha',
        'status_ekspedisi',
        'jenis_kelamin_pemilik',
        'jenis_kelamin_pengurus',
        'sumber_data',
        'catatan',
        'reason',
        'status',
        'username',
        'password',
        'pin',
        'status_tanda_tangan',
        'dokumen_lengkap',
        'updated_by'
    ];

    protected $maxLengths = [
        'user_id' => 60,
        'nama_merchant' => 100,
        'pengajuan_sebagai' => 100,
        'tahun_berdiri' => 100,
        'mcc' => 100,
        'bisnis_email' => 100,
        'bisnis_no_hp' => 100,
        'store_url' => 100,
        'status_tempat_usaha' => 100,
        'nama_pemilik_merchant' => 100,
        'tempat_lahir' => 100,
        'tanggal_lahir' => 50,
        'kewarganegaraan' => 100,
        'email' => 100,
        'nomor_identitas' => 100,
        'nomor_hp' => 100,
        'npwp' => 100,
        'nama_pengurus_merchant' => 100,
        'kewarganegaraan_pengurus' => 100,
        'nomor_identitas_pengurus' => 100,
        'npwp_pengurus' => 100,
        'nomor_hp_pengurus' => 100,
        'nama_bank' => 100,
        'nomor_rekening_bank_penampung' => 100,
        'nama_pemilik_rekening_merchant_badan_usaha' => 100,
        'email_settlement' => 100,
        'lat' => 100,
        'longitude' => 100,
        'm_lat' => 100,
        'm_lng' => 100,
        'status_approval' => 11,
        'jenis_produk' => 200,
        'omset_rata_rata' => 30,
        'status_setting_mid' => 10,
        'status_setting_tid' => 10,
        'status_setting_mdr' => 10,
        'status_inject_edc' => 10,
        'status_pin_key' => 20,
        'status_tes_transaksi' => 20,
        'status_qc' => 20,
        'npwp_merchant_badan_usaha' => 50,
        'status_ekspedisi' => 100,
        'jenis_kelamin_pemilik' => 100,
        'jenis_kelamin_pengurus' => 100,
        'sumber_data' => 100,
        'username' => 255,
        'pin' => 100,
    ];

    public function setAttribute($key, $value)
    {
        if (isset($this->maxLengths[$key])) {
            $value = substr($value, 0, $this->maxLengths[$key]);
        }

        parent::setAttribute($key, $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workflow()
    {
        return $this->hasOne(Applicant::class, 'token_applicant', 'token_applicant');
    }

    public function payments()
    {
        return $this->hasMany(MerchantPayment::class, 'token_applicant', 'token_applicant')->where('status', 'active');
    }

    public function documents()
    {
        return $this->hasMany(MerchantDocument::class, 'token_applicant', 'token_applicant');
    }

    public function branches()
    {
        return $this->hasMany(MerchantBranch::class, 'token_applicant', 'token_applicant');
    }
}
