<?php

function dateFormat($date)
{
    $month = [
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "01" => "Desember"
    ];

    return substr($date, 8,2) . " " . $month[substr($date, 5,2)] . " " . substr($date, 0, 4);
}

function dateFormatMin($date)
{
    $month = [
        "01" => "Jan",
        "02" => "Feb",
        "03" => "Mar",
        "04" => "Apr",
        "05" => "Mei",
        "06" => "Jun",
        "07" => "Jul",
        "08" => "Agu",
        "09" => "Sep",
        "10" => "Okt",
        "11" => "Nov",
        "01" => "Des"
    ];

    return substr($date, 8,2) . "/" . $month[substr($date, 5,2)] . "/" . substr($date, 0, 2);
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824){
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576){
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024){
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1){
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1){
        $bytes = $bytes . ' byte';
    }
    else{
        $bytes = '0 bytes';
    }

    return $bytes;
}