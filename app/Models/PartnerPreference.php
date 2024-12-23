<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerPreference extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'age_range', 'height_range',
        'marital_status', 'religion',
        'education', 'profession', 'income_range',
        'city', 'state', 'country',
        'hobbies', 'languages',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
