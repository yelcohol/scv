<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$wr_7_1 = preg_replace('/[^0-9]/', '', $_POST['wr_7_1']);
$wr_7_2 = preg_replace('/[^0-9]/', '', $_POST['wr_7_2']);
$wr_8_1 = preg_replace('/[^0-9]/', '', $_POST['wr_8_1']);
$wr_8_2 = preg_replace('/[^0-9]/', '', $_POST['wr_8_2']);

$wr_7 = $wr_8 = '';
if ($wr_7_1 && $wr_7_2) {
    $wr_7 = $wr_7_1.':'.$wr_7_2;
}
if ($wr_8_1 && $wr_8_2) {
    $wr_8 = $wr_8_1.':'.$wr_8_2;
}