<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    protected $fillable = [
        'email','subject','status','error_message','meta'
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
