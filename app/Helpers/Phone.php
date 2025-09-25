<?php

namespace App\Helpers;

class Phone
{
    /**
     * Convert a phone number to E.164 format. Defaults to US country code.
     */
    public static function e164(string $number): string
    {
        $digits = preg_replace('/\D+/', '', $number);

        if ($digits === '') {
            return '';
        }

        if (str_starts_with($digits, '1') && strlen($digits) === 11) {
            return '+'.$digits;
        }

        if (strlen($digits) === 10) {
            return '+1'.$digits;
        }

        return '+'.$digits;
    }

    /**
     * Format a phone number for display, e.g. (512) 953-8362.
     */
    public static function display(string $number): string
    {
        $digits = preg_replace('/\D+/', '', $number);

        if (strlen($digits) === 11 && str_starts_with($digits, '1')) {
            $digits = substr($digits, 1);
        }

        if (strlen($digits) !== 10) {
            return $number;
        }

        return sprintf('(%s) %s-%s', substr($digits, 0, 3), substr($digits, 3, 3), substr($digits, 6));
    }
}
