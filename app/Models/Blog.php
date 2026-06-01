<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'location',
        'service_type',
        'completion_date',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function galleryImages()
    {
        return $this->hasMany(ProjectImage::class, 'blog_id')->orderBy('sort_order');
    }
}
