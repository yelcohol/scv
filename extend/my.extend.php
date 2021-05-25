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

$write = array();
$write_table = '';
if ($bo_table) {
    $board = get_board_db($bo_table, true);
    if (isset($board['bo_table']) && $board['bo_table']) {
        set_cookie("ck_bo_table", $board['bo_table'], 86400 * 1);
        $gr_id = $board['gr_id'];
        $jobs_switch = 0;
        if($bo_table == 'my_works'){
            $write_table = $g5['write_prefix'] . 'work';
            $jobs_switch = 1;
        }
        else{
            $write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
        }
        //$write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름

        if (isset($wr_id) && $wr_id) {
            $write = get_write($write_table, $wr_id);
        } else if (isset($wr_seo_title) && $wr_seo_title) {
            $write = get_content_by_field($write_table, 'bbs', 'wr_seo_title', generate_seo_title($wr_seo_title));
            if( isset($write['wr_id']) ){
                $wr_id = $write['wr_id'];
            }
        }
    }
    
    // 게시판에서 
    if (isset($board['bo_select_editor']) && $board['bo_select_editor']){
        $config['cf_editor'] = $board['bo_select_editor'];
    }
}
?>