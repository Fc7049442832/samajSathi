<?php

if (!function_exists('profileCompletion')) {
    function profileCompletion(array $userDetail): float {
        $totalKeys = count($userDetail);
        $completedKeys = 0;
        foreach ($userDetail as $value) {
            if (!empty($value)) {
                $completedKeys++;
            }
        }
        return ($totalKeys > 0) ? round(($completedKeys / $totalKeys) * 100, 2) : 0;
    }
}
