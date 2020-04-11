<?php
/**
 * Get an array of \DateTime objects for each day (specified) in a year and month
 *
 * @param integer $year
 * @param integer $month
 * @param string $day
 * @param integer $daysError    Number of days into month that requires inclusion of previous Monday
 * @return array|\DateTime[]
 * @throws Exception      If $year, $month and $day don't make a valid strtotime
 */
function getAllDaysInAMonth($year, $month, $day, $daysError = 3) {
    $dateString = 'first '.$day.' of '.$year.'-'.$month;

    if (!strtotime($dateString)) {
        throw new \Exception('"'.$dateString.'" is not a valid strtotime');
    }

    $startDay = new \DateTime($dateString);

    if ($startDay->format('j') > $daysError) {
        $startDay->modify('- 7 days');
    }

    $days = array();

    while ($startDay->format('Y-m') <= $year.'-'.str_pad($month, 2, 0, STR_PAD_LEFT)) {
        $days[] = clone($startDay);
        $startDay->modify('+ 7 days');
    }

    return $days;
}
$days = getAllDaysInAMonth(2019, 12,'Friday');
$testarr = array();
foreach ($days as $day) {
    if ($day->format('m') == 12) {
        $testarr[] = $day->format('D Y-m-d');
    }
}
    echo "<pre>";
    print_r($testarr);
?>