<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'booth_type', 'website', 'contact_email', 'logo_url', 'meta'];
    protected $casts = ['meta' => 'array'];
}
