<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

if($bo_table) {
	$E_bo = sql_fetch("SELECT * FROM g5_board where bo_table ='$bo_table'");
}

// 오늘 새글
function bo_count($bo){
	$cnt = 0;
	foreach (func_get_args() as $bo) { 
		$table = "g5_write_".$bo;
		$sql = "select count(*) cnt from $table where wr_datetime >= CURRENT_DATE() and wr_is_comment=0";
		$row = sql_fetch($sql);
		$cnt += $row['cnt'];
	}
	return $cnt;;
}

// 팝업추가
if(defined('_INDEX_')) {
    include G5_BBS_PATH.'/newwin.inc.php';
}

?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-------------------------- 수정해서 사용하세욧 -------------------------->
<meta name="description" content="무료테마, 플라워테마,에티플라워, 에티무료테마, 무료반응형홈페이지">
<meta property="og:type" content="website">
<meta property="og:title" content="무료테마 에티 플라워테마">
<meta property="og:description" content="반응형홈페이지제작, 무료커뮤니티제작, 에티테마, 그누보드 무료 테마, 무료 반응형 커뮤니티">
<meta property="og:image" content="http://flower.ety.kr/theme/ety_theme_company/img/logo.png">
<meta property="og:url" content="http://flower.ety.kr/">
<!-------------------------- ./수정해서 사용하세요 -------------------------->



<!-------------------------- 네비게이션 -------------------------->
<div class="container-fluid top-line fixed-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="tnb-left">
					<!-- social -->
					<div class="sns_icon">
					<a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
					</div>
					<div class="sns_icon">
					<a href="#"><i class="fab fa-twitter"></i></a>
					</div>
					<div class="sns_icon">
					<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
				<div id="tnb">
					<ul>
					<?php if($is_member) { ?>
						<li><a href="<?php echo G5_URL?>/bbs/logout.php">로그아웃</a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
					<?php }else{ ?>
						<li><a href="<?php echo G5_URL?>/bbs/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> 회원가입</a></li>
						<li><a href="<?php echo G5_URL?>/bbs/login.php"><i class="fas fa-sign-in-alt"></i> 로그인</a></li>
					<?php }?>
						<li><a href="<?php echo G5_URL?>/bbs/faq.php"><i class="fa fa-question" aria-hidden="true"></i> <span>FAQ</span></a></li>
						<li><a href="<?php echo G5_URL?>/bbs/qalist.php"><i class="fa fa-comments" aria-hidden="true"></i> <span>1:1문의</span></a></li>
						<li><a href="<?php echo G5_URL?>/bbs/current_connect.php" class="visit"><i class="fa fa-users" aria-hidden="true"></i> <span>접속자</span><strong class="visit-num">
						1</strong></a></li>
						<li><a href="<?php echo G5_URL?>/bbs/new.php"><i class="fa fa-history" aria-hidden="true"></i> <span>새글</span></a></li>
						<?php if($is_admin) { ?>
						<li><a href="<?php echo G5_URL?>/adm">관리자</a></li>
						<?php } ?>
					</ul>
				</div>
			</div><!-- /col -->
		</div><!-- /row -->
	</div><!-- /container -->
</div>
<style>
.collapse.in{
    -webkit-transition-delay: 4s;
    transition-delay: 5s;
    visibility: visible;
}
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-white bg-white fixed-top">
  <div class="container">
	<a class="navbar-brand" href="<?php echo G5_URL?>" class="logo"><img src="<?php echo G5_THEME_URL?>/img/logo.png"></a>
	<button class="navbar-toggler navbar-dark navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive" data-hover="dropdown" data-animations="fadeIn fadeIn fadeInUp fadeInRight">
	  <ul class="navbar-nav ml-auto">
		<?php
		$sql = " select *
					from {$g5['menu_table']}
					where me_use = '1'
					  and length(me_code) = '2'
					order by me_order, me_id ";
		$result = sql_query($sql, false);
		$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
		$menu_datas = array();
		for ($i=0; $row=sql_fetch_array($result); $i++) {
			$menu_datas[$i] = $row;

			$sql2 = " select *
						from {$g5['menu_table']}
						where me_use = '1'
						  and length(me_code) = '4'
						  and substring(me_code, 1, 2) = '{$row['me_code']}'
						order by me_order, me_id ";
			$result2 = sql_query($sql2);
			for ($k=0; $row2=sql_fetch_array($result2); $k++) {
				$menu_datas[$i]['sub'][$k] = $row2;
			}
		}
		$i = 0;
		foreach( $menu_datas as $row ){
			if( empty($row) ) continue; 
		?>			
			<?php if($row['sub']['0']) { ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="<?php echo $row['me_link']; ?>" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_<?php echo $row['me_target']; ?>">
					<?php echo $row['me_name'] ?>
					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
							<?php
							// 하위 분류
							$k = 0;
							foreach( (array) $row['sub'] as $row2 ){

							if( empty($row2) ) continue; 

							?>
							<a class="dropdown-item ks4 f15 fw4" href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a>

							<?php
							$k++;
							}   //end foreach $row2

							if($k > 0)
							echo '</ul>'.PHP_EOL;
							?>
			<?php }else{?>
				<li class="nav-item">
				<a class="nav-link en2 f16" href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
				</li>
			<?php }?>
		</li>

		<?php
		$i++;
		}   //end foreach $row

		if ($i == 0) {  ?>
			<li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
		<?php } ?>
		<li class="nav-item dropdown login">
		  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			LOGIN
		  </a>
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
			
			<?php if($is_admin) { ?><a class="dropdown-item" href="<?php echo G5_URL?>/adm">관리자</a><?php } ?>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/new.php">새글</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/qalist.php">1:1문의</a>
			<?php if($is_member) { ?>
			<a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/logout.php">로그아웃</a>
			<?php }else{ ?>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/login.php">로그인</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/register.php">회원가입</a>
			<?php } ?>
		  </div>
		</li>
	  </ul>
	</div>
  </div>
</nav>

<style>
/* mobile */
@media (min-width: 1px) and (max-width: 1089px) {
	.ety-main{margin-bottom:63px;}
}

/* desktop */
@media (min-width: 1090px) {
	.ety-main{margin-bottom:110px;}
}
</style>
<div class="ety-main"></div>



<!-------------------------- 게시판 상단 배경 수정하는 곳 -------------------------->
<?php 
	if($bo_table){
		include_once(G5_THEME_PATH.'/top_banner.php');
	}
?>
<!-------------------------- ./게시판 상단 배경 수정하는 곳 -------------------------->