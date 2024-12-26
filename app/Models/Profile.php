<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'user_id', 'profile_image',
        // About Me
        'about_me',
        // Basics info
        'dob', 'marital_status', 'citizenship', 'blood_group', 'immigration', 'special_case', 'status', 'body_type', 'height', 'weight', 'complexion', 'Features',
        // Life sytel
        'living_situation', 'house_ownership', 'diet', 'drink', 'smoke',
        // Religious  Background
        'religion', 'caste', 'sub_caste', 'mother_tongus', 'gothra',
        // Family Details
        'father_status', 'mother_status', 'total_sister', 'total_brother', 'family_type', 'family_values', 'family_status', 'native_place',
        // Education
        'education', 'working_as', 'working_with', 'income',
        // Location of Groom
        'country', 'state', 'city', 'postal_code',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
