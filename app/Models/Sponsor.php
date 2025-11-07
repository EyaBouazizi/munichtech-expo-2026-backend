<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
   use HasFactory;

    protected $fillable = [
        'name',
        'tier',
        'pricing',
        'benefits',
        'logo_url',
        'contact_email',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array', // allows storing extra JSON info
    ];
}
