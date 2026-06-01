<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'issuer',
        'image',
        'issue_date',
        'expiry_date',
        'description',
        'status',
        'sort_order',
    ];
}
