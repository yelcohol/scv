<?php
include_once('./_common.php');

if (!$is_member)
    alert('회원만 이용하실 수 있습니다.');

$temp_ma_id = $_GET['ma_id'];

$sql = "update {$g5['apply_table']}  set ma_state = '지원 철회'
                                     where mb_id = '{$member['mb_id']}' and ma_id = '{$temp_ma_id}' ";
sql_query($sql);

// works table에서 현재 지원자 수 1 감소
$sql2 = " update {$write_table} set wr_4 = wr_4-1 where wr_id = '{$wr_id}' ";
sql_query($sql2);

$sql = " update `{$g5['member_table']}` set mb_apply_cnt = '".get_apply_totals($member['mb_id'])."' where mb_id = '{$member['mb_id']}' ";
sql_query($sql);

goto_url('./apply.php?page='.$page);
?>
