<?php
include_once('./_common.php');

if (!$is_member)
    alert('회원만 이용하실 수 있습니다.');

$temp_ma_id = $_GET['ma_id'];
$write_table = $g5['write_prefix'].'works';
$wr_id = $_GET['wr_id'];

$sql = " update {$g5['apply_table']}    set ma_state = '출근 확정'
                                        where mb_id = '{$member['mb_id']}' and ma_id = '{$temp_ma_id}' ";
sql_query($sql);

// works table에서 현재 지원자 수 1, 총 모집인원 1 감소
$sql2 = " update {$write_table} set wr_4 = wr_4-1
                            where wr_id = '{$wr_id}' ";
sql_query($sql2);

$tommorow_cur = date("Y-m-d",strtotime ("+1 days"));
$tommorow_final = str_replace("-", "", $tommorow_cur);

$sql3 = " update {$g5['apply_table']}    set ma_state = '지원 철회'
                                        where mb_id = '{$member['mb_id']}' and ma_state = '지원 합격' 
                                        and wr_id in (select wr_id from {$write_table} where wr_6 = '{$tommorow_final}')";
sql_query($sql3);

$sql4 = " update {$write_table} set wr_4 = wr_4-1
                            where wr_id in (select wr_id from {$write_table} where wr_6 = '{$tommorow_final}')";
sql_query($sql4);

$sql = " update `{$g5['member_table']}` set mb_apply_cnt = '".get_apply_totals($member['mb_id'])."' where mb_id = '{$member['mb_id']}' ";
sql_query($sql);

goto_url('./apply.php?page='.$page);
?>
