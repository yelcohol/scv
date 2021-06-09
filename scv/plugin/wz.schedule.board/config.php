<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

define('WCAL_DIR',              'wz.schedule.board');
define('WCAL_PLUGIN_URL',       G5_PLUGIN_URL.'/'.WCAL_DIR);
define('WCAL_PLUGIN_PATH',      G5_PLUGIN_PATH.'/'.WCAL_DIR);

$g5['board_schedule_config_table'] = $write_table.'_config'; // 스케쥴게시판 환경설정 테이블
$g5['board_schedule_color_table'] = $write_table.'_color'; // 스케쥴게시판 색상 테이블

// 2019-12-05 : bo_table 추가 (게시판마다 설정을 다르게 하기 위함)
$wscb = sql_fetch(" select * from {$g5['board_schedule_config_table']} where bo_table = '".$bo_table."' ");