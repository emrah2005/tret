<?php

namespace App\Services;

class DnaMatcher
{
    public function score(array $profileVector, array $campaignVector): float
    {
        if (empty($profileVector) || empty($campaignVector)) {
            return 0;
        }

        $dot = 0;
        $magA = 0;
        $magB = 0;

        foreach ($profileVector as $key => $value) {
            $v1 = $value;
            $v2 = $campaignVector[$key] ?? 0;

            $dot += $v1 * $v2;
            $magA += $v1 * $v1;
            $magB += $v2 * $v2;
        }

        if ($magA === 0 || $magB === 0) {
            return 0;
        }

        return $dot / (sqrt($magA) * sqrt($magB));
    }
}
