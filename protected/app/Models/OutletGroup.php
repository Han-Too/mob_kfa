<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutletGroup extends Model
{
    protected $fillable = [
        'id',
        'version',
        'name'
    ];
}
