<?php
include_once('./_common.php');

if (!$is_worker)
    alert_close('근로자만 조회하실 수 있습니다.');

// 공고 제목 출력
$g5['title'] = get_text($member['mb_nick']).'님의 지원 내역';
include_once(G5_PATH.'/head.sub.php');

$works_table = $g5['write_prefix'].'works';

$tommorow_origin = date('Y-m-d H:i:s', strtotime("+1 days"));
$tommorow = str_replace('-','',$tommorow_origin);
$today_origin = date('Y-m-d', strtotime("now"));
$today = str_replace('-','',$today_origin);

$now = date('Y-m-d H:i:s', time());
$first_apply_time = G5_TIME_YMD.' 18:00:00';
$first_apply_confirm_time = G5_TIME_YMD.' 19:00:00';
$second_apply_time = G5_TIME_YMD.' 05:00:00';
$second_apply_confirm_time = G5_TIME_YMD.' 06:00:00';

if($first_apply_time <= $now && $first_apply_confirm_time >= $now){//18시에 지원 검토중인 내일 시작하는 일자리는 모두 '지원 반려'로 처리
    $sql = " update {$g5['apply_table']} as A join {$works_table} as W on A.wr_id = W.wr_id 
                                         set ma_state = '지원 반려' 
                                         where ma_state = '지원검토중' and wr_6 = '{$tommorow}'";
    sql_query($sql);                               
}

if($first_apply_confirm_time <= $now){ //1차 출근 확정 시기가 끝났을 때 내일 시작하는 일자리가 '지원 합격'이면 모두 '지원 철회'로 처리
    $sql = " update {$g5['apply_table']} as A join {$works_table} as W on A.wr_id = W.wr_id  
                                         set ma_state  = '지원 철회'
                                         where ma_state = '지원 합격' and wr_6 = '{$tommorow}'";
    sql_query($sql);
}


$sql_common = " from {$g5['apply_table']} where mb_id = '{$member['mb_id']}' ";
$sql_order = " order by ma_id desc ";

$sql = " select count(*) as cnt $sql_common ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$list = array();

$sql = " select *
            $sql_common
            $sql_order
            limit $from_record, $rows ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {

    $list[$i] = $row;

    // 순차적인 번호 (순번)
    $num = $total_count - ($page - 1) * $rows - $i;

    // 게시판 제목
    $sql2 = " select bo_subject from {$g5['board_table']} where bo_table = '{$row['bo_table']}' ";
    $row2 = sql_fetch($sql2);
    if (!$row2['bo_subject']) $row2['bo_subject'] = '[게시판 없음]';

    // 게시물 제목
    $tmp_write_table = $g5['write_prefix'] . $row['bo_table'];
    $sql3 = " select wr_subject,wr_6,mb_id from $tmp_write_table where wr_id = '{$row['wr_id']}' ";
    $row3 = sql_fetch($sql3, FALSE);
    $subject = get_text(cut_str($row3['wr_subject'], 100));
    if (!$row3['wr_subject'])
        $row3['wr_subject'] = '[글 없음]';

    //해당 일자리 게시글의 시작 날짜의 전날이 오늘이고 17시00분에서 17시59분 사이인 경우, 그리고 ma_state가 '지원합격'인 경우 최종 출근 할지 안 할지 결정하는 버튼 
    $confirm_check = false;
    $re_confirm = false;
    $start_date = date('Y-m-d',strtotime($row3['wr_6']));
    $start_time = G5_TIME_YMD.' 18:00:00';
    $end_time = G5_TIME_YMD.' 18:59:59';
    if(date("Y-m-d",strtotime ("+1 days")) == $start_date && strtotime(date('Y-m-d H:i:s')) >= strtotime($start_time) && strtotime(date('Y-m-d H:i:s')) <= strtotime($end_time)){
        if($row['ma_state'] == '지원 합격'){
            $confirm_check = true;
        }
    }

    $start_time = G5_TIME_YMD.' 05:00:00';
    $end_time = G5_TIME_YMD.' 05:59:59';
    if(date("Y-m-d",strtotime("now")) == $start_date && strtotime(date('Y-m-d H:i:s')) >= strtotime($start_time) && strtotime(date('Y-m-d H:i:s')) <= strtotime($end_time)){
        if($row['ma_state'] == '지원 합격'){
            $confirm_check = true;
            $re_confirm = true;
        }
    }

    $list[$i]['num'] = $num;
    $list[$i]['opener_href'] = get_pretty_url($row['bo_table']);
    $list[$i]['opener_href_wr_id'] = get_pretty_url($row['bo_table'], $row['wr_id']);
    $list[$i]['bo_subject'] = $row2['bo_subject'];
    $list[$i]['subject'] = $subject;
    $list[$i]['confirm_check'] = $confirm_check;
    if($re_confirm){
        $list[$i]['confirm_href'] = './apply_memo_form.php?re=1&val=3&ma_id='.$row['ma_id'].'&wr_id='.$row['wr_id'].'&me_recv_mb_id='.$row3['mb_id'].'&amp;page='.$page;
        $list[$i]['confirm_refuse_href'] = './apply_memo_form.php?re=1&val=4&ma_id='.$row['ma_id'].'&wr_id='.$row['wr_id'].'&me_recv_mb_id='.$row3['mb_id'].'&amp;page='.$page;
    }else{
        $list[$i]['confirm_href'] = './apply_memo_form.php?val=3&ma_id='.$row['ma_id'].'&wr_id='.$row['wr_id'].'&me_recv_mb_id='.$row3['mb_id'].'&amp;page='.$page;
        $list[$i]['confirm_refuse_href'] = './apply_memo_form.php?val=4&ma_id='.$row['ma_id'].'&wr_id='.$row['wr_id'].'&me_recv_mb_id='.$row3['mb_id'].'&amp;page='.$page;
    }
    $list[$i]['del_href'] = './apply_delete.php?ma_id='.$row['ma_id'].'&bo_table='.$row['bo_table'].'&wr_id='.$row['wr_id'].'&amp;page='.$page;
}

include_once($member_skin_path.'/apply.skin.php');
include_once(G5_PATH.'/tail.sub.php');
?>