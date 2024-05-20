<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentFeature extends Model
{
    protected $fillable = [
        'code', 'payment', 'status', 'created_at', 'updated_at'
    ];
}
