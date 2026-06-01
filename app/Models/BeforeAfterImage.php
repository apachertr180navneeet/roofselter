<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeforeAfterImage extends Model
{
    protected $table = 'before_after_images';

    protected $fillable = [
        'title',
        'description',
        'before_image',
        'after_image',
        'category',
        'status',
        'sort_order',
    ];
}
