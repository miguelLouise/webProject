<?php

function get_month_range($startDate, $endDate){
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    $interval = DateInterval::createFromDateString('1 month');
    $period = new DatePeriod($start, $interval, $end->modify('+1 day')); // Add one day to include the end month

    $months = [];
    foreach ($period as $dt) {
        $months[] = $dt->format('Y-m');
    }
    return $months;
}