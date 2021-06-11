<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 지원 내역 목록 시작 { -->
<div id="apply" class="new_win">
    <h1 id="win_title"><?php echo $g5['title'] ?></h1>
	<div class="new_win_con">
	    <ul id="apply_ul">
	        <?php for ($i=0; $i<count($list); $i++) { ?>
	        <li>
	        	<div class="apply_left">
	            	<a href="<?php echo $list[$i]['opener_href_wr_id'] ?>" class="apply_tit" target="_blank" onclick="opener.document.location.href='<?php echo $list[$i]['opener_href_wr_id'] ?>'; window.close(); return false;"><?php echo $list[$i]['subject'] ?></a>
	            	<a href="<?php echo $list[$i]['opener_href'] ?>" class="apply_cate" target="_blank" onclick="opener.document.location.href='<?php echo $list[$i]['opener_href'] ?>'; window.close(); return false;"><?php echo $list[$i]['bo_subject'] ?></a>
	            	<span class="apply_datetime"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $list[$i]['ma_datetime'] ?></span>
                    <span class="apply_datetime">&nbsp;&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php echo $list[$i]['ma_state']?></span>
                </div>
                <?php
                if($list[$i]['ma_state']=='지원검토중'){ ?>
                    <a href="<?php echo $list[$i]['del_href'];  ?>" onclick="del(this.href); return false;" class="apply_del"><i class="fa fa-trash-o" aria-hidden="true"></i><span class="sound_only">삭제</span></a>
                <?php } ?>
	        </li>
	        <?php } ?>
	        <?php if ($i == 0) echo "<li class=\"empty_list\">자료가 없습니다.</li>"; ?>
	    </ul>
	</div>
    <?php echo get_paging($config['cf_mobile_pages'], $page, $total_page, "?$qstr&amp;page="); ?>

    <div class="win_btn">
        <button type="button" onclick="window.close();" class="btn_close">창닫기</button>
    </div>
</div>
<!-- } 지원 내역 목록 끝 -->