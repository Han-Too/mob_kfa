<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantProof extends Model
{
    protected $fillable = [
        'token_applicant',
        'url',
        'title',
        'description',
        'type',
        'status',
        'upload_by',
        'created_at',
        'updated_at'
    ];
}
