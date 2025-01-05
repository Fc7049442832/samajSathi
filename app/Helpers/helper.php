<?php

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d') {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('profileCompletion')) {
    function profileCompletion(array $profile): int {
        // Count completed fields (non-empty values)
        $completedFields = count(array_filter($profile));
        $totalFields = count($profile);

        // Avoid division by zero
        return $totalFields > 0 ? intval(($completedFields / $totalFields) * 100) : 0;
    }
}



