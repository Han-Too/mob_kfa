<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantBranch extends Model
{
    protected $fillable = [
        'token_applicant',
        'alamat',
        'user_id',
        'layer_id',
        'kebutuhan_edc',
        'status',
        'internal_status',
        'notes',
        'alamat_pengiriman',
        'nama_pic',
        'no_tlp_pic',
        'tipe',
        'nomor_seri',
        'created_at',
        'updated_at',
        'update_by'
    ];
    
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'token_applicant', 'token_applicant');
    }
}
