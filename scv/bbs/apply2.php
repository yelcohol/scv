<?php
include_once('./_common.php');

if (!$is_constructor)
    alert_close('건설사만 조회할 수 있습니다.');

// 공고 제목 출력
$sql = " select wr_subject from ".$g5['write_prefix'].$_GET['bo_table']." where wr_id = '{$_GET['wr_id']}' ";
$row = sql_fetch($sql);
$wr_subject = $row['wr_subject'];
$g5['title'] = $wr_subject.' 공고에 지원한 사람들';
include_once(G5_PATH.'/head.sub.php');

$sql_common = " from {$g5['apply_table']} where wr_id = '{$_GET['wr_id']}' and bo_table =  '{$_GET['bo_table']}' ";
$sql_order = " order by ma_id desc ";

$sql = " select count(*) as cnt $sql_common ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$list = array();

$sql = " select mb_id
            $sql_common
            $sql_order
            limit $from_record, $rows ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {

    $list[$i] = $row;

    // 순차적인 번호 (순번)
    $num = $total_count - ($page - 1) * $rows - $i;

    $list[$i]['num'] = $num;

    // 멤버 정보
    $sql2 = " select * from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
    $member_result = sql_fetch($sql2);
    $list[$i]['mb_name'] = $member_result['mb_name'];   // 이름
    $list[$i]['mb_occupation'] = $member_result['mb_5'];    // 희망 직종
    $list[$i]['mb_career'] = $member_result['mb_9'];    // 경력

    $sql3 = " select * $sql_common and mb_id = '{$row['mb_id']}' ";
    $row2 = sql_fetch($sql3);
    $list[$i]['ma_datetime'] = $row2['ma_datetime'];    // 지원 시각
    $list[$i]['ma_state'] = $row2['ma_state'];          // 지원 상태

    // 지원 수락하기
    // $list[$i]['ok_href'] = './';

    // 지원 반려하기 - 단순히 삭제가 아니라 거절되었음을 알려줘야 함.
    // $list[$i]['reject_href'] = './apply_delete.php?ma_id='.$row['ma_id'].'&bo_table='.$tmp_write_table.'&wr_id='.$row['wr_id'].'&amp;page='.$page;

}

include_once($member_skin_path.'/apply2.skin.php');

include_once(G5_PATH.'/tail.sub.php');
?>