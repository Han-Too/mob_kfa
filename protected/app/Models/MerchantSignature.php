<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantSignature extends Model
{
    protected $fillable = [
        'token_applicant', 'image', 'status', 'created_at', 'updated_at','updated_by','notes','status_approvals','layer_id'
    ];
}
