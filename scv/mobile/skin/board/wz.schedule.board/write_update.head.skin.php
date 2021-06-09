<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$wr_5_1 = preg_replace('/[^0-9]/', '', $_POST['wr_5_1']);
$wr_5_2 = preg_replace('/[^0-9]/', '', $_POST['wr_5_2']);
$wr_6_1 = preg_replace('/[^0-9]/', '', $_POST['wr_6_1']);
$wr_6_2 = preg_replace('/[^0-9]/', '', $_POST['wr_6_2']);

$wr_5 = $wr_6 = '';
if ($wr_5_1 && $wr_5_2) {
    $wr_5 = $wr_5_1.':'.$wr_5_2;
}
if ($wr_6_1 && $wr_6_2) {
    $wr_6 = $wr_6_1.':'.$wr_6_2;
}