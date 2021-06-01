<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<section id="bo_v_ans" class="bo_v_wrt">
	<div class="inner">
    	<h2><span class="tit_rpl">답변</span><span><?php echo get_text($answer['qa_subject']); ?></span></h2>
	</div>
	<div class="inner_bottom">
	    <div id="ans_datetime">
	        <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $answer['qa_datetime']; ?>
	    	
	    	<button class="bo_cv_opt"><span class="sound_only">게시물 옵션</span><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
	    	<ul id="bo_cv_opt">
	    		<?php if($answer_update_href) { ?>
	    		<li>
	    			<a href="<?php echo $answer_update_href; ?>">답변수정 <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>	
	    		</li>
	    		<?php } ?>
	    		<?php if($answer_delete_href) { ?>
	    		<li>
	    			<a href="<?php echo $answer_delete_href; ?>" onclick="del(this.href); return false;">답변삭제 <i class="fa fa-trash-o" aria-hidden="true"></i></a>		
	    		</li>
	    		<?php } ?>
	    	</ul>
	    </div>
	    <div id="ans_con">
	        <?php echo get_view_thumbnail(conv_content($answer['qa_content'], $answer['qa_html']), $qaconfig['qa_image_width']); ?>
	    </div>
    </div>
    
    <div id="ans_add">
        <a href="<?php echo $rewrite_href; ?>" class="btn_b02 btn">추가질문</a>
    </div>
</section>
<script>
	//게시글 옵션
	$(".bo_cv_opt").click(function(){
	    $("#bo_cv_opt").fadeIn();

	});

	$(document).mouseup(function (e) {
	    var container = $("#bo_cv_opt");
	    if (!container.is(e.target) && container.has(e.target).length === 0){
	    container.css("display","none");
	    }
	});
</script>