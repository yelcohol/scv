<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

if ($is_guest)
    alert('회원만 이용하실 수 있습니다.');

if (!chk_captcha()) {
    alert('자동등록방지 숫자가 틀렸습니다.');
}

$val = $_POST['val'];
$mb_id = $_POST['me_recv_mb_id'];
$ma_id = isset($_POST['ma_id']) ? $_POST['ma_id'] : -1;
$recv_list = isset($_POST['me_recv_mb_id']) ? explode(',', trim($_POST['me_recv_mb_id'])) : array();
$str_nick_list = '';
$msg = '';
$error_list  = array();
$member_list = array('id'=>array(), 'nick'=>array());

run_event('memo_form_update_before', $recv_list);

for ($i=0; $i<count($recv_list); $i++) {
    $row = sql_fetch(" select mb_id, mb_nick, mb_open, mb_leave_date, mb_intercept_date from {$g5['member_table']} where mb_id = '{$recv_list[$i]}' ");
    if ($row) {
        if ($is_admin || ($row['mb_open'] && (!$row['mb_leave_date'] && !$row['mb_intercept_date']))) {
            $member_list['id'][]   = $row['mb_id'];
            $member_list['nick'][] = $row['mb_nick'];
        } else {
            $error_list[]   = $recv_list[$i];
        }
    }
    /*
    // 관리자가 아니면서
    // 가입된 회원이 아니거나 정보공개를 하지 않았거나 탈퇴한 회원이거나 차단된 회원에게 쪽지를 보내는것은 에러
    if ((!$row['mb_id'] || !$row['mb_open'] || $row['mb_leave_date'] || $row['mb_intercept_date']) && !$is_admin) {
        $error_list[]   = $recv_list[$i];
    } else {
        $member_list['id'][]   = $row['mb_id'];
        $member_list['nick'][] = $row['mb_nick'];
    }
    */
}

$error_msg = implode(",", $error_list);

if ($error_msg && !$is_admin)
    alert("회원아이디 '{$error_msg}' 은(는) 존재(또는 정보공개)하지 않는 회원아이디 이거나 탈퇴, 접근차단된 회원아이디 입니다.\\n쪽지를 발송하지 않았습니다.");

if (! count($member_list['id'])){
    alert('해당 회원이 존재하지 않습니다.');
}

if (!$is_admin) {
    if (count($member_list['id'])) {
        $point = (int)$config['cf_memo_send_point'] * count($member_list['id']);
        if ($point) {
            if ($member['mb_point'] - $point < 0) {
                alert('보유하신 포인트('.number_format($member['mb_point']).'점)가 모자라서 쪽지를 보낼 수 없습니다.');
            }
        }
    }
}

$sql = " select wr_6 from {$write_table} where wr_id = '{$wr_id}'";
$row = sql_fetch($sql);
$start_date = $row['wr_6'];
$sql = "select count(*) as cnt 
    from {$g5['apply_table']} as A join {$write_table} as W on A.wr_id = W.wr_id 
    where A.mb_id = '{$member['mb_id']}' and W.wr_6 = '{$start_date}' and A.ma_state = '출근 확정'";

$row = sql_fetch($sql);
if($row['cnt']){
    alert("출근 확정한 경우 재모집 공고에 지원할 수 없습니다.", G5_BBS_URL.'/board.php?bo_table='.$bo_table);
}

$sql = " select count(*) as cnt from {$g5['apply_table']}
            where mb_id = '{$member['mb_id']}'
            and bo_table = '$bo_table'
            and wr_id = '$wr_id'";
