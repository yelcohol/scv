<?php
if(isset($_POST['theme']) && $_POST['theme']) {
    define('_THEME_PREVIEW_', true);
}

include_once('./_common.php');

$skin_dir = "theme/basic";

ob_start();
?>
<legend>사이트 내 전체검색</legend>
<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
    <input type="hidden" name="sfl" value="wr_subject||wr_content">
    <input type="hidden" name="sop" value="and">
    <label for="sch_stx" class="sound_only">검색어 필수</label>
    <input type="text" name="stx" id="sch_stx" maxlength="20" placeholder="검색어">
    <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search"></i><span class="sound_only">검색</span></button>
</form>

<button class="sch_more_close"><i class="fa fa-times-circle" aria-hidden="true"></i><span class="sound_only">닫기</span></button>

<?php if($_POST['place'] == 'head') { ?>
<button class="sch_more_close">닫기</button>
<?php }

$content = ob_get_contents();
ob_end_clean();

echo $content;
?>
