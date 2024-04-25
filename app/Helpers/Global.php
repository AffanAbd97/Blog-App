<?php

if (!function_exists('convert_date')) {
    function convert_date($date)
    {
        $dateTime = new DateTime($date);
        // Format DateTime object to desired format
        $formattedDate = $dateTime->format('d-m-Y');
        return $formattedDate;
    }
}