<?php

namespace App\Helpers;

class AiSimilarity
{
    // Convert text to vector
    public static function textToVector($text)
    {
        $words = str_word_count(strip_tags($text), 1);
        return array_count_values($words);
    }

    // Calculate cosine similarity
    public static function cosineSimilarity($vec1, $vec2)
    {
        $dot = 0;
        $normA = 0;
        $normB = 0;

        foreach ($vec1 as $word => $count) {
            $dot += $count * ($vec2[$word] ?? 0);
            $normA += pow($count, 2);
        }
        foreach ($vec2 as $count) {
            $normB += pow($count, 2);
        }

        if ($normA == 0 || $normB == 0) return 0;

        return $dot / (sqrt($normA) * sqrt($normB));
    }
}
