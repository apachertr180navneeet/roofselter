<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = [
        'blog_id',
        'image',
        'label',
        'sort_order',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
