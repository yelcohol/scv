
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="http://fullscreen.ety.kr/fa.ico" />
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>에티 와이드 무료테마</title>
<link rel="stylesheet" href="http://fullscreen.ety.kr/theme/ety_theme_company/css/default.css?ver=191202">
<link rel="stylesheet" href="http://fullscreen.ety.kr/theme/ety_theme_company/skin/latest/basic_main_one/style.css?ver=191202">
<link rel="stylesheet" href="http://fullscreen.ety.kr/theme/ety_theme_company/skin/latest/pic_basic_company/style.css?ver=191202">
<link rel="stylesheet" href="http://fullscreen.ety.kr/theme/ety_theme_company/skin/latest/pic_basic_owl/style.css?ver=191202">
<!--[if lte IE 8]>
<script src="http://fullscreen.ety.kr/js/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "http://fullscreen.ety.kr";
var g5_bbs_url   = "http://fullscreen.ety.kr/bbs";
var g5_is_member = "";
var g5_is_admin  = "";
var g5_is_mobile = "";
var g5_bo_table  = "";
var g5_sca       = "";
var g5_editor    = "";
var g5_cookie_domain = "";
</script>
<script src="http://fullscreen.ety.kr/js/jquery-1.8.3.min.js"></script>
<script src="http://fullscreen.ety.kr/js/jquery.menu.js?ver=191202"></script>
<script src="http://fullscreen.ety.kr/js/common.js?ver=191202"></script>
<script src="http://fullscreen.ety.kr/js/wrest.js?ver=191202"></script>
<script src="http://fullscreen.ety.kr/js/placeholders.min.js"></script>
<link rel="stylesheet" href="http://fullscreen.ety.kr/js/font-awesome/css/font-awesome.min.css">

<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800|Noto+Sans+KR:100,300,400,500,700,900|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="http://fullscreen.ety.kr/theme/ety_theme_company/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- owl Carousel -->
<link rel="stylesheet" href="http://fullscreen.ety.kr/theme/ety_theme_company/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="http://fullscreen.ety.kr/theme/ety_theme_company/assets/owlcarousel/css/owl.theme.default.min.css">

<!-- countdown -->
<link href="http://fullscreen.ety.kr/theme/ety_theme_company/assets/countdown/css/demo.css" rel="stylesheet">
<!-- bootstrap-social icon -->
<link href="http://fullscreen.ety.kr/theme/ety_theme_company/assets/bootstrap-social/bootstrap-social.css" rel="stylesheet">
<link href="http://fullscreen.ety.kr/theme/ety_theme_company/css/animate.css" rel="stylesheet">
<link href="http://fullscreen.ety.kr/theme/ety_theme_company/css/bootstrap-dropdownhover.css" rel="stylesheet">
<!-- Custom & ety -->
<link href="http://fullscreen.ety.kr/theme/ety_theme_company/css/modern-business.css" rel="stylesheet">
<link href="http://fullscreen.ety.kr/theme/ety_theme_company/css/ety.css" rel="stylesheet">


</head>
<body>

