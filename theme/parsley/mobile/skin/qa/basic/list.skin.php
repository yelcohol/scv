<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css">', 0);
?>

<div id="bo_list">
	<div class="bo_list_innr">
	    <?php if ($category_option) { ?>
	    <!-- 카테고리 시작 { -->
	    <nav id="bo_cate">
	        <h2><?php echo $qaconfig['qa_title'] ?> 카테고리</h2>
	        <ul id="bo_cate_ul">
	            <?php echo $category_option ?>
	        </ul>
	    </nav>
	    <!-- } 카테고리 끝 -->
	    <?php } ?>
		
		<div id="bo_li_top_op">
			<!-- 게시판 페이지 정보 및 버튼 시작 { -->
		    <div class="bo_list_total">
		        <span>Total <?php echo number_format($total_count) ?>건</span>
		        <?php echo $page ?> 페이지
		    </div>
		    <!-- } 게시판 페이지 정보 및 버튼 끝 -->
		    
		    <?php if ($rss_href || $write_href) { ?>
			<ul class="<?php echo isset($view) ? 'view_is_list btn_top' : 'btn_top2';?>">
			    <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01">문의등록</a></li><?php } ?>
				<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
				
				<?php if ($is_admin == 'super' || $is_auth) {  ?>
				<li>
					<button type="button" class="btn_more btn_b04"><span class="sound_only">글쓰기 옵션 더보기</span><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
					<?php if ($list_href || $is_checkbox || $write_href) { ?>
					<ul class="btn_bo_adm">
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
	    
	    <form name="fqalist" id="fqalist" action="./qadelete.php" onsubmit="return fqalist_submit(this);" method="post">
	    <input type="hidden" name="stx" value="<?php echo $stx; ?>">
	    <input type="hidden" name="sca" value="<?php echo $sca; ?>">
	    <input type="hidden" name="page" value="<?php echo $page; ?>">

	    <div id="bo_li_01">
		    <ul class="list_head_qa">
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
	            <li class="tit">제목</li>
	            <li class="wri">글쓴이</li>
	            <li class="date"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
	            <li class="status">딥변상태</li>
	    	</ul>
		    <div class="list_04">
		        <ul>
		            <?php for ($i=0; $i<count($list); $i++) { ?>
		            <li class="bo_li<?php if ($is_checkbox) echo ' bo_adm'; ?>">
						<div class="tit cnt_left bo_subject">
							<?php if ($is_checkbox) { // 게시글별 체크박스 ?>
			                <span class="sel bo_chk li_chk">
			                    <label for="chk_wr_id_<?php echo $i ?>"><span class="sound_only"><?php echo $list[$i]['subject'] ?></span></label>
			                    <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
			                </span>
			                <?php } ?>
		                
							<strong class="bo_cate_link">[<?php echo $list[$i]['category']; ?>]</strong>
							
							<a href="<?php echo $list[$i]['view_href']; ?>" class="li_sbj">
		                        <?php echo $list[$i]['subject']; ?>
		                        <span><?php if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;?></span>
		                    </a>
		                </div>
		                
		                <div class="wri cnt_left bo_info">
		                    <span class="li_nick"><?php echo $list[$i]['name']; ?></span>
		                </div>
		                
		                <div class="date cnt_left">
		                    <span><i class="far fa-clock"></i> <?php echo $list[$i]['date']; ?></span>
		                </div>
		                
		                <div class="status cnt_left li_stat <?php echo ($list[$i]['qa_status'] ? 'txt_done' : 'txt_rdy'); ?>">
		                	<?php echo ($list[$i]['qa_status'] ? '<i class="fas fa-check-circle"></i> 답변완료' : '<i class="fas fa-circle"></i> 답변대기'); ?>
		                </div>
		            </li>
		            <?php } ?>
		
		            <?php if ($i == 0) { echo '<li class="empty_list">게시물이 없습니다.</li>'; } ?>
		        </ul>
		    </div>
	    </div>
	    </form>
    </div>
    <div id="bo_li_op">
    	<!-- qa 검색 시작 { -->
		<fieldset id="bo_sch">
		    <legend>게시물 검색</legend>
		    <form name="fsearch" method="get">
	    	    <input type="hidden" name="sca" value="<?php echo $sca ?>">
	    	    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
	    	    <input type="text" name="stx" value="<?php echo $list['input_search'] ?>" placeholder="검색어" required id="stx" class="sch_input" size="15" maxlength="15">
	    	    <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
		    </form>
		</fieldset>
		<!-- } qa 검색 끝 -->
		
		<?php if ($rss_href || $write_href) { ?>
		<ul class="<?php echo isset($view) ? 'view_is_list btn_top' : 'btn_top2';?>">
		    <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01">문의등록</a></li><?php } ?>
			<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
			
			<?php if ($is_admin == 'super' || $is_auth) {  ?>
			<li>
				<button type="button" class="btn_more2 btn_b04"><span class="sound_only">글쓰기 옵션 더보기</span><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
				<?php if ($list_href || $is_checkbox || $write_href) { ?>
				<ul class="btn_bo_adm2">
			        <?php if ($is_checkbox) { ?>
			        <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">선택삭제</button></li>
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
<?php echo $list_pages;  ?>


<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fqalist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_qa_id[]")
            f.elements[i].checked = sw;
    }
}

function fqalist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_qa_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다"))
            return false;
    }

    return true;
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->