<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

define('_INDEX_', true);

include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
?>

<?php
	//로그인시 쪽지 왔는지 알려주는 
	if ($is_member) {
		//쪽지 테이블에서 마지막 쪽지를 읽어온다.
		$sql = "select * from {$g5['memo_table']} where me_recv_mb_id = '{$member['mb_id']}' and me_read_datetime = '0000-00-00 00:00:00' order by me_id desc limit 0,1 ";
		$result = sql_fetch($sql);	
		//$get_nick = get_member($result['me_send_mb_id'], $fields='mb_nick');
		if ($result) {
			//새창을 띄워준다.
			//$msg = "{$get_nick['mb_nick']} 님으로부터 쪽지가 도착했습니다.";
            $msg = "알림 - {$result['me_memo']}";
			$url = G5_BBS_URL."/memo.php";				
	?>
	<script>
		alert("<?php echo $msg?>");
		window.open("<?php echo $url?>", "win_memo","width=620, height=620");
	</script>
	<?php
		}	
	}
	?>

<!-- 메인 최신글 시작 -->
<div class="conle_idx_top">
<?php echo outlogin("theme/basic_side"); ?>
    <div id="gnb_index">
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
                    <?php if(($is_constructor && $row['me_name'] == '내가 지원한 일자리') || ($is_worker && $row['me_name'] == '내가 올린 일자리')) {?>
                    <?php continue;?>
                    <?php } ?>
                    <?php if($row['me_name'] == ' 일자리'){ ?>
                            <?php $link = $row['me_link'].'&sca=모집중'; ?>
                    <?php    }?>
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><i class="far fa-list-alt"></i> <?php echo $row['me_name'].'11' ?></a>
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
	<div class="conle_lt">
	<?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/basic', 'works', 4, 20);
    ?>
    </div>
    
    <!-- <div class="conle_lt conle_lt_even"> -->
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // echo latest('theme/basic', 'applied_works', 4, 20);
    ?>
	<!-- </div> -->
	<!-- <div class="conle_lt conle_bt_lt"> -->
	<?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // echo latest('theme/basic', 'uploaded_works', 4, 20);
    ?>
    <!-- </div> -->
    
    <!-- <div class="conle_lt conle_bt_lt conle_lt_even"> -->
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // echo latest('theme/basic', 'free', 4, 20);
    ?>
	<!-- </div> -->
	
	<!-- <div class="lt_gall"> -->
		<!-- 베이직 슬라이더2 { -->
		<?php
	    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
	    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
	    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
	    // echo latest('theme/gallery', 'gallery', 4, 20);
	    ?>
	<!-- </div> -->
</div>
<!-- 메인 최신글 끝 -->

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>
