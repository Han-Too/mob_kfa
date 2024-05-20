<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'token_applicant', 'layer_id', 'internal_status', 'updated_by', 'created_at', 'updated_at'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'token_applicant', 'token_applicant');
    }
}
