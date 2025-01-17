<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(Attachments::class, 'course_id');
    }

}
