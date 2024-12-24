<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'dob',
        'profile_image', 'bio',
        'marital_status', 'religion', 'caste',
        'education', 'profession', 'income', 
        'height', 'weight', 'hobbies', 'languages', 
        'city', 'state', 'country', 'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
