<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleSetting extends Model
{
    use HasFactory;

    protected $table = 'google_settings';

    protected $fillable = ['key', 'value'];

    // Helper function to get a setting value
    public static function getValue($key, $default = null)
    {
        return self::where('key', $key)->value('value') ?? $default;
    }

    // Helper function to set a setting value
    public static function setValue($key, $value)
    {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
