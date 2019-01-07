<?php

namespace linkprofit\Chance\Strategies;

function mt_rand($min, $max)
{
    if ($min === 1 && $max === 10) {
        return 3;
    }

    if ($min === 1 && $max === 3) {
        return 3;
    }

    if ($min === 1 && $max === 100) {
        return 50;
    }
}