<!-- 팝업레이어 시작 { -->
<div id="hd_pop">
    <h2>팝업레이어 알림</h2>

<span class="sound_only">팝업레이어 알림이 없습니다.</span></div>

<script>
$(function() {
    $(".hd_pops_reject").click(function() {
        var id = $(this).attr('class').split(' ');
        var ck_name = id[1];
        var exp_time = parseInt(id[2]);
        $("#"+id[1]).css("display", "none");
        set_cookie(ck_name, 1, exp_time, g5_cookie_domain);
    });
    $('.hd_pops_close').click(function() {
        var idb = $(this).attr('class').split(' ');
        $('#'+idb[1]).css('display','none');
    });
    $("#hd").css("z-index", 1000);
});
</script>
<!-- } 팝업레이어 끝 --><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
											<li><a href="http://fullscreen.ety.kr/bbs/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> 회원가입</a></li>
						<li><a href="http://fullscreen.ety.kr/bbs/login.php"><i class="fas fa-sign-in-alt"></i> 로그인</a></li>
											<li><a href="http://fullscreen.ety.kr/bbs/faq.php"><i class="fa fa-question" aria-hidden="true"></i> <span>FAQ</span></a></li>
						<li><a href="http://fullscreen.ety.kr/bbs/qalist.php"><i class="fa fa-comments" aria-hidden="true"></i> <span>1:1문의</span></a></li>
						<li><a href="http://fullscreen.ety.kr/bbs/current_connect.php" class="visit"><i class="fa fa-users" aria-hidden="true"></i> <span>접속자</span><strong class="visit-num">
						1</strong></a></li>
						<li><a href="http://fullscreen.ety.kr/bbs/new.php"><i class="fa fa-history" aria-hidden="true"></i> <span>새글</span></a></li>
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
	<a class="navbar-brand" href="http://fullscreen.ety.kr" class="logo"><img src="http://fullscreen.ety.kr/theme/ety_theme_company/img/logo.png"></a>
	<button class="navbar-toggler navbar-dark navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive" data-hover="dropdown" data-animations="fadeIn fadeIn fadeInUp fadeInRight">
	  <ul class="navbar-nav ml-auto">
					
							<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					회사소개					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/pages/about.php" target="_self">인사말</a>

														<a class="dropdown-item ks4 f15 fw4" href="/pages/history.php" target="_self">연혁</a>

														<a class="dropdown-item ks4 f15 fw4" href="/pages/pages-1.php" target="_self">빈페이지</a>

							</ul>
					</li>

					
							<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					비즈니스					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/pages/product.php" target="_self">사업안내 1</a>

														<a class="dropdown-item ks4 f15 fw4" href="/pages/product-2.php" target="_self">사업안내 2</a>

														<a class="dropdown-item ks4 f15 fw4" href="/pages/service.php" target="_self">서비스</a>

							</ul>
					</li>

					
							<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					제품안내					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/gallery" target="_self">갤러리 1</a>

							</ul>
					</li>

					
							<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					고객센터					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/notice" target="_self">공지사항</a>

														<a class="dropdown-item ks4 f15 fw4" href="/free" target="_self">자유게시판</a>

														<a class="dropdown-item ks4 f15 fw4" href="/qa" target="_self">QnA</a>

														<a class="dropdown-item ks4 f15 fw4" href="/bbs/faq.php" target="_self">FAQ</a>

							</ul>
					</li>

					
							<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					온라인문의					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/bbs/qalist.php" target="_self">1:1문의</a>

							</ul>
					</li>

					
							<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					서비스					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/bbs/new.php" target="_self">새글</a>

														<a class="dropdown-item ks4 f15 fw4" href="/bbs/current_connect.php" target="_self">접속자</a>

														<a class="dropdown-item ks4 f15 fw4" href="/bbs/search.php" target="_self">전체검색</a>

							</ul>
					</li>

				<li class="nav-item dropdown login">
		  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			LOGIN
		  </a>
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
			
						<a class="dropdown-item" href="http://fullscreen.ety.kr/bbs/new.php">새글</a>
			<a class="dropdown-item" href="http://fullscreen.ety.kr/bbs/qalist.php">1:1문의</a>
						<a class="dropdown-item" href="http://fullscreen.ety.kr/bbs/login.php">로그인</a>
			<a class="dropdown-item" href="http://fullscreen.ety.kr/bbs/register.php">회원가입</a>
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
<!-------------------------- ./게시판 상단 배경 수정하는 곳 -------------------------->





