<?php
/*
 * Lay ngay tu dang int
 * @$time : int - thoi gian muon hien thi ngay
 * @$full_time : cho biet co lay ca gio phut giay hay khong
 */
function get_date($time, $full_time = true)
{
    $fomat = '%d-%m-%Y';// date-month-year
    if($full_time)
    {
        $fomat = $fomat.' - %H:%i:%s';// ngay phut giay
    }
    $date = mdate($fomat , $time);
    return $date;
}