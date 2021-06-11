
	<?php
	// 페이지명 구하기
	$pagename = basename($_SERVER["PHP_SELF"]);
	?>


	<!-------------------------- 첫번째 좌측메뉴 -------------------------->
	<?php

	/**

	아래 예제를 보시고 좌측메뉴가 있는 게시판 + 페이지를 구성해주세요~

	*****/


	// 게시판이나 페이지를 추가할 수 있습니다.
	// tail.php 도 동일하게 추가되어 있습니다.
	// tail.php 도 함께 수정해주세요.


	// 아래에 추가할 게시판 또는 페이지를 넣어주세요.
	if($bo_table == 'notice' || 
		$bo_table == 'free' || 
		$bo_table == 'free_responsive' || 
		$bo_table == 'free_scroll' || 
		$pagename == "product-2.php"
		){


			// 페이지일 경우만 타이틀 이름을 별도 지정해야 합니다.
			if($pagename == 'product-2.php')
					$E_bo['bo_subject'] = '페이지';


	?>
	
    <div class="container" style="padding-top: 20px;padding-bottom: 50px;">
      <div class="row">
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-first" style="font-size:20px;"><?php echo $E_bo['bo_subject']?></a>
			<a href="<?php echo G5_URL?>/bbs/board.php?bo_table=notice" class="list-group-item<?php if($bo_table == "notice") echo " active";?>">공지사항</a>
			<a href="<?php echo G5_URL?>/bbs/board.php?bo_table=free" class="list-group-item<?php if($bo_table == "free") echo " active";?>">자유게시판</a>
			<a href="<?php echo G5_URL?>/bbs/board.php?bo_table=free_responsive" class="list-group-item<?php if($bo_table == "free_responsive") echo " active";?>">게시판 1</a>
			<a href="<?php echo G5_URL?>/bbs/board.php?bo_table=free_scroll" class="list-group-item<?php if($bo_table == "free_scroll") echo " active";?>">게시판 2</a>
			<a href="<?php echo G5_URL?>/pages/product-2.php" class="list-group-item <?php if($pagename == "product-2.php") echo " active";?>">페이지</a>

          </div>
        </div>
        <div class="col-lg-9 mb-4">

	<?php }?>
	<!-------------------------- 첫번째 끝 -------------------------->



	
	<!-------------------------- 두번째 좌측메뉴 -------------------------->
	<?php

	// 게시판이나 페이지를 추가할 수 있습니다.
	// tail.php 도 동일하게 추가되어 있습니다.
	// tail.php 도 함께 수정해주세요.


	// 아래에 추가할 게시판 또는 페이지를 넣어주세요.
	if($pagename == 'pages-1.php' || $pagename == "pages-2.php"){


			// 게시판이 아니고 페이지일 경우 타이틀 이름을 지정합니다.
			if($pagename == 'pages-1.php')
					$E_bo['bo_subject'] = '페이지 1';

			if($pagename == 'pages-2.php')
					$E_bo['bo_subject'] = '페이지 2';



	?>
	
    <div class="container" style="padding-top: 20px;padding-bottom: 50px;">
      <div class="row">
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-first" style="font-size:20px;"><?php echo $E_bo['bo_subject']?></a>
			<a href="<?php echo G5_URL?>/pages/pages-1.php" class="list-group-item<?php if($pagename == "pages-1.php") echo " active";?>">pages-1</a>
			<a href="<?php echo G5_URL?>/pages/pages-2.php" class="list-group-item<?php if($pagename == "pages-2.php") echo " active";?>">pages-2</a>
          </div>
        </div>
        <div class="col-lg-9 mb-4">

	<?php }?>