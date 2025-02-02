<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'custom_id'; // Use custom_id as the primary key
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string'; // Define the primary key as a string

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'age', 'gender', 'email', 'phone',
        'password',
        'is_verified',
        'role',
        'custom_id',
        'google_id', // Add custom_id to fillable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'custom_id');
    }

    public function partnerPreference()
    {
        return $this->hasOne(PartnerPreference::class);
    }

    public function like(){
        return $this->hasMany(Like::class, 'user_id', 'custom_id');
    }

    public function save_profile(){
        return $this->hasMany(Like::class, 'user_id', 'custom_id');
    }

    public function user_activity()
    {
        return $this->hasOne(User_Activity::class, 'user_id', 'custom_id');
    }

    /**
     * Boot method to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Get the latest user by custom_id
            $latestUser = User::orderByRaw("CAST(SUBSTRING(custom_id, 3) AS UNSIGNED) DESC")->first();
    
            // Check if a user exists; if not, start from 1
            $nextId = $latestUser ? ((int)str_replace('SS', '', $latestUser->custom_id) + 1) : 1;
    
            // Generate the new custom_id
            $user->custom_id = 'SS' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
        });

       
    }
}

