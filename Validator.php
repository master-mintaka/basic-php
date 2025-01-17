<?php
class Validator
{
    public static function isValidString($value, $min = 1, $max = INF): int
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function isValidEmail($value): int
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}