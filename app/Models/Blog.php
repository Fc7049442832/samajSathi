<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'content', 'image', 'views', 'likes' , 'keywords'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getTextForAi()
    {
        return strtolower($this->title . ' ' . $this->keywords . ' ' . $this->content);
    }

}
