<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Google_Setting;

class GoogleApiSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $settings = [
            ['key' => 'google_client_id', 'value' => '13791749371-1iin536g47iv6vi7e8rgh0hv1prfv6g5.apps.googleusercontent.com'],
            ['key' => 'google_client_secret', 'value' => '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'],
            ['key' => 'google_redirect_uri', 'value' => 'http://127.0.0.1:8000/profile'],
        ];

        foreach ($settings as $setting) {
            Google_Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }

        echo "✅ Google API settings seeded successfully.\n";
    }
}
