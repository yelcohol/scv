<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 지원하기 목록 시작 { -->
<div id="apply" class="new_win">
    <h1 id="win_title"><?php echo $g5['title'] ?></h1>
    <div class="new_win_con">
    <ul>
        <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <div class="apply_left2">
                <?=$list[$i]['mb_name']?>
                <?=$list[$i]['mb_occupation']?>
                <?=$list[$i]['mb_career']?>
                <span class="apply_datetime"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$list[$i]['ma_datetime'] ?></span>
                <span class="apply_datetime">&nbsp;&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php echo $list[$i]['ma_state']?></span>
                
                <!-- 근로자: 지원검토중 / 건설사: 수락하기 or 반려하기 -->
                <?php
                if($list[$i]['ma_state']=='지원검토중'){ ?>
                    <a href="<?php echo $list[$i]['accept_href'];  ?>" onclick="accpet(this.href); return false;" class="apply_accept"><i class="far fa-check" aria-hidden="true"></i><span>합격 처리</span></a>
                    <a href="<?php echo $list[$i]['refuse_href'];  ?>" onclick="del(this.href); return false;" class="apply_refuse"><i class="far fa-trash-alt" aria-hidden="true"></i><span>삭제</span></a>
                <?php } ?>
            </div>
        </li>
        <?php }  ?>

        <?php if ($i == 0) echo "<li class=\"empty_li\">자료가 없습니다.</li>";  ?>
    </ul>
    </div>
    <?php echo get_paging($config['cf_write_pages'], $page, $total_page, "?$qstr&amp;page="); ?>
    
    <div class="win_btn">
        <button type="button" onclick="window.close();" class="btn_close">창닫기</button>
    </div>
</div>
<!-- } 지원하기 목록 끝 -->