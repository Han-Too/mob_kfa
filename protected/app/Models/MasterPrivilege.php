<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPrivilege extends Model
{
    protected $fillable = [
        'title', 'description', 'status', 'created_at', 'updated_at'
    ];
}
