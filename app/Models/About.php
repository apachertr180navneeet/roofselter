<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'description2',
        'image',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function category() {
        return $this->belongsTo(AboutCategory::class, 'category_id');
    }

}
