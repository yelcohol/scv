
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="home/fa.ico" />
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SCV</title>
<link rel="stylesheet" href="home/css/default.css">
<link rel="stylesheet" href="home/skin/latest/basic_main_one/style.css">
<link rel="stylesheet" href="home/skin/latest/pic_basic_company/style.css">
<link rel="stylesheet" href="home/skin/latest/pic_basic_owl/style.css">
<!--[if lte IE 8]>
<script src="home/js/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "home";
var g5_bbs_url   = "home/bbs";
var g5_is_member = "";
var g5_is_admin  = "";
var g5_is_mobile = "";
var g5_bo_table  = "";
var g5_sca       = "";
var g5_editor    = "";
var g5_cookie_domain = "";
</script>
<script src="scv/js/jquery-1.8.3.min.js"></script>
<script src="scv/js/jquery.menu.js"></script>
<script src="scv/js/common.js"></script>
<script src="scv/js/wrest.js"></script>
<script src="scv/js/placeholders.min.js"></script>
<link rel="stylesheet" href="scv/js/font-awesome/css/font-awesome.min.css">

<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800|Noto+Sans+KR:100,300,400,500,700,900|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="home/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- owl Carousel -->
<link rel="stylesheet" href="home/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="home/assets/owlcarousel/css/owl.theme.default.min.css">

<!-- countdown -->
<link href="home/assets/countdown/css/demo.css" rel="stylesheet">
<!-- bootstrap-social icon -->
<link href="home/assets/bootstrap-social/bootstrap-social.css" rel="stylesheet">
<link href="home/css/animate.css" rel="stylesheet">
<link href="home/css/bootstrap-dropdownhover.css" rel="stylesheet">
<!-- Custom & ety -->
<link href="home/css/modern-business.css" rel="stylesheet">
<link href="home/css/ety.css" rel="stylesheet">


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
<meta property="og:image" content="home/img/photo_2021-06-11_13-40-21.jpg">
<meta property="og:url" content="">
<!-------------------------- ./수정해서 사용하세요 -------------------------->



<!-------------------------- 네비게이션 -------------------------->
<!-- <div class="container-fluid top-line fixed-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="tnb-left">
					#social
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
											<li><a href="home/bbs/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> 회원가입</a></li>
						<li><a href="home/bbs/login.php"><i class="fas fa-sign-in-alt"></i> 로그인</a></li>
											<li><a href="home/bbs/faq.php"><i class="fa fa-question" aria-hidden="true"></i> <span>FAQ</span></a></li>
						<li><a href="home/bbs/qalist.php"><i class="fa fa-comments" aria-hidden="true"></i> <span>1:1문의</span></a></li>
						<li><a href="home/bbs/current_connect.php" class="visit"><i class="fa fa-users" aria-hidden="true"></i> <span>접속자</span><strong class="visit-num">
						1</strong></a></li>
						<li><a href="home/bbs/new.php"><i class="fa fa-history" aria-hidden="true"></i> <span>새글</span></a></li>
											</ul>
				</div>
			</div>#column
		</div>#row
	</div>#container
