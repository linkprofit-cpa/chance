<?php

namespace Linkprofit\Chance\Strategies;

function mt_rand($min, $max)
{
    if ($min === 1 && $max === 10) {
        return 3;
    } elseif ($min === 1 && $max === 3) {
        return 3;
    }
}