<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;


class TimeFunction
{
    public static function  formatDateToFrench($timestamp)
    {
        // Set the locale to French
        Carbon::setLocale('fr');

        // Parse and format the timestamp
        return Carbon::parse($timestamp)->translatedFormat('d F Y');
    }

    public static function  formatDateToFrench_M_Y($timestamp)
    {
        // Set the locale to French
        Carbon::setLocale('fr');

        // Parse and format the timestamp
        return Carbon::parse($timestamp)->translatedFormat('F Y');
    }
}

