<?php
include_once('./_common.php');

$temp_mb_id = $_GET['mb_id'];
$temp_ma_id = $_GET['ma_id'];
$write_table = $g5['write_prefix'] . 'works';
$temp_wr_id = $_GET['wr_id'];
if (!$is_member)
    alert('회원만 이용하실 수 있습니다.');

//apply 테이블에서 해당 튜플의 ma_state값을 '지원 합격'으로 변환
$sql = " update {$g5['apply_table']} 
            set ma_state = '지원 합격'
            where ma_id = '{$temp_ma_id}' ";
sql_query($sql);

//여기에서 합격 소식이 노동자 회원에게 알림이 가야함
//쪽지 or 이메일로 합격 여부를 알려야함

// work_table에서 현재 지원자 수 - 1, 총 모집 인원 - 1
$sql = " update $write_table set wr_4 = wr_4-1,
                                wr_5 = wr_5-1
                                where wr_id = '{$wr_id}' ";
sql_query($sql);

$sql = " update `{$g5['member_table']}` set mb_apply_cnt = '".get_apply_totals($temp_mb_id)."' where mb_id = '{$temp_mb_id}' ";
sql_query($sql);

goto_url('./apply2.php?bo_table=works&wr_id='.$temp_wr_id.'&page='.$page);
?>