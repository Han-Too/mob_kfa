<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLayer extends Model
{
    protected $fillable = [
        'title', 'code', 'status', 'created_at', 'updated_at'
    ];
}
