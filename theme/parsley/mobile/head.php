<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if($uri == 'index') {
    define("_INDEX_", true);
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');


//if ((stripos($_SERVER['REQUEST_URI'], 'register') !== false) || !(defined("_DONT_WRAP_IN_CONTAINER_") && _DONT_WRAP_IN_CONTAINER_ === true)) {

?>
<script>
jQuery(function($) {
	var $bodyEl = $('body'),
		$sidedrawerEl = $('#sidedrawer');
	
	function showSidedrawer() {
		// show overlay
		var options = {
  		onclose: function() {
			$sidedrawerEl
      		.removeClass('active')
      		.appendTo(document.body);
		}
		};
    
		var $overlayEl = $(mui.overlay('on', options));
    
    	// show element
    	$sidedrawerEl.appendTo($overlayEl);
		setTimeout(function() {
  			$sidedrawerEl.addClass('active');
		}, 20);
  	}

	function hideSidedrawer() {
		$bodyEl.toggleClass('hide-sidedrawer');
	}

	$('.js-show-sidedrawer').on('click', showSidedrawer);
	$('.js-hide-sidedrawer').on('click', hideSidedrawer);

});
</script>

<!-- 상단 시작 { -->
<header id="header">
	<h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div class="to_content"><a href="#container">본문 바로가기</a></div>
    <div id="mobile-indicator"></div>
    
    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>

	<div id="hd_wrapper" class="">
      	<div class="gnb_side_btn">
			<a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer"><i class="fa fa-bars"></i><span class="sound_only">모바일 전체메뉴</span></a>
        </div>
      	
      	<div id="logo">
            <a href="<?php echo G5_URL ?>#wrapper">
            	<span class="sound_only"><?php echo $config['cf_title']; ?></span>
            	<img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>">
            </a>
        </div>
        
        <div class="header_ct">
			<div class="hd_sch_wr">
	        	<button class="hd_sch_bt"><i class="fa fa-search"></i><span class="sound_only">검색창 열기</span></button>
				<fieldset id="hd_sch">
	            	<h2 class="hd_sch_h2">사이트 내 전체검색</h2>
		            <form name="fsearchbox" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
		            	<input type="hidden" name="sfl" value="wr_subject||wr_content">
		            	<input type="hidden" name="sop" value="and">
		            	<input type="text" name="stx" id="sch_stx" placeholder="검색어를 입력하세요" required maxlength="20">
		            	<button type="submit" value="검색" id="sch_submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
		            	<button type="button" class="sch_more_close">닫기</button>
		            </form>
		            <?php echo popular("theme/basic"); // 인기검색어, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
	            </fieldset>
	        </div>
			<div id="tnb">
	        	<?php echo outlogin("theme/basic"); ?>
		    </div>
	        <script>
			$(document).ready(function(){
		        $(document).on("click", ".hd_sch_bt", function() {
			        $("#hd_sch").toggle();
			    });
			    $(".sch_more_close").on("click", function(){
					$("#hd_sch").hide();
				});
			});
			</script>
        </div>
	</div>
</header>
<!-- } 상단 끝 -->
    
<aside id="sidedrawer">
	<?php echo outlogin("theme/basic_side"); ?>
    <div id="gnb">
        <div class="gnb_side">
			<h2>메인메뉴</h2>
			<ul class="gnb_1dul">
            <?php
            $sql = " select *
                        from {$g5['menu_table']}
                        where me_mobile_use = '1'
                          and length(me_code) = '2'
                        order by me_order, me_id ";
            $result = sql_query($sql, false);

            for($i=0; $row=sql_fetch_array($result); $i++) {
            ?>
                <li class="gnb_1dli">
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><i class="far fa-list-alt"></i> <?php echo $row['me_name'] ?></a>
                    <?php
                    $sql2 = " select *
                                from {$g5['menu_table']}
                                where me_mobile_use = '1'
                                  and length(me_code) = '4'
                                  and substring(me_code, 1, 2) = '{$row['me_code']}'
                                order by me_order, me_id ";
                    $result2 = sql_query($sql2);

                    for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                        if($k == 0)
                            echo '<button class="btn_gnb_op">하위분류</button><ul class="gnb_2dul">'.PHP_EOL;
                    ?>
                        <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                    <?php
                    }

                    if($k > 0)
                        echo '</ul>'.PHP_EOL;
                    ?>
                </li>
            <?php
            }

            if ($i == 0) {  ?>
                <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하세요.<?php } ?></li>
            <?php } ?>
            </ul>
        </div>
	</div>
	<ul class="shortcut">
		<li><a href="<?php echo G5_BBS_URL ?>/faq.php"><i class="far fa-question-circle"></i> 자주묻는 질문</a></li>
        <li><a href="<?php echo G5_BBS_URL ?>/qalist.php"><i class="far fa-comments"></i> 1:1 문의</a></li>
        <li><a href="<?php echo G5_BBS_URL ?>/new.php"><i class="fas fa-history"></i> 새글</a></li>
        <li class="sc_current">
        	<a href="<?php echo G5_BBS_URL ?>/current_connect.php"><i class="fas fa-users"></i> 접속자</a>
        </li>
    </ul>
</aside>

<script>
$(function () {
    //폰트 크기 조정 위치 지정
    var font_resize_class = get_cookie("ck_font_resize_add_class");
    if( font_resize_class == 'ts_up' ){
        $("#text_size button").removeClass("select");
        $("#size_def").addClass("select");
    } else if (font_resize_class == 'ts_up2') {
        $("#text_size button").removeClass("select");
        $("#size_up").addClass("select");
    }

    $(".hd_opener").on("click", function() {
        var $this = $(this);
        var $hd_layer = $this.next(".hd_div");

        if($hd_layer.is(":visible")) {
            $hd_layer.hide();
            $this.find("span").text("열기");
        } else {
            var $hd_layer2 = $(".hd_div:visible");
            $hd_layer2.prev(".hd_opener").find("span").text("열기");
            $hd_layer2.hide();

            $hd_layer.show();
            $this.find("span").text("닫기");
        }
    });

    $("#container").on("click", function() {
        $(".hd_div").hide();

    });

    $(".btn_gnb_op").click(function(){
        $(this).toggleClass("btn_gnb_cl").next(".gnb_2dul").slideToggle(300);
    });
    $(".btn_gnb_op").click(function(){
        $(this).parent().toggleClass("gnb_1da_on")
    });

    $(".hd_closer").on("click", function() {
        var idx = $(".hd_closer").index($(this));
        $(".hd_div:visible").hide();
        $(".hd_opener:eq("+idx+")").find("span").text("열기");
    });
});
</script>

<!-- 컨텐츠 시작 { -->
<div id="content-wrapper">
	<div id="wrapper">
		<!-- container 시작 { -->
		<div id="container">
			<div class="conle">
				<?php if (!defined("_INDEX_") && !(defined("_H2_TITLE_") && _H2_TITLE_ === true)) {?>
				<h2 id="container_title" class="top"><?php echo get_head_title($g5['title']) ?></h2>
				<?php } ?>