<!-------------------------- 슬라이드 -------------------------->
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
	<ol class="carousel-indicators">
	  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
	  <!-- Slide One - Set the background image for this slide in the line below -->
	  <div class="carousel-item active" style="background-image: url('http://fullscreen.ety.kr/theme/ety_theme_company/img/bg1.png')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">에티와이드테마</h3>
		  <p class="ks4 f20">전체페이지를 와이드 형태로만 제작하였습니다.</p>
		</div>
	  </div>
	  <!-- Slide Two - Set the background image for this slide in the line below -->
	  <div class="carousel-item" style="background-image: url('http://fullscreen.ety.kr/theme/ety_theme_company/img/bg2.png')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">반응형 비즈니스 테마</h3>
		  <p class="ks4 f20">CMS 인 그누보드 5.4 와 연동되어 사용가능한 테마 입니다.</p>
		</div>
	  </div>
	  <!-- Slide Three - Set the background image for this slide in the line below -->
	  <div class="carousel-item" style="background-image: url('http://fullscreen.ety.kr/theme/ety_theme_company/img/bg3.png')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">테마몰 오픈</h3>
		  <p class="ks4 f20">테마몰을 오픈하였습니다.</p>
		</div>
	  </div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  <span class="sr-only">Next</span>
	</a>
  </div>
</header>
<!-------------------------- ./슬라이드 -------------------------->


<!-------------------------- 아이콘박스 -------------------------->
<div class="margin-top-80"></div>
<div class="container">
	<div class="center-heading en1">
		<h2>WIDE FREE <strong>THEME</strong> </h2>
		<span class="center-line"></span>
		<p class="sub-text margin-bottom-80 ks5 f19">
		무료 폰트어썸5 버전을 사용합니다. 폰트어썸5 프로버전은 사용하지 않습니다.
		</p>
	</div>
	<!-------------------------- 첫번째 줄 -------------------------->
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					<div class="info-pink">
						<i class="fas fa-chart-line"></i>
						<p class="ks4 f15 h75">
							애플사의 IOS 부터 안드로이드 운영체제까지 모두 지원되는 무료 비즈니스 반응형 홈페이지 입니다.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->

		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					<div class="info-pink-2">
						<i class="fas fa-cloud-moon-rain"></i>
						<p class="ks4 f15 h75">
							갤럭시 시리즈의 모든 기종에서도 문제 없이 최적화된 사이트로 적용됩니다.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->

		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					<div class="info">
						<i class="fas fa-cog"></i>
						<p class="ks4 f15 h75">
							갤럭시 시리즈의 모든 기종에서도 문제 없이 최적화된 사이트로 적용됩니다.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->

		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					
					<div class="info">
						<i class="fas fa-sliders-h"></i>
						<p class="ks4 f15 h75">
							문의사항은 질문게시판에 글 남겨주세요.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div><!-- ./col -->
	</div><!-- /row -->


	<div class="hidden-xs hidden-sm margin-top-30"></div><!-- pc 만 적용 -->

	
	<!-------------------------- 두번째줄 -------------------------->
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					<div class="info">
						<i class="far fa-hospital"></i>
						<p class="ks4 f15 h75">
							애플사의 IOS 부터 안드로이드 운영체제까지 모두 지원되는 무료 비즈니스 반응형 홈페이지 입니다.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					<div class="info">
						<i class="far fa-lightbulb"></i>
						<p class="ks4 f15 h75">
							갤럭시 시리즈의 모든 기종에서도 문제 없이 최적화된 사이트로 적용됩니다.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>

		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					<div class="info">
						<i class="fab fa-php"></i>
						<p class="ks4 f15 h75">
							갤럭시 시리즈의 모든 기종에서도 문제 없이 최적화된 사이트로 적용됩니다.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>

		<div class="col-xs-12 col-sm-6 col-lg-3">
			<div class="box">							
				<div class="icon">
					
					<div class="info-pink">
						<i class="fab fa-rocketchat"></i>
						<p class="ks4 f15 h75">
							문의사항은 질문게시판에 글 남겨주세요.
						</p>
						<div class="margin-top-20 margin-bottom-20">
							<button type="button" class="btn btn-secondary btn-sm ks4" onclick="location.href='#'">바로가기</button>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
	</div><!-- /row -->
</div><!-- /container -->



