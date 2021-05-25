<?php
// 회원, 비회원 구분
$is_worker = $is_constructor = $is_member = $is_guest = false;
$is_admin = '';
if ($member['mb_id']) {
    $is_member = true;

    // 근로자면
    if ($member['mb_10'] == 'worker')
        $is_worker = true;

    // 건설사면
    else if ($member['mb_10'] == 'constructor')
        $is_constructor = true;
        
    $is_admin = is_admin($member['mb_id']);
    $member['mb_dir'] = substr($member['mb_id'],0,2);
} else {
    $is_guest = true;
    $member['mb_id'] = '';
    $member['mb_level'] = 1; // 비회원의 경우 회원레벨을 가장 낮게 설정
}

?>