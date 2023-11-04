<?php


if (!function_exists('numberFormet')) {
    function numberFormet($amount)
    {
        // dump($amount);
        if ($amount<0) {
            return '<span style="color: #d33333;">(' . number_format(abs($amount), 2) . ')</span>';
        } else {
            return number_format($amount, 2);
        }
    }
}
