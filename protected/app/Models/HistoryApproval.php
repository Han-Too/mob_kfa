<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryApproval extends Model
{
    protected $fillable = [
        'token_applicant', 'approval_id', 'flag', 'status', 'notes', 'user_id', 'created_at', 'updated_at'
    ];
    
    public function document()
    {
        return $this->belongsTo(MerchantDocument::class, 'approval_id');
    }

    public function signature()
    {
        return $this->belongsTo(MerchantSignature::class, 'approval_id');
    }

    public function payment()
    {
        return $this->belongsTo(MerchantPayment::class, 'approval_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
