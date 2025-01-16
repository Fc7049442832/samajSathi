<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'views',
        'likes',
        'shares',
    ];

    /**
     * Get the user that owns the post stats.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
