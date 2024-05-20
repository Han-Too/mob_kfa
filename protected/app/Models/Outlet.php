<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'bo_id', 'newmccgroup_fk', 'mcc_type', 'default_old_mcc', 'code', 'outlet', 'status', 'created_at', 'updated_at'
    ];
}
