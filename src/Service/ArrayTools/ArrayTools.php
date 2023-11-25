<?php

namespace App\Service\ArrayTools;

class ArrayTools
{
    public function calculateAverage (array $floats) : float{
        $sum = array_sum($floats);
        $count = count($floats);

        if ($count == 0) {
            return 0.0;
        }

        return $sum / $count;
    }
}