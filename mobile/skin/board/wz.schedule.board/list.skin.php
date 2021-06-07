<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css?v=191112">', 0);
?>

<?php if ($rss_href || $write_href) { ?>
<ul class="<?php echo isset($view) ? 'view_is_list btn_top' : 'btn_top top';?>">
    <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
    <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="sound_only">관리자</span></a></li><?php } ?>
    <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
</ul>
<?php } ?>
<!-- 게시판 목록 시작 -->
<div id="bo_list">

    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>

    <?php
    unset($list);
    include_once(G5_PLUGIN_PATH.'/wz.schedule.board/config.php');
    include_once(WCAL_PLUGIN_PATH.'/skin.list.php');
    ?>

</div>