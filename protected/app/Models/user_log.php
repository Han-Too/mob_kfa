<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_log extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_token',
        'user_username',
        'target_token',
        'target_username',
        'title',
        'description',
        'created_at',
        'updated_at'
    ];

}
