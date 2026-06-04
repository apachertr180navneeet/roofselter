<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'image2', 'description', 'description2', 'meta_title', 'meta_description', 'meta_keywords', 'status', 'counter1_number', 'counter1_label', 'counter2_number', 'counter2_label', 'counter3_number', 'counter3_label', 'counter4_number', 'counter4_label'];
}