$row = sql_fetch($sql);
if ($row['cnt']) {

    $back_url = get_pretty_url($bo_table, $wr_id);

    if($re == 1){
        echo <<<HEREDOC
        <script>
        if (confirm('지원했던 공고에 다시 지원은 불가합니다.\\n\\n지금 지원 내역을 확인하시겠습니까?'))
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
    }else{
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
    
}

for ($i=0; $i<count($member_list['id']); $i++) {
    $tmp_row = sql_fetch(" select max(me_id) as max_me_id from {$g5['memo_table']} ");
    $me_id = $tmp_row['max_me_id'] + 1;

    $recv_mb_id   = $member_list['id'][$i];
    $recv_mb_nick = get_text($member_list['nick'][$i]);

    // 받는 회원 쪽지 INSERT
    $sql = " insert into {$g5['memo_table']} ( me_recv_mb_id, me_send_mb_id, me_send_datetime, me_memo, me_read_datetime, me_type, me_send_ip ) values ( '$recv_mb_id', '{$member['mb_id']}', '".G5_TIME_YMDHIS."', '{$_POST['me_memo']}', '0000-00-00 00:00:00' , 'recv', '{$_SERVER['REMOTE_ADDR']}' ) ";

    sql_query($sql);

    if( $me_id = sql_insert_id() ){

        // 보내는 회원 쪽지 INSERT
        $sql = " insert into {$g5['memo_table']} ( me_recv_mb_id, me_send_mb_id, me_send_datetime, me_memo, me_read_datetime, me_send_id, me_type , me_send_ip ) values ( '$recv_mb_id', '{$member['mb_id']}', '".G5_TIME_YMDHIS."', '{$_POST['me_memo']}', '0000-00-00 00:00:00', '$me_id', 'send', '{$_SERVER['REMOTE_ADDR']}' ) ";
        sql_query($sql);
		
		$member_list['me_id'][$i] = $me_id;
    }

    // 실시간 쪽지 알림 기능
    $sql = " update {$g5['member_table']} set mb_memo_call = '{$member['mb_id']}', mb_memo_cnt = '".get_memo_not_read($recv_mb_id)."' where mb_id = '$recv_mb_id' ";
    sql_query($sql);

    if (!$is_admin) {
        insert_point($member['mb_id'], (int)$config['cf_memo_send_point'] * (-1), $recv_mb_nick.'('.$recv_mb_id.')님께 쪽지 발송', '@memo', $recv_mb_id, $me_id);
    }
}

    // $redirect_url = "";
    // $str_nick_list = implode(',', $member_list['nick']);
    // $alert_message = "";

    // if($val == 0){
    //     $redirect_url = G5_HTTP_BBS_URL."/apply_refuse.php?wr_id=".$_POST['wr_id']."&mb_id=".$mb_id."&ma_id=".$ma_id;
    //     $alert_message = "지원자 불합격 처리됐습니다.";
    // }else if($val == 1){
    //     $redirect_url = G5_HTTP_BBS_URL."/apply_accept.php?wr_id=".$_POST['wr_id']."&mb_id=".$mb_id."&ma_id=".$ma_id;
    //     $alert_message = "지원자 합격 처리됐습니다.";
    // }else{
    //     $redirect_url = G5_HTTP_BBS_URL."/apply_popin.php?bo_table=".$_POST['bo_table']."&wr_id=".$_POST['wr_id'];
    //     $alert_message = "지원 메시지를 보냈습니다.";
    // }

    // run_event('memo_form_update_after', $member_list, $str_nick_list, $redirect_url, $_POST['me_memo']);

    // alert($alert_message, $redirect_url, false);

if ($member_list) {


    $redirect_url = "";
    $str_nick_list = implode(',', $member_list['nick']);
    $alert_message = "";

    if($val == 0){
        $redirect_url = G5_HTTP_BBS_URL."/apply_refuse.php?wr_id=".$_POST['wr_id']."&mb_id=".$mb_id."&ma_id=".$ma_id;
        $alert_message = "지원자 불합격 처리됐습니다.";
    }else if($val == 1){
        $redirect_url = G5_HTTP_BBS_URL."/apply_accept.php?wr_id=".$_POST['wr_id']."&mb_id=".$mb_id."&ma_id=".$ma_id;
        $alert_message = "지원자 합격 처리됐습니다.";
    }
    else if($val == 3){//출근 확정
        $redirect_url = G5_HTTP_BBS_URL."/apply_confirm.php?wr_id=".$_POST['wr_id']."&ma_id=".$ma_id;
        $alert_message = "출근 확정했습니다.";
    }
    else if($val == 4){//지원 철회
        $redirect_url = G5_HTTP_BBS_URL."/apply_confirm_refuse.php?wr_id=".$_POST['wr_id']."&ma_id=".$ma_id;
        $alert_message = "지원 철회했습니다.";
    }
    else{
        $redirect_url = G5_HTTP_BBS_URL."/apply_popin.php?bo_table=".$_POST['bo_table']."&wr_id=".$_POST['wr_id'];
        $alert_message = "지원 메시지를 보냈습니다.";
    }

    run_event('memo_form_update_after', $member_list, $str_nick_list, $redirect_url, $_POST['me_memo']);

    alert($alert_message, $redirect_url, false);

    // $redirect_url = G5_HTTP_BBS_URL."/apply_popin.php?bo_table=".$_POST['bo_table']."&wr_id=".$_POST['wr_id'];
    // $str_nick_list = implode(',', $member_list['nick']);

    // run_event('memo_form_update_after', $member_list, $str_nick_list, $redirect_url, $_POST['me_memo']);

    // alert("지원 메시지를 보냈습니다.", $redirect_url, false);
} else {
    if($is_constructor){
        $redirect_url = G5_HTTP_BBS_URL."/apply2.php";
    }
    else{
        $redirect_url = G5_HTTP_BBS_URL."/apply.php";
    }
    
    run_event('memo_form_update_failed', $member_list, $redirect_url, $_POST['me_memo']);

    alert("공고 등록자의 아이디 오류 같습니다.", $redirect_url, false);
}