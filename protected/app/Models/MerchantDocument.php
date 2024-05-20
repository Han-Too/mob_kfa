<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantDocument extends Model
{
    protected $fillable = [
        'token_applicant',
        'document_id',
        'image',
        'type',
        'status_approval',
        'notes',
        'updated_by',
        'layer_id',
        'created_at',
        'updated_at'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'token_applicant', 'token_applicant');
    }

    public function document()
    {
        return $this->belongsTo(DokumenApplicant::class, 'document_id');
    }
}
