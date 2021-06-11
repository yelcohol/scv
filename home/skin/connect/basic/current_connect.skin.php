<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$connect_skin_url.'/style.css">', 0);
?>

	<!-------------------------- 상단배경 수정 -------------------------->
	<?php
	$background_images = 'https://via.placeholder.com/1920x300';
	?>
	<style>
	/* mobile */
	@media (min-width: 1px) and (max-width: 1089px) {
			.about-bg{background-image:url('<?php echo $background_images?>');width:100%;-webkit-background-size:100% auto;-moz-background-size:100% auto;-o-background-size:100% auto;background-position:center; background-size: cover; background-repeat:no-repeat;color:#fff;height:100%;padding-top: 70px;}.ml-auto,.mx-auto{padding-top:10px;padding-bottom:10px}.lead{font-size:12px;font-weight:300}.display-4{ font-size:1.5rem;font-weight:300;}.btn,a.btn{line-height:20px!important;height:20px!important;padding:0 5px;text-align:center;font-weight:700;border:0;-webkit-transition:background-color .3s ease-out;-moz-transition:background-color .3s ease-out;-o-transition:background-color .3s ease-out;transition:background-color .3s ease-out}.btn-outline-secondary{font-size:11px;padding:0 5px}
	}
	/* desktop */
	@media (min-width: 1090px) {
		.about-bg{background-image:url('<?php echo $background_images?>');background-position:center center;background-repeat:no-repeat;color:#fff;height:300px}.lead{font-size:1.25rem;font-weight:300}.display-4{font-size:2.5rem;font-weight:300;line-height:1.2}
	}
	</style>


	<div class="position-relative overflow-hidden p-md-5 text-center bg-dark bg-sub-1 ety-mt-main about-bg">

	  <div class="col-md-5 p-lg-5 mx-auto my-5">
		<h1 class="display-4 font-weight-normal"><?php echo $title?></h1>
		<p class="lead font-weight-normal ko1">
			<?php echo $title_sub?>
		</p>
	  </div>
	  <div class="product-device shadow-sm d-none d-md-block"></div>
	  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
	</div>
	<!-------------------------- ./상단배경 수정 -------------------------->


<!-- 현재접속자 목록 시작 { -->
<div class="container margin-top-80">
	<div id="current_connect" class="ety-mt-qa">
		<ul>
		<?php
		for ($i=0; $i<count($list); $i++) {
			//$location = conv_content($list[$i]['lo_location'], 0);
			$location = $list[$i]['lo_location'];
			// 최고관리자에게만 허용
			// 이 조건문은 가능한 변경하지 마십시오.
			if ($list[$i]['lo_url'] && $is_admin == 'super') $display_location = "<a href=\"".$list[$i]['lo_url']."\">".$location."</a>";
			else $display_location = $location;

			$classes = array();
			if( $i && ($i % 4 == 0) ){
				$classes[] = 'box_clear';
			}
		?>
			<li class="<?php echo implode(' ', $classes); ?>">
				<div class="inner">
					<span class="crt_num"><?php echo $list[$i]['num'] ?></span>
					<span class="crt_name"><?php echo get_member_profile_img($list[$i]['mb_id']); ?><br><?php echo $list[$i]['name'] ?></span>
					<span class="crt_lct"><?php echo $display_location ?></span>
				</div>
			</li>
		<?php
		}
		if ($i == 0)
			echo "<li class=\"empty_li\">현재 접속자가 없습니다.</li>";
		?>
		</ul>
	</div>
	</div><!-- /container -->
<!-- } 현재접속자 목록 끝 -->