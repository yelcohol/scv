<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>


<?php 
/**************************************************************************

GNUBOARD 5.4

테마메뉴얼주소 입니다. 아래 주소에 설치 및 셋팅법이 포함되어 있습니다.
http://ety.kr/board/free_theme_manual

오류내용은 질문게시판을 이용해주세요 (오픈카톡이나 유선상 문의를 받지 않습니다.)
http://ety.kr/board/qa

팁영상 요청 주소 : softzonecokr@naver.com 
팁영상 요청을 해주시면 중복되지 않는 선에서 팁영상을 제작해드고 있습니다.

[라이선스]
자주 하는 질문이 있어서 문서내 포함시켰습니다.
해당 내용은 읽어 보시고 삭제하셔도 됩니다.

1. 배포, 재배포는 에티테마만 가능하므로 사용만 하시고 다른쪽에 배포나 재배포 하지 말아주세요.
(라이선스 위반을 하시게 되면 그에 따른 배상책임이 따르게 됩니다.)

2. 돈을 받고 유상으로 작업하셔도 되지만 그에 대한 책임은 돈을 받는 제작자에게 있으며 에티테마와는 무관합니다.


**************************************************************************/ 
?>




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
	  <div class="carousel-item active" style="background-image: url('https://via.placeholder.com/1920x620')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">에티와이드테마</h3>
		  <p class="ks4 f20">전체페이지를 와이드 형태로만 제작하였습니다.</p>
		</div>
	  </div>
	  <!-- Slide Two - Set the background image for this slide in the line below -->
	  <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1920x620')">
		<div class="carousel-caption d-md-block">
		  <h3 class="ks4">반응형 비즈니스 테마</h3>
		  <p class="ks4 f20">CMS 인 그누보드 5.4 와 연동되어 사용가능한 테마 입니다.</p>
		</div>
	  </div>
	  <!-- Slide Three - Set the background image for this slide in the line below -->
	  <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1920x620')">
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
			<?php echo latest('theme/basic_main_one', 'notice', 5, 40);?>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<?php echo latest('theme/basic_main_one', 'free', 5, 40);?>
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
				<img class="img-fluid rounded" src="http://placehold.it/570x400" alt="">
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
			<img class="img-fluid rounded" src="http://placehold.it/570x400" alt="">
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
	<?php echo latest('theme/pic_basic_company', 'gallery', 6, 24); ?>
</div>





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
	<?php echo latest('theme/pic_basic_owl', 'gallery', 12, 24); ?>
</div>




<?php
/*
	<!-------------------------- CALL ACTION -------------------------->
	<div class="callbox">
		<div class="container margin-top-20">
		<h3 class="margin-bottom-50 text-left en1">ETY DEMO</h3>
		  <div class="row">
			<div class="col-md-8">
			  <p class="ks4">
			  에티테마에 대한 궁금증이나 질문이 있으시면 에티테마의 질문게시판을 이용해주세요.<BR />
			  http://ety.kr/board/qa
			  </p>
			</div>
			<div class="col-md-4">
			  <a class="btn btn-lg btn-secondary btn-block en1" href="http://ety.kr/board/qa" target="_blank">GO!</a>
			</div>
		  </div>
		</div>
	</div>
	<!-- /.container -->
*/
?>



<?php
include_once(G5_THEME_PATH.'/tail.php');
?>