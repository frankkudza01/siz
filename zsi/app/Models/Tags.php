<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'article_tag', 'tag_id', 'article_id');
    }
}