<div class="margin-top-50"></div>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<style>
.main_one_title {
    position: relative;
    display: block;
    width: 191px;
    text-align: left;
    color: #111;
    padding: 15px 0px 15px 0px;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    margin-left: 15px;
}
.one_more{position:absolute;top:15px;right:15px;font-size:22px}
</style>

<div class="row">
	<div class="col-md-12 main_one_title ks4">
		공지사항		
	</div>
</div>
<a href="http://fullscreen.ety.kr/bbs/board.php?bo_table=notice" class="one_more"><span class="sound_only">공지사항</span><i class="fa fa-plus" aria-hidden="true" style="font-size:22px;line-height: 1px;"></i><span class="sound_only"> 더보기</span></a>
<div class="lat_list_one">
    <ul>
            <li class="ks4">
            <a href="http://fullscreen.ety.kr/notice/6"> 질문게시판 안내</a>
            <span class="lt_date hidden-xs hidden-sm">05-16</span>
        </li>
            <li class="ks4">
            <a href="http://fullscreen.ety.kr/notice/5"> 테마 세팅 및 수정방법 안내</a>
            <span class="lt_date hidden-xs hidden-sm">05-16</span>
        </li>
            <li class="ks4">
            <a href="http://fullscreen.ety.kr/notice/4"> 각 서브페이지별 배경이미지 수정방법</a>
            <span class="lt_date hidden-xs hidden-sm">05-16</span>
        </li>
            <li class="ks4">
            <a href="http://fullscreen.ety.kr/notice/3"> <strong>에티 와이드 버전 안내</strong></a>
            <span class="lt_date hidden-xs hidden-sm">05-16</span>
        </li>
            </ul>
	
</div>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<style>
.main_one_title {
    position: relative;
    display: block;
    width: 191px;
    text-align: left;
    color: #111;
    padding: 15px 0px 15px 0px;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    margin-left: 15px;
}
.one_more{position:absolute;top:15px;right:15px;font-size:22px}
</style>

<div class="row">
	<div class="col-md-12 main_one_title ks4">
		자유게시판		
	</div>
</div>
<a href="http://fullscreen.ety.kr/bbs/board.php?bo_table=free" class="one_more"><span class="sound_only">자유게시판</span><i class="fa fa-plus" aria-hidden="true" style="font-size:22px;line-height: 1px;"></i><span class="sound_only"> 더보기</span></a>
<div class="lat_list_one">
    <ul>
            <li class="ks4">
            <a href="http://fullscreen.ety.kr/free/2"> 글쓰기 테스트 입니다.</a>
            <span class="lt_date hidden-xs hidden-sm">04-16</span>
        </li>
            <li class="ks4">
            <span class="hot_icon">H<span class="sound_only">인기글</span></span><a href="http://fullscreen.ety.kr/free/1"> <strong>자유게시판 불법관련 홍보글 안내</strong></a>
            <span class="lt_date hidden-xs hidden-sm">02-27</span>
        </li>
            </ul>
	
</div>
		</div>
	</div>
</div>



<!-------------------------- 테마소개 + 유튜브영상 -------------------------->
<!-- 
백그라운드 색상을 조정해주시면 됩니다.
-->

<div class="py-5 margin-top-80" style="background:#d1ecf1;">
	<div class="container margin-top-80">
	  <div class="row">
		<div class="col-lg-6">
		  <iframe width="100%" height="315" src="https://www.youtube.com/embed/edZW-pAPJzU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="col-lg-6">
		  <h2 class="en1">SERVICE</h2>
		  <p class="ks4"><strong>테마적용은 비슷비슷하므로 영상을 참고해주세요.</strong></p>
		  <p class="ks4">에티테마에서는 무료 커뮤니티 테마, 비즈니스 테마를 배포하고 있습니다.</p>
		  <p class="ks4">배포는 소프트존만 가능하며 배포처는 에티테마,SIR 만 제한하고 있습니다.</p>
		  <p class="ks4">설치방법안내 <strong><a href="http://ety.kr/board/free_theme_manual/42" target="_blank">http://ety.kr/board/free_theme_manual/42</a></strong> 에서 진행하고 있으므로 궁금점이나 문의사항이 있으시면 해당 게시판을 이용해주세요.</p>
		</div>
	  </div>
	</div>
