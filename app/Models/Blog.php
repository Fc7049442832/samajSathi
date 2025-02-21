<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'content', 'image', 'views', 'likes'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
