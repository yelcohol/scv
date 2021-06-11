<?php

if(!defined('_INDEX_')) { // index에서만 실행

/*
-------------------------------------------------
| 이곳은 게시판만 해당 합니다.
-------------------------------------------------
*/

// 배경 이미지 주소만 넣어주세요.


$board_notice =		'https://via.placeholder.com/1920x300'; // 공지사항 서브배경 이미지 주소
$board_free =		'https://via.placeholder.com/1920x300';  // 자유게시판 서브배경 이미지 주소
$board_gallery =	'https://via.placeholder.com/1920x300'; // 갤러리 서브배경 이미지 주소
$board_qa =			'https://via.placeholder.com/1920x300'; // 갤러리 서브배경 이미지 주소

// notice 게시판
if($bo_table == 'notice'){
	$background_images = $board_notice;
}

// free 게시판
if($bo_table == 'free'){
	$background_images = $board_free;
}

// gallery 게시판
if($bo_table == 'gallery'){
	$background_images = $board_gallery;
}

// QA 게시판
if($bo_table == 'qa'){
	$background_images = $board_qa;
}

?>

<!-------------------------- 상단배경 수정 -------------------------->
<style>
/* mobile */
@media (min-width: 1px) and (max-width: 1089px) {
		.about-bg{background-image:url('<?php echo $background_images?>');width:100%;-webkit-background-size:100% auto;-moz-background-size:100% auto;-o-background-size:100% auto;background-position:center; background-size: cover; background-repeat:no-repeat;color:#fff;height:100%;padding-top: 70px;}.ml-auto,.mx-auto{padding-top:10px;padding-bottom:10px}.lead{font-size:12px;font-weight:300}.display-4{ font-size:1.5rem;font-weight:300;}

}
/* desktop */
@media (min-width: 1090px) {
	.about-bg{background-image:url('<?php echo $background_images?>');background-position:center center;background-repeat:no-repeat;color:#fff;height:300px}.lead{font-size:1.25rem;font-weight:300}.display-4{font-size:2.5rem;font-weight:300;line-height:1.2}
}
</style>


<div class="position-relative overflow-hidden p-md-5 text-center bg-dark bg-sub-1 ety-mt-main about-bg margin-bottom-80">

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

<?php } ?>