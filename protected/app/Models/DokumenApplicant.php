<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenApplicant extends Model
{
    protected $fillable = [
        'code', 'title', 'type', 'is_mandatory', 'status', 'created_at', 'updated_at'
    ]; 
}
