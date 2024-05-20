<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantPayment extends Model
{
    protected $fillable = [
        'token_applicant',
        'payment',
        'status_approval',
        'internal_status',
        'notes',
        'updated_by',
        'layer_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'token_applicant', 'token_applicant');
    }
}
