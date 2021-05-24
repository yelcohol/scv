<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');

if ($is_guest) {
    $href = './login.php?'.$qstr.'&amp;url='.urlencode(get_pretty_url($bo_table, $wr_id));
    $href2 = str_replace('&amp;', '&', $href);
    echo <<<HEREDOC
    <script>
        alert('회원만 접근 가능합니다.');
        opener.location.href = '$href2';
        window.close();
    </script>
    <noscript>
    <p>회원만 접근 가능합니다.</p>
    <a href="$href">로그인하기</a>
    </noscript>
HEREDOC;
    exit;
}

echo <<<HEREDOC
<script>
    if (window.name != 'win_apply') {
    }
</script>
HEREDOC;

if ($write['wr_is_comment'])
    alert_close('코멘트에는 지원 할 수 없습니다.');

$sql = " select count(*) as cnt from {$g5['apply_table']}
            where mb_id = '{$member['mb_id']}'
            and bo_table = '$bo_table'
            and wr_id = '$wr_id' ";
$row = sql_fetch($sql);
if ($row['cnt']) {

    $back_url = get_pretty_url($bo_table, $wr_id);

    echo <<<HEREDOC
    <script>
    if (confirm('이미 지원하신 공고입니다.\\n\\n지금 지원 내역을 확인하시겠습니까?'))
        document.location.href = './apply.php';
    else
        window.close();
    </script>
    <noscript>
    <p>이미 지원하신 공고입니다.</p>
    <a href="./apply.php">지원 내역 확인하기</a>
    <a href="{$back_url}">돌아가기</a>
    </noscript>
HEREDOC;
    exit;
}

include_once($member_skin_path.'/apply_popin.skin.php');

include_once(G5_PATH.'/tail.sub.php');
?>
