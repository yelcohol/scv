<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 지원하기 목록 시작 { -->
<div id="apply" class="new_win">
    <h1 id="win_title"><?php echo $g5['title'] ?></h1>
    <ul>
        <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?=$list[$i]['mb_name']?>
            <?=$list[$i]['mb_occupation']?>
            <?=$list[$i]['mb_career']?>
            <span class="apply_datetime"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$list[$i]['ma_datetime'] ?></span>
            <span class="apply_datetime">&nbsp;&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php echo $list[$i]['ma_state']?></span>
            <!-- 삭제는 '지원검토중' 상태일 때만 가능하다 -->
            <?php
            if($list[$i]['ma_state']=='지원검토중'){ ?>
                <a href="<?php echo $list[$i]['accept_href'];  ?>" onclick="accpet(this.href); return false;" class="apply_datetime"><i class="fas fa-check"></i><span>합격 처리</span></a>
                <a href="<?php echo $list[$i]['del_href'];  ?>" onclick="del(this.href); return false;" class="apply_datetime"><i class="far fa-trash-alt"></i><span>삭제</span></a>
            <?php } ?>
        </li>
        <?php }  ?>

        <?php if ($i == 0) echo "<li class=\"empty_li\">자료가 없습니다.</li>";  ?>
    </ul>
    <?php echo get_paging($config['cf_write_pages'], $page, $total_page, "?$qstr&amp;page="); ?>

    <div class="win_btn">
        <button type="button" onclick="window.close();" class="btn_close">창닫기</button>
    </div>
</div>
<!-- } 지원하기 목록 끝 -->