</div>




<!-------------------------- USE A LIBRARY -------------------------->
<div class="py-5" style="">
	<div class="container">
		<div class="center-heading margin-top-40">
			<h2 class="en1">USE A <strong>LIBRARY</strong> </h2>
			<span class="center-line"></span>
		</div>
		  <div class="row margin-top-50 margin-bottom-50">
			<div class="col-lg-6">
			  <h2 class="en1">JavaScript Library</h2>
			  <p class="ko_17">테마폴더내 라이선스 문서 확인</p>
			  <ul class="en2">
				<li><strong>GNUboard5 (5.4.5.1)</strong></li>
				<li><strong>Bootstrap4</strong></li>
				<li>jQuery</li>
				<li>Font Awesome5</li>
				<li>Working contact form with validation</li>
				<li>Unstyled page elements for easy customization</li>
				<li>Parallax</li>
				<li>Owl</li>
			  </ul>
			  <p class="ks5">
			  현제 제작되는 모든 테마는 에티테마 에서 제작되고 있으며 무료 테마 및 템플릿의 경우에는 이미지가 포함 되어 있지 않습니다. 또한 에티테마로 오시면 추가적인 업데이트된 파일을 다운로드 하실 수 있습니다.</p>
			</div>
			<div class="col-lg-6 text-right">
				<img class="img-fluid rounded" src="http://fullscreen.ety.kr/theme/ety_theme_company/img/w001.png" alt="">
				<!--<img class="img-fluid rounded" src="http://placehold.it/570x400" alt="">-->
			</div>
		  </div>
	  <!-- /.row -->
	</div>
</div>



<!-------------------------- USE A LIBRARY -------------------------->
<div class="py-5" style="background:#f2f2f2;">
	<div class="container">
		<div class="center-heading margin-top-40">
			<h2 class="en1">USE A <strong>LIBRARY</strong> </h2>
			<span class="center-line"></span>
		</div>
	  <div class="row margin-top-50 margin-bottom-50">
		<div class="col-lg-6 text-left">
			<img class="img-fluid rounded" src="http://fullscreen.ety.kr/theme/ety_theme_company/img/w002.png" alt="">
			<!--<img class="img-fluid rounded" src="http://placehold.it/570x400" alt="">-->
		</div>
		<div class="col-lg-6">
		  <h2 class="en1">JavaScript Library</h2>
		  <p class="ko_17">테마폴더내 라이선스 문서 확인</p>
		  <ul class="en2">
		  	<li><strong>GNUboard5 (5.4.5.1)</strong></li>
			<li><strong>Bootstrap4</strong></li>
			<li>jQuery</li>
			<li>Font Awesome5</li>
			<li>Working contact form with validation</li>
			<li>Unstyled page elements for easy customization</li>
			<li>Parallax</li>
			<li>Owl</li>
			
		  </ul>
		  <p class="ks5">
		  현제 제작되는 모든 테마 및 템플릿은 글로벌하게 에티테마 에서 제작되고 있으며 무료 테마 및 템플릿의 경우에는 이미지가 포함 되어 있지 않습니다. 또한 에티테마로 오시면 추가적인 업데이트된 파일을 다운로드 하실 수 있습니다.</p>
		</div>

	  </div>
	  <!-- /.row -->
	</div>
</div>




<!-------------------------- 회사소개 및 안내 -------------------------->
<div class="container margin-top-80 margin-bottom-80">
	<div class="center-heading margin-top-40">
		<h2 class="en1">PRODUCT</h2>
		<span class="center-line"></span>
	</div>
	<!-- LATEST : pic_basic_company -->
	
