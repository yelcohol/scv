<?php

function write_new_check($work_start_date = ''){
    $start_time = substr(date('Y-m-d H:i:s', time()),0,10).'06:00:00';
    $end_time = substr(date('Y-m-d H:i:s', time()),0,10).'17:59:59';
    $current_date_origin = date('Y-m-d', strtotime("+1 days"));
    $current_date = str_replace('-','',$current_date_origin);

    if($current_date == $work_start_date && strtotime(date('Y-m-d H:i:s')) <= strtotime($start_time) && strtotime(date('Y-m-d H:i:s')) >= strtotime($end_time)){
        return true;
    }else{
        return false;
    }
}

function write_fix_check(){
    $start_time1 = substr(date('Y-m-d H:i:s', time())).'18:00:00';
    $end_time1 = substr(date('Y-m-d H:i:s', time())).'18:59:59';
    $start_time2 = substr(date('Y-m-d H:i:s', time())).'05:00:00';
    $end_time2 = substr(date('Y-m-d H:i:s', time())).'05:59:59';
    if((strtotime(date('Y-m-d H:i:s')) >= strtotime($start_time1) && strtotime(date('Y-m-d H:i:s')) <= strtotime($end_time1)) || (strtotime(date('Y-m-d H:i:s')) >= strtotime($start_time2) && strtotime(date('Y-m-d H:i:s')) <= strtotime($end_time2))){
        return true;
    }else{
        return false;
    }
}


?>