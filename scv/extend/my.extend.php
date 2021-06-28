<?php
if ($member['mb_id']) {
    // 근로자면
    if ($member['mb_10'] === 'worker')
        $is_worker = true;

    // 건설사면
    else if ($member['mb_10'] === 'constructor')
        $is_constructor = true;
}

$works_table = $g5['write_preifx'].'works';

$tommorow_origin = date('Y-m-d H:i:s', strtotime("+1 days"));
$tommorow = str_replace('-','',$tommorow_origin);
$today_origin = date('Y-m-d', strtotime("now"));
$today = str_replace('-','',$today_origin);

$now = date('Y-m-d H:i:s');
$first_apply_time = G5_TIME_YMD.' 18:00:00';
$first_apply_confirm_time = G5_TIME_YMD.' 19:00:00';
$second_apply_time = G5_TIME_YMD.' 05:00:00';
$second_apply_confirm_time = G5_TIME_YMD.' 06:00:00';

if($first_apply_time == $now){//18시에 지원 검토중인 내일 시작하는 일자리는 모두 '지원 반려'로 처리
    $sql = " update {$g5['apply_table']} as A join {$works_table} as W on A.wr_id = W.wr_id 
                                         set ma_state = '지원 반려' 
                                         where ma_state = '지원 검토중' and wr_6 = '{$tommorow}'";
    sql_query($sql);                               
}

if($first_apply_confirm_time == $now){ //1차 출근 확정 시기가 끝났을 때 내일 시작하는 일자리가 '지원 합격'이면 모두 '지원 철회'로 처리
    $sql = " update {$g5['apply_table']} as A join {$works_table} as W on A.wr_id = W.wr_id  
                                         set ma_state  = '지원 철회'
                                         where ma_state = '지원 합격' and wr_6 = '{$tommorow}'";
    sql_query($sql);
}

if($second_apply_time == $snow){//05시에 지원 검토중인 내일 시작하는 일자리는 모두 '지원 반려'로 처리 (재모집)
    $sql = " update {$g5['apply_table']} as A join {$works_table} as W on A.wr_id = W.wr_id  
                                         set ma_state = '지원 반려' 
                                         where ma_state = '지원 검토중' and wr_6 = '{$today}'";
    sql_query($sql);
}

if($second_apply_confirm_time == $now){ //2차 출근 확정 시기가 끝났을 때 내일 시작하는 일자리가 '지원 합격'이면 모두 '지원 철회'로 처리 (재모집)
    $sql = " update {$g5['apply_table']} as A join {$works_table} as W on A.wr_id = W.wr_id 
                                         set ma_state  = '지원 철회'
                                         where ma_state = '지원 합격' and wr_6 = '{$today}'";
    sql_query($sql);
}

$end_time = G5_TIME_YMD.' 18:59:59';
?>