<?php

namespace App\Helpers;

class UserAi
{
    public static function detectUserInterest($request)
    {
        // 1. Device-based analysis
        $ua = strtolower($request->header('User-Agent'));
        $interests = [];

        if (str_contains($ua, 'android')) $interests[] = 'Technology';
        if (str_contains($ua, 'iphone')) $interests[] = 'Lifestyle';

        // 2. Previously visited categories
        if (session()->has('user_categories')) {
            $interests = array_merge($interests, session('user_categories'));
        }

        // 3. Marital status (session)
        if (session()->get('married') === 'yes') {
            $interests[] = 'Family';
            $interests[] = 'Finance';
        }
        if (session()->get('married') === 'no') {
            $interests[] = 'Love';
            $interests[] = 'Relationship';
        }

        return array_unique($interests);
    }

    public static function recordCategoryVisit($category)
    {
        $data = session()->get('user_categories', []);
        $data[] = $category;
        session()->put('user_categories', array_unique($data));
    }
}