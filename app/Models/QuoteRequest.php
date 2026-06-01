<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_CLOSED = 'closed';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'property_address',
        'service_required',
        'message',
        'status',
    ];
}
