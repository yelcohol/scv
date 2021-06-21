<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<article id="bo_v" style="width:<?php echo $width; ?>">
	<div class="bo_v_innr">
	    <header class="bo_top_hd">
	        <h2 id="bo_v_title">
	            <?php if($view['ca_name']) { ?><span class="bo_v_cate">[<?php echo $view['ca_name']; // 분류 출력 끝 ?>]</span><?php } ?>
	            <span class="bo_v_tit"><?php echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력 ?></span>
				<span style="float:right;">
				<?php 
				if($is_worker){
					if($view['ca_name']!='모집종료'){
						echo '<a href='.$apply_href.' target="_blank" class="btn_b01 btn" onclick="win_apply(this.href); return false;"><i class="fa fa-check-circle"></i> <span class="hidden-xs">지원하기</span></a>';
							}
					else{
						echo '<h3 style="color:red"><b>지원마감</b></h3>';
					}
				}?>
				<?php 
				if($is_constructor && $view['mb_id'] == $member['mb_id']) {?>
					<a style="float:right;" href="<?=$apply_cons_href?>" target="_blank" class="btn_b01 btn" onclick="win_apply_cons(this.href); return false;"><i class="fa fa-check-circle" aria-hidden="true"></i> 지원내역 확인하기</a>
				<?php } ?>
				</span>
	        </h2>
	        <div id="bo_v_info">
	        	<h2>페이지 정보</h2>
	        	<div class="profile_info">
	        		<div class="profile_img"><?php echo get_member_profile_img($view['mb_id']) ?></div>
	        		<span class="sound_only">작성자</span><?php echo $view['name'] ?>
	        		<span class="ip"><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></span>
	        		<span class="sound_only">조회</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($view['wr_hit']) ?>회</strong>
	        		<span class="sound_only">작성일</span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $view['wr_datetime'] ?></span>
					<?php if ($scrap_href&&$is_worker) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="bo_vc_btn btn_scrap" onclick="win_scrap(this.href); return false;"><i class="fa fa-thumb-tack" aria-hidden="true"></i><span> 찜하기</span></a><?php } ?>
					<a href="#bo_vc" class="bo_vc_btn"><span class="sound_only">댓글</span><i class="far fa-comment-dots"></i> <?php echo $view['wr_comment'] ?></a>
	        	</div>
	        </div>
	    </header>
	
		<section id="bo_v_atc">
	        <h2 id="bo_v_atc_title">본문</h2>
			
			<!-- <?php if ( $good_href || $nogood_href || $scrap_href || $sns_msg) { ?>
			<aside id="bo_v_aside">
		        <div id="bo_v_act">
			        <?php if ( $good_href || $nogood_href) { //추천, 비추천 ?>
		
		            <?php if ($good_href) { ?>
		            <span class="bo_v_act_gng">
		                <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="bo_v_good"><i class="far fa-smile-wink"></i><br><span class="sound_only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></a>
		                <b id="bo_v_act_good">이 글을 추천하셨습니다</b>
		            </span>
		            <?php } ?>
		
		            <?php if ($nogood_href) { ?>
		            <span class="bo_v_act_gng">
		                <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="bo_v_nogood"><i class="far fa-angry"></i><br><span class="sound_only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
		                <b id="bo_v_act_nogood"></b>
		            </span>
		            <?php } ?>
		
			        <?php } else { if($board['bo_use_good'] || $board['bo_use_nogood']) { ?>
		
			        <?php if($board['bo_use_good']) { ?><span class="bo_v_good"><i class="far fa-smile-wink"></i><br><span class="sound_only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
			        <?php if($board['bo_use_nogood']) { ?><span class="bo_v_nogood"><i class="far fa-angry"></i><br><span class="sound_only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
		
			        <?php
			            }
			        }
			        ?>
		    	</div>				
				<div id="bo_v_share">
		    		<?php include_once($board_skin_path. "/view.sns.skin.php"); ?>
		        </div>
	    	</aside>
	        <?php } ?> -->
	        
	        <?php
	        // 파일 출력
	        $v_img_count = count($view['file']);
	        if($v_img_count) {
	            echo "<div id=\"bo_v_img\">\n";
	
	            for ($i=0; $i<=count($view['file']); $i++) {
	                if ($view['file'][$i]['view']) {
	                    //echo $view['file'][$i]['view'];
	                    echo get_view_thumbnail($view['file'][$i]['view']);
	                }
	            }
	            echo "</div>\n";
	        }
			?>

		<!-- 본문 내용 시작 -->
		<table class="viewTable">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 80%;">
            </colgroup>
            <thead></thead>

			<!-- 요일 계산 -->
			<?php 
			$weekString = array("일", "월", "화", "수", "목", "금", "토");
			$start_day = ($weekString[date('w', strtotime($view['wr_6']))]);
			$end_day = ($weekString[date('w', strtotime($view['wr_16']))]);
			?>

			<!-- 모집 직종 수정 -->
			<?php 
			$new_wr_9 = explode("|", $view['wr_9']); 
			$new_wr_9 = implode(", ", $new_wr_9); 
			?>

			<!-- 근무 상세 정보 -->
            <tbody>
				<tr>
					<th>회사명</th>	
					<td>
						<span><?=$view['wr_1']?></span>
					</td>
				</tr>
				<tr>
					<th>담당자</th>
					<td>
						<span><?=$view['wr_2']."(".$view['wr_3'].")"?></span>
					</td>
				</tr>
				<tr>
					<th>근무지</th>
					<td>
						<span><?=$view['wr_12'].' '.$view['wr_14'].' '.$view['wr_13']?></span>
					</td>
				</tr>
                <tr>
                    <th>급여</th>
                    <td class="payInfo">
                        <div class="payInfoBox">
                            <span class="textPoint"><strong>일급</strong></span>
                            <span class="monthPay"><?=number_format($view['wr_10'])?><span>원</span></span>
                            <div>
                                                                                                                                                                                                                </div>
                            </div>
                            <div class="summary"><?='
							고용보험료(0.8%): '.number_format((int)$view['wr_10']*0.008).'원<br>
							수수료(9%): '.number_format($view['wr_10']*0.09).'원<br>
							&#8658;실수령: '.number_format($view['wr_10']*0.902).'원'?>
						</div>
                    </td>
                </tr>
                <tr>
                    <th>근무기간</th>
                    <td>
						<span class="textPoint letter_0"><?=date("m.d", strtotime($view['wr_6']))."(".$start_day.") ~ ".date("m.d", strtotime($view['wr_16']))."(".$end_day.")"?></span>
                            
                    </td>
                </tr>
                <tr>
                    <th>근무시간</th>
                    <td>
                        <span class="letter_0">
                            <?=$view['wr_7']."~".$view['wr_8']?>
                        </span>
                    </td>
                </tr>

            <tr>
                <th>모집 직종</th>
                <td>
					<span><?=$new_wr_9?></span>
            </tr>
			<tr>
                <th>모집 인원</th>
                <td>
					<span><?=$view['wr_5']?></span>
            </tr>
			<tr>
                <th>준비물</th>
                <td>
					<span><?=$view['wr_15']?></span>
            </tr>
            <tr>
                <th>복리후생</th>
	            <td>
                	<span><?=$view['wr_17']?></span>
                </td>
            </tr>

            </tbody>
        </table>
		<div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
	        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
	
	        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } //서명 ?>
	
			<?php
				if ($view['file']['count']) {
	        	$cnt = 0;
	        	for ($i=0; $i<count($view['file']); $i++) {
	            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
	                $cnt++;
					}
				}
			?>
	
		    <?php if($cnt) { ?>
			<section id="bo_v_file">
		        <h2>첨부파일</h2>
		        <ul>
		        <?php
		        // 가변 파일
		        for ($i=0; $i<count($view['file']); $i++) {
		            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
		         ?>
		            <li>
		                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
		                    <i class="fa fa-download" aria-hidden="true"></i>
		                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
		                    <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
		                </a>
		                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span> |
		                <span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
		            </li>
		        <?php
		            }
		        }
		         ?>
		        </ul>
			</section>
			<?php } ?>
	
		    <?php if(isset($view['link'][1]) && $view['link'][1]) { ?>
		    <!-- 관련링크 시작 { -->
		    <section id="bo_v_link">
		        <h2>관련링크</h2>
		        <ul>
		        <?php
		        // 링크
		        $cnt = 0;
		        for ($i=1; $i<=count($view['link']); $i++) {
		            if ($view['link'][$i]) {
		                $cnt++;
		                $link = cut_str($view['link'][$i], 70);
		         ?>
		            <li>
		                <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
		                    <i class="fa fa-link" aria-hidden="true"></i>
		                    <strong><?php echo $link ?></strong>
		                </a>
		                <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
		            </li>
		        <?php
		            }
		        }
		         ?>
		        </ul>
		    </section>
		    <!-- } 관련링크 끝 -->
		    <?php } ?>
		    
		    <?php if ($prev_href || $next_href) { ?>
		    <ul class="bo_v_nb">
		        <?php if ($prev_href) { ?><li class="bo_v_prev"><a href="<?php echo $prev_href ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> 이전글 <br><span><?php echo $prev_wr_subject;?></a></span></li><?php } ?>
		        <?php if ($next_href) { ?><li class="bo_v_next"><a href="<?php echo $next_href ?>">다음글<i class="fa fa-angle-right" aria-hidden="true"></i><br><span><?php echo $next_wr_subject;?></a></span></li><?php } ?>
		    </ul>
		    <?php } ?>
	    </section>
	</div>
	
	<div id="bo_btn">
		<div id="bo_v_option">
			<?php echo $view['btn_option'] // 게시물 옵션 ?>
			<?php if($update_href || $delete_href || $copy_href || $move_href || $search_href) { ?>
			<ul id="bo_v_opt">
		        <?php ob_start(); ?>
		        	<?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></li><?php } ?>
		            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" onclick="del(this.href); return false;" class="btn_b01">삭제</a></li><?php } ?>
		            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" onclick="board_move(this.href); return false;" class="btn_b01">복사</a></li><?php } ?>
		            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" onclick="board_move(this.href); return false;" class="btn_b01">이동</a></li><?php } ?>
		            <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>">검색</a></li><?php } ?>
		        <?php $link_buttons = ob_get_contents(); ob_end_flush(); ?>
	        </ul>
	        <?php } ?>
		</div>
			
		<div class="btn_top top">
			<a href="<?php echo $list_href ?>" class="btn_b02"> 목록</a>
	        <?php if ($reply_href) { ?><a href="<?php echo $reply_href ?>" class="btn_b02">답변</a><?php } ?>
	        <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b01 btn">글쓰기</a><?php } ?>
	    </div>
	</div>
    <?php include_once(G5_BBS_PATH.'/view_comment.php'); // 댓글 입출력 ?>
</article>

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<!-- 게시글 보기 끝 -->

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();

    //sns공유
    // $(".btn_share").click(function(){
        // $("#bo_v_sns").fadeIn();
    // });
// 
    // $(document).mouseup(function (e) {
        // var container = $("#bo_v_sns");
        // if (!container.is(e.target) && container.has(e.target).length === 0){
            // container.css("display","none");
        // }
    // });
// 
    // $(document).mouseup(function (e) {
        // var container = $("#bo_v_opt");
        // if (!container.is(e.target) && container.has(e.target).length === 0){
            // container.css("display","none");
        // }
    // });

    //게시글 옵션
    $(".bo_v_opt").click(function(){
        $("#bo_v_opt").fadeIn();
    });

});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
