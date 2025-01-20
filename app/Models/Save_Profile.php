<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Save_Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'save_profiles';

    protected $fillable = [
        'user_id',
        'save_profile_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
