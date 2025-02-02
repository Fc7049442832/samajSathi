<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notice extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';  // Ensure correct primary key
    public $incrementing = false;  // Disable auto-increment if using UUIDs or strings
    protected $keyType = 'string'; // Set key type to string
    
    protected $fillable = ['header', 'message', 'media'];
}
