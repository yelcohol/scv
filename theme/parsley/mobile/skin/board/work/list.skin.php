<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//하루에 한번 날짜로 카테고리 업데이트
if(G5_TIME_YMD != $board['bo_1']){

	$sql = " select wr_id, ca_name, wr_5 from {$write_table} where wr_is_comment = 0 order by wr_id desc limit 0, 1000 ";
	$result = sql_query($sql);
	for ($i=0; $row = sql_fetch_array($result); $i++) {
		if($row['ca_name']=='모집중' && ($row['wr_6'] < G5_TIME_YMD || $row['wr_4']==$row['wr_5'])){
			sql_query(" update {$write_table} set ca_name='모집종료' where wr_id = {$row['wr_id']} ");
		}
	}
	sql_query(" update g5_board set bo_1_subj='카테고리업데이트', bo_1='".G5_TIME_YMD."' where bo_table ='$bo_table' ");
    
}


// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;

foreach($list as $i => $v) {
    $list[$i]['wr_reply_style'] = "padding-left:". ($list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '0'). "px";
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<!-- 게시판 목록 시작 -->
<div id="bo_list">
	<div class="bo_list_innr">
		<?php if ($is_category) { ?>
	    <nav id="bo_cate">
	        <h2><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> 카테고리</h2>
	        <ul id="bo_cate_ul">
	            <?php echo $category_option ?>
	        </ul>
	    </nav>
	    <?php } ?>
		
		<div id="bo_li_top_op">
			<div class="bo_list_total">
		        <span>전체 <?php echo number_format($total_count) ?>건</span>
		        <?php echo $page ?> 페이지
		    </div> 
		    <?php if ($rss_href || $write_href) { ?>
			<ul class="<?php echo isset($view) ? 'view_is_list btn_top' : 'btn_top2';?>">
			    <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b02">RSS</a></li><?php } ?>
			    <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01">글쓰기</a></li><?php } ?>
				<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
				
				<?php if ($is_admin == 'super' || $is_auth) {  ?>
				<li>
					<button type="button" class="btn_more btn_b04"><span class="sound_only">글쓰기 옵션 더보기</span><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
					<?php if ($list_href || $is_checkbox || $write_href) { ?>
					<ul class="btn_bo_adm">
				        <?php if ($list_href) { ?>
				        <li><a href="<?php echo $list_href ?>" class="btn_b01 btn">목록</a></li>
				        <?php } ?>
				        <?php if ($is_checkbox) { ?>
				        <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">선택삭제</button></li>
				        <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value">선택복사</button></li>
				        <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value">선택이동</button></li>
				        <?php } ?>
				    </ul>
				    <?php } ?>
					<script>
						$(document).ready(function(){
							$(".btn_more").click(function(){
								$(".btn_bo_adm").toggle();
							});
						});
					</script>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		
	    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
	    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
	    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
	    <input type="hidden" name="stx" value="<?php echo $stx ?>">
	    <input type="hidden" name="spt" value="<?php echo $spt ?>">
	    <input type="hidden" name="sst" value="<?php echo $sst ?>">
	    <input type="hidden" name="sod" value="<?php echo $sod ?>">
	    <input type="hidden" name="page" value="<?php echo $page ?>">
	    <input type="hidden" name="sw" value="">  
	    
	    <div id="bo_li_01">
	    	<ul class="list_head">
	            <?php if ($is_checkbox) { ?>
	            <li class="sel">
	                <?php if ($is_checkbox) { ?>
				    <div class="list_chk all_chk">
				        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
				        <label for="chkall"><span class="sound_only">현재 페이지 게시물 </span>전체선택</label>
				    </div>
				    <?php } ?>
	            </li>
	            <?php } ?>
	            <li class="num">번호</li>
	            <li class="tit">제목</li>
	            <li class="wri">글쓴이</li>
	            <li class="view"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></th>
	            <li class="date"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
	    	</ul>
	    	<div id="bo_li_01" class="list_03">   
		        <ul>
		            <?php

					// 근로자일 경우에 선호 직종만 출력
					if($is_worker){
						$pieces_1 = explode("|", $member['mb_5']);
					}
					for ($i=0; $i<count($list); $i++) { // 게시글 목록 시작 
						// 선호 직종만 출력하기
						if($is_worker){
							$pieces_2 = explode("|", $list[$i]['wr_9']);
							$pieces_result = array_intersect($pieces_1, $pieces_2);
						}
						if(($is_worker&&count($pieces_result)>0)||$is_constructor||($is_worker&&($list[$i]['wr_9']==''||$member['mb_5']==''))||$is_admin){
					?>
		            <li class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
		            	
		            	<?php if ($is_checkbox) { // 게시글별 체크박스 ?>
		                <span class="sel bo_chk li_chk">
		                    <label for="chk_wr_id_<?php echo $i ?>"><span class="sound_only"><?php echo $list[$i]['subject'] ?></span></label>
		                    <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
		                </span>
		                <?php } ?>
		                
		            	<div class="num cnt_left li_status">
							<?php
				            if ($list[$i]['is_notice']) // 공지사항
				                echo '<strong class="notice_icon">공지</strong>';
				            else if ($wr_id == $list[$i]['wr_id'])
				                echo "<span class=\"bo_current\">열람중</span>";
				            else
								echo $list[$i]['num'];
				            ?>
						</div>
	
		            	<div class="tit cnt_left bo_subject">
							<?php if ($is_category && $list[$i]['ca_name']) { ?>
			                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link">[<?php echo $list[$i]['ca_name'] ?>]</a>
			                <?php } ?>
		             
		                    <a href="<?php echo $list[$i]['href'] ?>" style="<?php echo $list[$i]['wr_reply_style']; ?>">
		                        <?php echo $list[$i]['icon_reply']; ?>
								<?php echo $list[$i]['subject'] ?>
								<?=" by <b>".$list[$i]['wr_1']."</b>"?><br>
								<?=$list[$i]['wr_2']?><span>의 연락처:</span><?=$list[$i]['wr_3']?><br>
								<?=$list[$i]['wr_4']?>/<?=$list[$i]['wr_5']?><br>
								<?=$list[$i]['wr_6']?>&nbsp;<?=$list[$i]['wr_7']."~".$list[$i]['wr_8']?><br>
								<?php $new_wr_9 = explode("|", $list[$i]['wr_9']); 
								$new_wr_9 = implode(", ", $new_wr_9); ?>
								<?=$new_wr_9?><br>
								일당: <?=number_format((double)$list[$i]['wr_10'])."원"?><br>
								
							</a>
							<?php $bbs=G5_BBS_URL?>
							<?php 
							if($is_worker){
								if($list[$i]['wr_4']<$list[$i]['wr_5']&&$list[$i]['ca_name']=='모집중'){
									echo '<a href="./apply_popin.php?bo_table='.$bo_table.'&wr_id='.$list[$i]['wr_id'].'target="_blank" class="btn btn_b03" onclick="win_apply(this.href); return false;"><i class="fa fa-check-circle"></i> <span class="hidden-xs">지원하기</span></a>';
								}
								else{
									echo '<h3 style="color:red"><b>지원마감</b></h3>';
								}
							}?>
		                        <?php
		                        if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
		                        if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
		                        if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
		                        if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
		                        ?>
		                        <?php if ($list[$i]['icon_new']) { ?>
					            <span class="new_icon">N<span class="sound_only">새글</span></span>
						        <?php } ?>
						        <?php if ($list[$i]['comment_cnt']) { ?>
					        		<span class="bo_cmt"><span class="sound_only">댓글</span><i class="far fa-comment-dots"></i> <?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span></span>
					        	<?php } ?>
		                    </a> 
		                </div>
		
		                <div class="wri cnt_left bo_info">
				        	<span class="sound_only">작성자</span><span class="bo_guest"><?php echo $list[$i]['name'] ?></span>
				        </div>
				        <div class="view cnt_left">
				        	<span class="sound_only">조회</span><span class="bo_view"><i class="far fa-eye"></i> <?php echo $list[$i]['wr_hit'] ?></span>
				        </div>
				        <div class="date cnt_left">
				        	<span class="sound_only">날짜</span><span class="bo_date"><i class="far fa-clock"></i> <?php echo $list[$i]['datetime2'] ?></span>
				        </div>	
		            </li><?php } } ?>
		            <?php if (count($list) == 0) { echo '<li class="empty_table">게시물이 없습니다.</li>'; } ?>
		        </ul>
			</div>   
	    </div>
	    </form>
    </div>
    <div id="bo_li_op">
	    <!-- 게시판 검색 시작 { -->
		<fieldset id="bo_sch">
		    <legend>게시물 검색</legend>
		    <form name="fsearch" method="get">
		    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		    <input type="hidden" name="sca" value="<?php echo $sca ?>">
		    <input type="hidden" name="sop" value="and">
		    <label for="sfl" class="sound_only">검색대상</label>
		    <select name="sfl" id="sfl">
	            <option value="wr_subject"<?php echo $list['sfl_wr_subject'] ?>>제목</option>
	            <option value="wr_content"<?php echo $list['sfl_wr_content'] ?>>내용</option>
	            <option value="wr_subject||wr_content"<?php echo $list['sfl_wr_subject||wr_content'] ?>>제목+내용</option>
	            <option value="mb_id,1"<?php echo $list['sfl_mb_id,1'] ?>>회원아이디</option>
	            <option value="mb_id,0"<?php echo $list['sfl_mb_id,0'] ?>>회원아이디(코)</option>
	            <option value="wr_name,1"<?php echo $list['sfl_wr_name,1'] ?>>글쓴이</option>
	            <option value="wr_name,0"<?php echo $list['sfl_wr_name,0'] ?>>글쓴이(코)</option>
		    </select>
		    <input name="stx" value="<?php echo $list['input_search'] ?>" placeholder="검색어" required id="stx" class="sch_input" size="15" maxlength="20">
		    <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i> <span class="sound_only">검색</span></button>
		    </form>
		</fieldset>
		<!-- } 게시판 검색 끝 -->
		<?php if ($rss_href || $write_href) { ?>
		<ul class="<?php echo isset($view) ? 'view_is_list btn_top' : 'btn_top2';?>">
		    <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b02">RSS</a></li><?php } ?>
		    <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01">글쓰기</a></li><?php } ?>
			<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
			
			<?php if ($is_admin == 'super' || $is_auth) {  ?>
			<li>
				<button type="button" class="btn_more2 btn_b04"><span class="sound_only">글쓰기 옵션 더보기</span><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
				<?php if ($list_href || $is_checkbox || $write_href) { ?>
				<ul class="btn_bo_adm2">
			        <?php if ($list_href) { ?>
			        <li><a href="<?php echo $list_href ?>" class="btn_b01 btn">목록</a></li>
			        <?php } ?>
			        <?php if ($is_checkbox) { ?>
			        <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">선택삭제</button></li>
			        <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value">선택복사</button></li>
			        <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value">선택이동</button></li>
			        <?php } ?>
			    </ul>
				<script>
					$(document).ready(function(){
						$(".btn_more2").click(function(){
							$(".btn_bo_adm2").toggle();
						});
					});
				</script>
			    <?php } ?>
			</li>
			<?php } ?>
			
		</ul>
		<?php } ?>	
	</div>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages; ?>


<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- 게시판 목록 끝 -->
