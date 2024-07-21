<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $guarded = [];
    // In your Event model
    protected $casts = [
        'end_date' => 'date',
        'start_start' => 'date',
        'start_time' => 'date',
    ];

}
