<!-- if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
**include_once('./_common.php');
**$wr_id=$_GET['wr_id'];
echo $write;
$board = get_board_db($bo_table);
if (isset($wr_id) && $wr_id) {
    $write = get_write($write_table, $wr_id);
} else if (isset($wr_seo_title) && $wr_seo_title) {
    $write = get_content_by_field($write_table, 'bbs', 'wr_seo_title', generate_seo_title($wr_seo_title));
    if( isset($write['wr_id']) ){
        $wr_id = $write['wr_id'];
    }
}
echo $wr_id;
echo var_dump($write->num_rows);
if ($bo_table) {
    $board = get_board_db($bo_table);
    if ($board['bo_table']) {
        set_cookie("ck_bo_table", $board['bo_table'], 86400 * 1);
        $gr_id = $board['gr_id'];
        $write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름

        if (isset($wr_id) && $wr_id) {
                $write = get_write($write_table, $wr_id);
        } else if (isset($wr_seo_title) && $wr_seo_title) {
            $write = get_content_by_field($write_table, 'bbs', 'wr_seo_title', generate_seo_title($wr_seo_title));
            if( isset($write['wr_id']) ){
                $wr_id = $write['wr_id'];
            }
        }
    }
}
echo $write['wr_num'];
echo $write['wr_1'];
echo $board;
echo $board_skin_path;
$view = get_view($write, $board, $board_skin_path);
echo $view['wr_1'];
$sql = " select wr_id, wr_subject, wr_datetime from {$write_table} where wr_num = '{$write['wr_num']}'";
$prev = sql_fetch($sql);
var_dump($prev->num_rows);
echo $view['wr_1'];

$qry=sql_query(" select wr_4, wr_11 from {$write_table} where wr_id='{$wr_id}' ");
$row=sql_fetch_array($qry);     //배열로 저장
$wr_4=$row['wr_4'];     // 총 인원
$wr_11=$row['wr_11'];   // 지원 인원
**$bbs=G5_BBS_URL;        // https://localhost:81/gnu/bbs
echo $bbs;              // free
echo $bo_table;         // g5_write_free
**sql_query(" update {$write_table} set wr_11 = wr_11 + 1 where wr_id = '{$wr_id}' ");    // 지원 인원 1 증가
**sql_query(" update {$write_table} set wr_12 = concat( wr_12,',','{$member['mb_id']}') where wr_id = '{$wr_id}' ");      // 지원자 이름 추가
**Header("location:$bbs/board.php?bo_table=$bo_table");   // 이전 페이지인 게시물 리스트 화면으로 이동 -->



<!-- 스크랩 인용 -->
<?php
include_once('./_common.php');

if (!$is_member)
    alert_close('회원만 조회하실 수 있습니다.');

$g5['title'] = get_text($member['mb_nick']).'님의 지원 내역';
include_once(G5_PATH.'/head.sub.php');

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
    $sql3 = " select wr_subject from $tmp_write_table where wr_id = '{$row['wr_id']}' ";
    $row3 = sql_fetch($sql3, FALSE);
    $subject = get_text(cut_str($row3['wr_subject'], 100));
    if (!$row3['wr_subject'])
        $row3['wr_subject'] = '[글 없음]';

    $list[$i]['num'] = $num;
    $list[$i]['opener_href'] = get_pretty_url($row['bo_table']);
    $list[$i]['opener_href_wr_id'] = get_pretty_url($row['bo_table'], $row['wr_id']);
    $list[$i]['bo_subject'] = $row2['bo_subject'];
    $list[$i]['subject'] = $subject;
    $list[$i]['del_href'] = './apply_delete.php?ma_id='.$row['ma_id'].'&amp;page='.$page;
}

include_once($member_skin_path.'/apply.skin.php');

include_once(G5_PATH.'/tail.sub.php');
?>