<div class="row">
	
	<div class="col-md-4" style="margin-bottom:20px;">
		<div class="card-group">
		  <div class="card">
			<a href="http://fullscreen.ety.kr/gallery/14"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_zm8epSPx_41cdcfa4274526af8fd399a453bf845121bd8ec4_368x250.jpg" alt="" class="card-img-top"></a>
			<div class="card-body">
			  <h5 class="card-title ks4 f17">
					<a href="http://fullscreen.ety.kr/gallery/14"> <strong>홈페이지의 이미지는 포함되어 있지 않습니다.</strong>					</a>
			  </h5>
			  <p class="card-text ks3 f14" style='height:65px;'>
				홈페이지의 이미지는 포함되어 있지 않습니다.
&nbsp;
홈페이지의 이미지는 포함되어 있지 않습니다.
홈페이지의 이미지는 포함되어 있지 않.. 
							  </p>
			  <p class="card-text"><small class="text-muted">2021-05-16</small></p>
			</div>
		  </div>
		</div><!-- /card-group -->
	</div><!-- /col -->
	
	<div class="col-md-4" style="margin-bottom:20px;">
		<div class="card-group">
		  <div class="card">
			<a href="http://fullscreen.ety.kr/gallery/13"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_an8GXujy_4f4d68d148b0ec4855a97c14ff3ed34e9d30b745_368x250.jpg" alt="" class="card-img-top"></a>
			<div class="card-body">
			  <h5 class="card-title ks4 f17">
					<a href="http://fullscreen.ety.kr/gallery/13"> <strong>홈페이지의 이미지는 포함되어 있지 않습니다.</strong>					</a>
			  </h5>
			  <p class="card-text ks3 f14" style='height:65px;'>
				홈페이지의 이미지는 포함되어 있지 않습니다. 
							  </p>
			  <p class="card-text"><small class="text-muted">2021-05-16</small></p>
			</div>
		  </div>
		</div><!-- /card-group -->
	</div><!-- /col -->
	
	<div class="col-md-4" style="margin-bottom:20px;">
		<div class="card-group">
		  <div class="card">
			<a href="http://fullscreen.ety.kr/gallery/12"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_eHkGhoMN_5e3e911f9686f05b6f1895cdece97048d4f4cfdd_368x250.jpg" alt="" class="card-img-top"></a>
			<div class="card-body">
			  <h5 class="card-title ks4 f17">
					<a href="http://fullscreen.ety.kr/gallery/12"> <strong>홈페이지의 이미지는 포함되어 있지 않습니다.</strong>					</a>
			  </h5>
			  <p class="card-text ks3 f14" style='height:65px;'>
				홈페이지의 이미지는 포함되어 있지 않습니다. 
							  </p>
			  <p class="card-text"><small class="text-muted">2021-05-16</small></p>
			</div>
		  </div>
		</div><!-- /card-group -->
	</div><!-- /col -->
	
	<div class="col-md-4" style="margin-bottom:20px;">
		<div class="card-group">
		  <div class="card">
			<a href="http://fullscreen.ety.kr/gallery/11"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_B35Ln4tl_15f0e2edcc00f83e33d7717e8528d6b9eb8812bf_368x250.jpg" alt="" class="card-img-top"></a>
			<div class="card-body">
			  <h5 class="card-title ks4 f17">
					<a href="http://fullscreen.ety.kr/gallery/11"> <strong>홈페이지의 이미지는 포함되어 있지 않습니다.</strong>					</a>
			  </h5>
			  <p class="card-text ks3 f14" style='height:65px;'>
				홈페이지의 이미지는 포함되어 있지 않습니다. 
							  </p>
			  <p class="card-text"><small class="text-muted">2021-05-16</small></p>
			</div>
		  </div>
		</div><!-- /card-group -->
	</div><!-- /col -->
	
	<div class="col-md-4" style="margin-bottom:20px;">
		<div class="card-group">
		  <div class="card">
			<a href="http://fullscreen.ety.kr/gallery/10"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_tHKiBfp3_9082c3e4f5b0f6dfc68f3322b4099ca16f515ba4_368x250.jpg" alt="" class="card-img-top"></a>
			<div class="card-body">
			  <h5 class="card-title ks4 f17">
					<a href="http://fullscreen.ety.kr/gallery/10"> <strong>홈페이지의 이미지는 포함되어 있지 않습니다.</strong>					</a>
			  </h5>
			  <p class="card-text ks3 f14" style='height:65px;'>
				홈페이지의 이미지는 포함되어 있지 않습니다. 
							  </p>
			  <p class="card-text"><small class="text-muted">2021-05-16</small></p>
			</div>
		  </div>
		</div><!-- /card-group -->
	</div><!-- /col -->
	
	<div class="col-md-4" style="margin-bottom:20px;">
		<div class="card-group">
		  <div class="card">
			<a href="http://fullscreen.ety.kr/gallery/8"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_Oy0JK4mF_0f624da9fc2831d1ab126fc416c3fff76aeb318b_368x250.jpg" alt="" class="card-img-top"></a>
			<div class="card-body">
			  <h5 class="card-title ks4 f17">
					<a href="http://fullscreen.ety.kr/gallery/8"> <strong>홈페이지의 이미지는 포함되어 있지 않습니다.</strong>					</a>
			  </h5>
			  <p class="card-text ks3 f14" style='height:65px;'>
				홈페이지의 이미지는 포함되어 있지 않습니다. 
							  </p>
			  <p class="card-text"><small class="text-muted">2021-05-16</small></p>
			</div>
		  </div>
		</div><!-- /card-group -->
	</div><!-- /col -->
	

