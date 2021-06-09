<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<div class="notice">
    <h2><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>" class="lt_title"><?php echo $bo_subject ?></a></h2>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
        <?php if ($list[$i]['icon_secret']) { ?>
            <span class="lock_icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
        <?php }
             //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\">";
            echo $list[$i]['subject'];
            if ($list[$i]['icon_new']) echo " <span class=\"new_icon\">N</span>";
            echo $list[$i]['comment_cnt'];
            echo "</a>";
            ?>
        </li>
    <?php } ?>
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
	<li class="empty_li">게시물이 없습니다.</li>
	<?php } ?>
    </ul>
</div>
