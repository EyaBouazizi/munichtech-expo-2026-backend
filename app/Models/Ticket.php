<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'price',
        'name',
        'email',
        'status',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
