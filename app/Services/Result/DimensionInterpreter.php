<?php

namespace App\Services\Result;

use App\Models\Dimension;
use App\Models\DimensionInterpretation;

class DimensionInterpreter
{
    /**
     * Interprets a dimension score strictly using its database thresholds.
     */
    public function interpret(Dimension $dimension, int $score): ?DimensionInterpretation
    {
        foreach ($dimension->interpretations as $interp) {
            if ($interp->low_threshold !== null && $interp->high_threshold !== null) {
                if ($score >= $interp->low_threshold && $score <= $interp->high_threshold) {
                    return $interp;
                }
            }
        }

        return null;
    }
}
