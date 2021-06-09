<?php
$weekstr = array('일', '월', '화', '수', '목', '금', '토');

// 한달의 총 날짜 계산 함수
function wz_max_day($i_month, $i_year) {
    $day = 1;
    while(checkdate($i_month, $day, $i_year)) {
        $day++;
    }
    $day--;
    return $day;
}

// 날짜구하기
function wz_get_addday($day, $add) {
    $day    = preg_replace('/[^0-9]/', '', $day);
    $y      = substr( $day, 0, 4 );
    $m      = substr( $day, 4, 2 );
    $d      = (int)substr( $day, 6, 2 );

    if ($add >= 0) {
        return date("Y-m-d", mktime(0,0,0, $m, ($d+$add), $y));
    }
    else {
        if ($d > $add) {
            return date("Y-m-d", mktime(0,0,0, $m, ($d+$add), $y));
        }
        else {
            return date("Y-m-d", mktime(0,0,0, $m, ($d-$add), $y));
        }
    }
}

 //날짜 사이의 일수를 구한다.
function wz_date_between($date1, $date2) {
    $retval = intval((strtotime($date2) - strtotime($date1)) / 86400);
    return $retval;
}

// 한글날짜로 리턴
function wz_get_hangul_date($date) {
    $date = str_replace('-', '', $date);
    return preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년\\2월\\3일", $date);
}

// 한글날짜로 리턴
function wz_get_hangul_date_md($date) {
    $date = str_replace('-', '', $date);
    return preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\2/\\3", $date);
}

// 한글시간으로 리턴
function wz_get_hangul_time_hm($time) {
    return preg_replace("/([0-9]{2}):([0-9]{2})/", "\\1시\\2분", $time);
}