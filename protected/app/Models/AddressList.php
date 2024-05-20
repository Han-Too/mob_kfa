<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressList extends Model
{
    protected $table = 'addresses_list';
    protected $fillable = [
        'city', 'country', 'country_code', 'district', 'post_code', 'province', 'village'
    ];
}
