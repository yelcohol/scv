<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');

// 재모집
$re = $_POST['re'];

if (!$is_member)
{
    $href = './login.php?'.$qstr.'&amp;url='.urlencode(get_pretty_url($bo_table, $wr_id));
    echo '<script> alert(\'회원만 접근 가능합니다.\'); top.location.href = \''.str_replace('&amp;', '&', $href).'\'; </script>';
    exit;
}

// 게시글 존재하는지
if(!$write['wr_id'])
    alert_close('지원하시려는 게시글이 존재하지 않습니다.');

// g5_apply에 지원내역 추가
if($re == 1){
    $sql = "update {$g5['apply_table']} set ma_state = '지원검토중',
                                            ma_datetime = '".G5_TIME_YMDHIS."'
                                            where wr_id = '{$wr_id}' and mb_id = '{$member['mb_id']}'";
}else{
    $sql = " insert into {$g5['apply_table']} ( mb_id, bo_table, wr_id, ma_datetime ) values 
                                            ( '{$member['mb_id']}', '$bo_table', '$wr_id', '".G5_TIME_YMDHIS."' ) ";
}
sql_query($sql);

// works table에서 현재 지원자 수 1 증가
$sql = " update {$write_table} set wr_4 = wr_4 + 1 where wr_id = '{$wr_id}' ";
sql_query($sql);

// g5_member에서 지원횟수 추가
$sql = " update `{$g5['member_table']}` set mb_apply_cnt = '".get_apply_totals($member['mb_id'])."' where mb_id = '{$member['mb_id']}' ";
sql_query($sql);

delete_cache_latest($bo_table);

echo <<<HEREDOC
<script>
    if (confirm('이 공고에 지원 하였습니다.\\n\\n지금 지원 내역을 확인하시겠습니까?'))
        document.location.href = './apply.php';
    else
        window.close();
</script>
<noscript>
<p>이 공고에 지원하였습니다.</p>
<a href="./apply.php">지원 내역 확인하기</a>
</noscript>
HEREDOC;
?>
