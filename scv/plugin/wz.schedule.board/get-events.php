<?php
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/wz.schedule.board/config.php');
include_once(WCAL_PLUGIN_PATH.'/lib/function.lib.php');

//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';

// Short-circuit if the client did not give us a date range.
if (!isset($_GET['start']) || !isset($_GET['end'])) {
	die("Please provide a date range.");
}

// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
// Since no timezone will be present, they will parsed as UTC.
$range_start = parseDateTime($_GET['start']);
$range_end = parseDateTime($_GET['end']);

// Parse the timezone parameter if it is present.
$timezone = null;
if (isset($_GET['timezone'])) {
	$timezone = new DateTimeZone($_GET['timezone']);
}

// Read and parse our events JSON file into an array of event data arrays.
$frdate = $_GET['start'];
$todate = $_GET['end'];

$frdate = substr(preg_replace('/[^A-Za-z0-9]/', '', $frdate), 0, 8);
$todate = substr(preg_replace('/[^A-Za-z0-9]/', '', $todate), 0, 8);

$sql_where = "";
// if ($sca || $stx || $stx === '0') { // 검색이면
//     $sql_search = get_sql_search($sca, $sfl, $stx, $sop);
//     if ($sql_search) {
//         $sql_where = " and ". $sql_search;
//     }
// }

//건설사 회원이면 올린 일자리 게시글을 불러옴
if($bo_table == 'uploaded_works'){
    $write_table = $g5['write_prefix'] . "works"; //일자리 게시판에서 불러옴
    $sql_where = "mb_id = '{$member['mb_id']}'"; //접속한 회원의 아이디와 게시글의 아이디가 같은 게시글만 불러옴
    if($sql_where){
        $sql_where = " and " . $sql_where;
    }
}

if($bo_table == 'applied_works'){
    $write_table = $g5['write_prefix'] . "works"; //일자리 게시판에서 불러옴
    $sql_where = "wr_id in (select distinct A.wr_id from {$g5['apply_table']} as A WHERE A.mb_id = '{$member['mb_id']}')"; //접속한 회원의 아이디와 게시글의 아이디가 같은 게시글만 불러옴
    if($sql_where){
        $sql_where = " and " . $sql_where;
    }
}

$input_arrays = array();
$query = "select * from {$write_table} WHERE wr_6 <= '".$todate."' AND wr_16 >= '".$frdate."' and wr_6 <> '' and wr_16 <> '' ".$sql_where;
$res = sql_query($query);
while($row = sql_fetch_array($res)) {

    if (strstr($row['wr_option'], "secret")) {
        if ($row['mb_id'] !== $member['mb_id'] && !$is_admin) {
            continue;
        }
    }
    $rows = array();
    $rows['title']  = $row['wr_subject'];
    if ($wscb['wrc_display_name']) {
        $rows['title'] = '['.$row['wr_name'].'] '.$rows['title'];
    }
    $rows['start']  = date('Y-m-d', strtotime($row['wr_6']));
    $rows['end']    = date('Y-m-d', strtotime($row['wr_16']));
    $rows['textColor']  = $row['wr_17'];
    $rows['color']      = $row['wr_18'];

    $rows['progress']   = '';
    $rows['repeat']     = '';

    if($bo_table == 'uploaded_works' || $bo_table == 'applied_works'){
        //불러오는 이벤트에 거는 링크는 일자리 게시판의 게시글
        $rows['url'] = G5_BBS_URL.'/board.php?w=u&bo_table='.'works'.'&wr_id='.$row['wr_id'];    
    }else{
        $rows['url'] = G5_BBS_URL.'/board.php?w=u&bo_table='.$bo_table.'&wr_id='.$row['wr_id'];
    }
    
    
    //$rows['url'] = G5_BBS_URL.'/board.php?w=u&bo_table='.$bo_table.'&wr_id='.$row['wr_id'];
    //$rows['url'] = WCAL_PLUGIN_URL.'/skin.view.php?bo_table='.$bo_table.'&wr_id='.$row['wr_id'];
    if ($row['wr_link1'] && !$is_admin && $row['mb_id'] != $member['mb_id']) { // 무조건 새창이면 글을 수정할수없게됨. 비회원은 관리자가 대신 수정,삭제 처리 (회원만 글쓰기 필수)
        $rows['url'] = $row['wr_link1'];
    }

    if ($rows['start'] != $rows['end'] && !$row['wr_7'] && !$row['wr_8']) {
        $rows['end'] = wz_get_addday($rows['end'], 1);
    }

    $rows['start']  = $rows['start'] . ($row['wr_7'] ? 'T'.$row['wr_7'] : '');
    $rows['end']    = $rows['end'] . ($row['wr_8'] ? 'T'.$row['wr_8'] : '');

    $rows['allDay'] = true;
    if ($row['wr_7'] || $row['wr_8']) {
        $rows['allDay'] = false;
    }

    $input_arrays[] = $rows;
}

// Accumulate an output array of event data arrays.
$output_arrays = array();
foreach ($input_arrays as $array) {

	// Convert the input array into a useful Event object
	$event = new Event($array, $timezone);

	// If the event is in-bounds, add it to the output
	if ($event->isWithinDayRange($range_start, $range_end)) {
		$output_arrays[] = $event->toArray();
	}
}

// Send JSON to the client.
echo json_encode($output_arrays);