</div> -->
<style>
.collapse.in{
    -webkit-transition-delay: 4s;
    transition-delay: 5s;
    visibility: visible;
}
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-white bg-white fixed-top">
  <div class="container">
	<a class="navbar-brand" href="" class="logo"><img src="home/img/photo_2021-06-11_13-40-21.jpg" style="width:70px;">&nbsp;SCV</a>
	<button class="navbar-toggler navbar-dark navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive" data-hover="dropdown" data-animations="fadeIn fadeIn fadeInUp fadeInRight">
	  <ul class="navbar-nav ml-auto">
					
							<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					회사소개					</a>
						#서브
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="about.php" target="_self">인사말</a>

														<a class="dropdown-item ks4 f15 fw4" href="history.php" target="_self">연혁</a>

														<a class="dropdown-item ks4 f15 fw4" href="pages-1.php" target="_self">빈페이지</a>

							</ul>
					</li> -->

					
							<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					비즈니스					</a>
						#서브
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/pages/product.php" target="_self">사업안내 1</a>

														<a class="dropdown-item ks4 f15 fw4" href="/pages/product-2.php" target="_self">사업안내 2</a>

														<a class="dropdown-item ks4 f15 fw4" href="/pages/service.php" target="_self">서비스</a>

							</ul>
					</li> -->

					
							<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ks4 f16" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_self">
					제품안내					</a>
						#서브
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
														<a class="dropdown-item ks4 f15 fw4" href="/gallery" target="_self">갤러리 1</a>

							</ul>
					</li> -->

					
					<li class="nav-item dropdown">
					<a class="nav-link ks4 f16" href="scv" id="navbarDropdownBlog" aria-haspopup="true" aria-expanded="false" target="_self">
					SCV 페이지</a>
					</li>

					<li class="nav-item dropdown">
					<a class="nav-link ks4 f16" href="worker_faq.php" id="navbarDropdownBlog" aria-haspopup="true" aria-expanded="false" target="_self">
					근로자 FAQ</a>
					</li>

					<li class="nav-item dropdown">
					<a class="nav-link ks4 f16" href="constructor_faq.php" id="navbarDropdownBlog" aria-haspopup="true" aria-expanded="false" target="_self">
					건설사 FAQ</a>
					</li>

					<li class="nav-item dropdown">
					<a class="nav-link ks4 f16" href="#googleform" id="navbarDropdownBlog" aria-haspopup="true" aria-expanded="false" target="_self">
					제휴 문의</a>
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
	  <div class="carousel-item active" style="background-image: url('home/img/site-4686908.jpg')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">Service</h3>
		  <p class="ks4 f20">새벽에 인력사무소로 출근하는 대신 SCV를 사용하여 일자리를 간편하게 지원하세요</p>
		</div>
	  </div>
	  <!-- Slide Two - Set the background image for this slide in the line below -->
	  <div class="carousel-item" style="background-image: url('home/img/construction-silhouette.jpg')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">Connect</h3>
		  <p class="ks4 f20">좋은 건설 일자리를 믿을 수 있는 근로자에게 연결합니다</p>
		</div>
	  </div>
	  <!-- Slide Three - Set the background image for this slide in the line below -->
	  <div class="carousel-item" style="background-image: url('home/img/construction-worker-495373.jpg')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">Velocity</h3>
		  <p class="ks4 f20">매칭은 즉시, 일당 지급은 당일</p>
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
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"></div>
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

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


			



<!-------------------------- 회사소개 및 안내 -------------------------->
<div class="container margin-top-80 margin-bottom-80">
<a name="googleform"></a>
	<div class="center-heading margin-top-40">
		<h2 class="en1">제휴 문의</h2>
		<span class="center-line"></span>
	</div>

<div class="row">

<iframe style="display:block; margin:0 auto;" src="https://docs.google.com/forms/d/e/1FAIpQLScxNldjOkdOAhxkeCotnpgc-KX_yqQS2FfwqUW6czRPoZJaZQ/viewform?embedded=true" width="640" height="1000" frameborder="0" marginheight="0" marginwidth="0">로드 중…</iframe>

</div>

</div>




<!-------------------------- parallax 박스 및 countdown -------------------------->
<!-- 

테마폴더/tail.php : 94번째줄에서 이미지를 교체해주세요.

-->
<div class="parallax-window" data-parallax="scroll">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center p-center para-text">
				<h2 class='text-light ks5'>비대면 인력사무소, SCV 바로가기</h2>
				<button type="button" class="btn btn-outline-light ks4" onclick='window.open("about:blank").location.href="scv"'>바로가기</button>
			</div>
		</div>
	</div>
</div><!-- /parallax -->
		
	<footer class="py-5 bg-dark margin-top-80">
		<div class="container footer">
			<div class="row">
				<div class="col-md-12 text-white text-center">
					<h2 class="en1">MJW.DEB.KR</h2><!-- image or text  -->
					<p class="ks2 f12">
					별도 문의사항은 <span class="color-white">admin@scv.com</span> 으로 연락 주시기 바랍니다.
					</p>
					<p class="ks2 f12">
						<i class="far fa-building"></i> 사무실 : 서울 강동구 성내로6길 14-20 청정빌딩 402호<br />
						<i class="fas fa-phone"></i> 연락처 : 010-3886-3419<br />
						<i class="far fa-envelope-open"></i> <a href="mailto:admin@scv.com" class="color-white">Email : ADMIN@SCV.COM</a><br />
						<i class="fas fa-fax"></i> 팩스번호 : 02) 1234-1234<br />
					</p>

				</div>
			</div>
		</div><!--/container-->
    </footer>


    <!-- Bootstrap core JavaScript -->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script>
	var jQuery = $.noConflict(true);
	</script>
    <script src="home/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="home/assets/parallax/js/parallax.min.js"></script>
	<script src="home/assets/owlcarousel/js/owl.carousel.min.js"></script>
	<!-- countdown -->
	<script type="text/javascript" src="home/assets/countdown/js/kinetic.js"></script>
	<script type="text/javascript" src="home/assets/countdown/js/jquery.final-countdown.js"></script>
	<script type="text/javascript" src="home/js/bootstrap-dropdownhover.js"></script>
	<script type="text/javascript" src="home/js/custom.js"></script>
	<script>
		// para
		jQuery('.parallax-window').parallax({imageSrc: 'home/img/pallax.jpg'});
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
