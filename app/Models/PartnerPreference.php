<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerPreference extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        
        'min_age', 'max_age',
        'min_height', 'max_height',

        'marital_status', 'special_case',
        'body_type', 'weight', 'citizenship', 'complexion', 'Features',
        'education', 'working_as','income_range',

        'diet', 'drink', 'smoke',

        'religion', 'cast', 'mother_tongus',
        'family_type', 'family_status',
        'city', 'state', 'country', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