</div><!-- /row --></div>





<!-------------------------- parallax 박스 및 countdown -------------------------->
<!-- 

테마폴더/tail.php : 94번째줄에서 이미지를 교체해주세요.

-->
<div class="parallax-window" data-parallax="scroll">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center p-center para-text">
				<h2 class='text-light ks5'>반응형 커뮤니티 , 반응형 와이드 에티테마 무료 다운로드 바로가기</h2>
				<button type="button" class="btn btn-outline-light ks4" onclick='window.open("about:blank").location.href="http://ety.kr/board/theme_update"'>바로가기</button>
			</div>
		</div>
	</div>
</div><!-- /parallax -->



<!-------------------------- GALLERY -------------------------->
<!-- 

테마폴더/tail.php : 99번째줄에서 수정하시면 됩니다.
owlcarousel 시간조정, 개수조정, 오토플레이 조정
-->

<div class="container margin-top-50 margin-bottom-50">
	<h3 class="margin-bottom-50 text-left">GALLERY</h3>
	
<div class="owl-carousel owl-theme">
    		<div class="item"><a href="http://fullscreen.ety.kr/gallery/14"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_zm8epSPx_41cdcfa4274526af8fd399a453bf845121bd8ec4_200x200.jpg" alt="" ></a></div>
	
			<div class="item"><a href="http://fullscreen.ety.kr/gallery/13"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_an8GXujy_4f4d68d148b0ec4855a97c14ff3ed34e9d30b745_200x200.jpg" alt="" ></a></div>
	
			<div class="item"><a href="http://fullscreen.ety.kr/gallery/12"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_eHkGhoMN_5e3e911f9686f05b6f1895cdece97048d4f4cfdd_200x200.jpg" alt="" ></a></div>
	
			<div class="item"><a href="http://fullscreen.ety.kr/gallery/11"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_B35Ln4tl_15f0e2edcc00f83e33d7717e8528d6b9eb8812bf_200x200.jpg" alt="" ></a></div>
	
			<div class="item"><a href="http://fullscreen.ety.kr/gallery/10"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_tHKiBfp3_9082c3e4f5b0f6dfc68f3322b4099ca16f515ba4_200x200.jpg" alt="" ></a></div>
	
			<div class="item"><a href="http://fullscreen.ety.kr/gallery/8"><img src="http://fullscreen.ety.kr/data/file/gallery/thumb-2042508775_Oy0JK4mF_0f624da9fc2831d1ab126fc416c3fff76aeb318b_200x200.jpg" alt="" ></a></div>
	
	</div></div>












		
	<footer class="py-5 bg-dark margin-top-80">
		<div class="container footer">
			<div class="row">
				<div class="col-md-12 text-white text-center">
					<h2 class="en1">ETY.KR</h2><!-- image or text  -->
					<p class="ks2 f12">
					무료테마인 <a href="http://ety.kr" target="_blank" class="color-white">에티 비즈니스테마</a>는 상업적으로 이용하셔도 됩니다. 하지만 배포, 재배포는 안됩니다. <br />
					또한 해당 테마에 대해서 지적재산권을 주장 할 수 없음을 미리 알려드립니다. <br />
					별도 문의사항은 <span class="color-white">softzonecokr@naver.com</span> 으로 연락 주시기 바랍니다.
					</p>
					<p class="ks2 f12">
						<i class="far fa-building"></i> 사무실 : 경기도 아름다운 아파트 101동 1004호<br />
						<i class="fas fa-phone"></i> 연락처 : 010-0000-0000<br />
						<i class="far fa-envelope-open"></i> <a href="mailto:softzonecokr@naver.com" class="color-white">Email : SOFTZONECOKR@NAVER.COM</a><br />
						<i class="fas fa-fax"></i> 팩스번호 : 02) 1234-1234<br />
					</p>

				</div>
			</div>
		</div><!--/container-->
    </footer>
	<div class="container-fluid bg-gray">
		<div class="col-md-12 text-white text-center en1">
				Copyright 2019-2021 &copy; <a href="http://ety.kr" target="_blank"><span class="color-white ks4">에티테마</span></a>
		</div>
	</div><!-- /container -->

    <!-- Bootstrap core JavaScript -->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script>
	var jQuery = $.noConflict(true);
	</script>
    <script src="http://fullscreen.ety.kr/theme/ety_theme_company/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="http://fullscreen.ety.kr/theme/ety_theme_company/assets/parallax/js/parallax.min.js"></script>
	<script src="http://fullscreen.ety.kr/theme/ety_theme_company/assets/owlcarousel/js/owl.carousel.min.js"></script>
	<!-- countdown -->
	<script type="text/javascript" src="http://fullscreen.ety.kr/theme/ety_theme_company/assets/countdown/js/kinetic.js"></script>
	<script type="text/javascript" src="http://fullscreen.ety.kr/theme/ety_theme_company/assets/countdown/js/jquery.final-countdown.js"></script>
	<script type="text/javascript" src="http://fullscreen.ety.kr/theme/ety_theme_company/js/bootstrap-dropdownhover.js"></script>
	<script type="text/javascript" src="http://fullscreen.ety.kr/theme/ety_theme_company/js/custom.js"></script>
	<script>
		// para
		jQuery('.parallax-window').parallax({imageSrc: 'http://fullscreen.ety.kr/theme/ety_theme_company/img/pallax.jpg'});
	</script>
	<script>
		$(document).ready(function () {
			//owl
			jQuery(".owl-carousel").owlCarousel({
				autoplay:true,
				autoplayTimeout:3000,// 1000 -> 1초
				autoplayHoverPause:true,
				loop:true,
				margin:10,//이미지 사이의 간격
				nav:false,
				responsive:{
					0:{
						items:2 // 모바일
					},
					600:{
						items:3 // 브라우저 600px 이하
					},
					1000:{
						items:6 // 브라우저 100px 이하
					}
				}
			});

			// countdown
			'use strict';			
			jQuery('.countdown').final_countdown({
				'start': 1362139200,
				'end': 1388461320,
				'now': 1387461319        
			});
		});
	</script>

<script>

</script>


<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>



<!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
<!--[if lte IE 7]>
<script>
$(function() {
    var $sv_use = $(".sv_use");
    var count = $sv_use.length;

    $sv_use.each(function() {
        $(this).css("z-index", count);
        $(this).css("position", "relative");
        count = count - 1;
    });
});
</script>
<![endif]-->

</body>
</html>
