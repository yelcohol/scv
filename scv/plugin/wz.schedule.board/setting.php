<?php
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/wz.schedule.board/config.php');
include_once(WCAL_PLUGIN_PATH.'/lib/function.lib.php');
include_once(G5_PATH.'/head.sub.php');

if (!$is_admin) {
    echo '<script type="text/javascript">window.parent.$.magnificPopup.close();</script>';
    exit;
}

$db_reload = false;

if(!sql_query(" DESCRIBE {$g5['board_schedule_config_table']} ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS {$g5['board_schedule_config_table']} (
                    `wrc_id` INT(11) NOT NULL AUTO_INCREMENT,
                    `wrc_default_view` VARCHAR(20) NOT NULL DEFAULT 'dayGridMonth',
                    `wrc_display_name` TINYINT(4) NOT NULL DEFAULT '1',
                    `wrc_weeks_number` TINYINT(4) NOT NULL DEFAULT '0',
                    `wrc_lang` VARCHAR(10) NOT NULL DEFAULT 'ko',
                    `wrc_display_types` VARCHAR(255) NOT NULL DEFAULT '',
                    PRIMARY KEY (`wrc_id`)
                )
                COMMENT='스케쥴설정정보'
                ENGINE=MyISAM  DEFAULT CHARSET=utf8;", true);

    sql_query(" INSERT INTO {$g5['board_schedule_config_table']}
                    SET `wrc_default_view` = 'dayGridMonth'
            ", true);

    $db_reload = true;
}

// 2019-12-05 : bo_table 추가
$query = "show columns from `{$g5['board_schedule_config_table']}` like 'bo_table' ";
$res = sql_fetch($query);
if (empty($res)) {
    sql_query(" ALTER TABLE `{$g5['board_schedule_config_table']}`
                    ADD `bo_table` varchar(20) NOT NULL DEFAULT ''
                    ; ", true);

    sql_query(" update {$g5['board_schedule_config_table']} set bo_table = '".$bo_table."' ");
    $db_reload = true;
}

if(!sql_query(" DESCRIBE {$g5['board_schedule_color_table']} ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS {$g5['board_schedule_color_table']} (
                    `wrr_id` INT(11) NOT NULL AUTO_INCREMENT,
                    `wrc_id` INT(11) NOT NULL,
                    `wrr_color_bg` VARCHAR(10) NOT NULL DEFAULT '',
                    `wrr_color_tx` VARCHAR(10) NOT NULL DEFAULT '',
                    PRIMARY KEY (`wrr_id`),
                    INDEX `wrc_id` (`wrc_id`)
                )
                COMMENT='스케쥴색상정보'
                ENGINE=MyISAM  DEFAULT CHARSET=utf8;", true);

    $db_reload = true;
}

$wrc_display_types = unserialize($wscb['wrc_display_types']);
if (!is_array($wrc_display_types)) {
    $wrc_display_types = array();
}

if ($db_reload) {
    alert('DB를 갱신합니다.', './setting.php');
}

$arr_color = array();
$query = "select * from {$g5['board_schedule_color_table']} where wrc_id = '".$wscb['wrc_id']."' order by wrr_id asc";
$res = sql_query($query);
while($row = sql_fetch_array($res)) {
    $arr_color[] = $row;
}
$cnt_color = count($arr_color);
if ($res) sql_free_result($res);

$g5['title'] = '화면설정';
?>

<link href="<?php echo WCAL_PLUGIN_URL;?>/css/style.css?v=191205" rel="stylesheet" />
<script src="<?php echo WCAL_PLUGIN_URL;?>/js/jscolor.min.js"></script>

<div id="scrap" class="new_win">
    <h1 id="win_title"><i class="fa fa-cog" aria-hidden="true"></i> <?php echo $g5['title'] ?></h1>

    <div class="new_win_con">

        <form name="frm" id="frm" action="./setting_update.php" method="post" enctype="multipart/form-data" onsubmit="return getAction(document.forms.frm);">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table;?>" />
        <div class="wz_tbl_1">

            <div style="text-align:left;padding:0 0 10px;"><h3>기본설정</h3></div>
            <table>
            <tbody>
            <tr>
                <th>기본보기설정<span class="sound_only">필수</span></th>
                <td>
                    <label><input type="radio" name="wrc_default_view" id="wrc_default_view1" value="dayGridMonth" <?php echo ($wscb['wrc_default_view'] == 'dayGridMonth' ? 'checked' : '');?> /> 월간</label>&nbsp;
                    <label><input type="radio" name="wrc_default_view" id="wrc_default_view2" value="dayGridWeek" <?php echo ($wscb['wrc_default_view'] == 'dayGridWeek' ? 'checked' : '');?> /> 주간</label>&nbsp;
                    <label><input type="radio" name="wrc_default_view" id="wrc_default_view3" value="dayGridDay" <?php echo ($wscb['wrc_default_view'] == 'dayGridDay' ? 'checked' : '');?> /> 일간</label>
                </td>
            </tr>
            <tr>
                <th>화면버튼종류<span class="sound_only">필수</span></th>
                <td>
                    <label><input type="checkbox" name="wrc_display_types[]" id="wrc_display_types1" value="dayGridMonth" <?php echo in_array('dayGridMonth', $wrc_display_types) ? ' checked' : '' ; ?> /> 월간</label>&nbsp;
                    <label><input type="checkbox" name="wrc_display_types[]" id="wrc_display_types2" value="dayGridWeek" <?php echo in_array('dayGridWeek', $wrc_display_types) ? ' checked' : '' ; ?> /> 주간</label>&nbsp;
                    <label><input type="checkbox" name="wrc_display_types[]" id="wrc_display_types3" value="timeGridWeek" <?php echo in_array('timeGridWeek', $wrc_display_types) ? ' checked' : '' ; ?> /> 주간(시간)</label>&nbsp;
                    <label><input type="checkbox" name="wrc_display_types[]" id="wrc_display_types4" value="dayGridDay" <?php echo in_array('dayGridDay', $wrc_display_types) ? ' checked' : '' ; ?> /> 일간</label>&nbsp;
                    <label><input type="checkbox" name="wrc_display_types[]" id="wrc_display_types5" value="timeGridDay" <?php echo in_array('timeGridDay', $wrc_display_types) ? ' checked' : '' ; ?> /> 일간(시간)</label>
                </td>
            </tr>
            <tr>
                <th>작성자명노출<span class="sound_only">필수</span></th>
                <td>
                    <label><input type="radio" name="wrc_display_name" id="wrc_display_name1" value="1" <?php echo ($wscb['wrc_display_name'] == '1' ? 'checked' : '');?> /> 보이기</label>
                    <label><input type="radio" name="wrc_display_name" id="wrc_display_name2" value="0" <?php echo ($wscb['wrc_display_name'] == '0' ? 'checked' : '');?> /> 숨기기</label>
                </td>
            </tr>
            <tr>
                <th>주차표시<span class="sound_only">필수</span></th>
                <td>
                    <label><input type="radio" name="wrc_weeks_number" id="wrc_weeks_number1" value="1" <?php echo ($wscb['wrc_weeks_number'] == '1' ? 'checked' : '');?> /> 표시</label>
                    <label><input type="radio" name="wrc_weeks_number" id="wrc_weeks_number2" value="0" <?php echo ($wscb['wrc_weeks_number'] == '0' ? 'checked' : '');?> /> 숨기기</label>
                </td>
            </tr>
            <tr>
                <th>언어설정<span class="sound_only">필수</span></th>
                <td>
                    <select name="wrc_lang" id="wrc_lang">
                        <option value="ko" <?php echo ($wscb['wrc_lang'] == 'ko' ? 'selected=selected' : '');?>>한국어</option>
                        <option value="en" <?php echo ($wscb['wrc_lang'] == 'en' ? 'selected=selected' : '');?>>영어</option>
                        <option value="zh-cn" <?php echo ($wscb['wrc_lang'] == 'zh-cn' ? 'selected=selected' : '');?>>중국어(간체)</option>
                        <option value="zh-tw" <?php echo ($wscb['wrc_lang'] == 'zh-tw' ? 'selected=selected' : '');?>>중국어(번체)</option>
                        <option value="ja" <?php echo ($wscb['wrc_lang'] == 'ja' ? 'selected=selected' : '');?>>일어</option>
                    </select>
                </td>
            </tr>
            </table>
        </div>

        <div class="wz_tbl_1">
            <div style="text-align:left;padding:0 0 10px;"><h3>표시색상설정</h3></div>
            <table id="wrap-tbl-color">
            <colgroup>
                <col width="40%"/>
                <col width="40%"/>
                <col width="20%"/>
            </colgroup>
            <thead>
            <tr>
                <th scope="row">배경색</th>
                <th scope="row">글씨색</th>
                <th scope="row" style="text-align:center;"><a href="#none" class="btn-set add-tr">추가</a></th>
            </tr>
            </thead>
            <tbody>
                <?php
                if ($cnt_color > 0) {
                    foreach ($arr_color as $k => $v) {
                    ?>
                    <tr>
                        <td><input type="text" name="wrr_color_bg[]" value="<?php echo $v['wrr_color_bg'] ? $v['wrr_color_bg'] : '#ffffff'; ?>" id="wrr_color_bg" class="frm_input jscolor {hash:true}" size="8"></td>
                        <td><input type="text" name="wrr_color_tx[]" value="<?php echo $v['wrr_color_tx'] ? $v['wrr_color_tx'] : '#919191'; ?>" id="wrr_color_tx" class="frm_input jscolor {hash:true}" size="8"></td>
                        <td style="text-align:center;"><a href="#none" class="btn-set del-tr" data-wrr-id="<?php echo $v['wrr_id'];?>">삭제</a></td>
                    </tr>
                    <?php
                    }
                }
                else {
                    ?>
                    <tr class="empty">
                        <td colspan="3">추가버튼을 클릭하여 색상을 등록해주세요.</td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

        <div style="margin:10px 0;text-align:center;">
            <input type="submit" value="저장하기" id="btn_submit" class="btn_submit" style="float:none">
        </div>
        </form>

    </div>
</div>

<script type="text/javascript">
<!--
jQuery(document).ready(function () {
    $(document).on('click', '.add-tr', function() {
        $('.empty').remove();
        tbl_tr_add();
    });
    $(document).on('click', '.del-tr', function() {
        var wrr_id = $(this).attr('data-wrr-id');
        if (wrr_id) {
            $('#frm').prepend('<input type="hidden" name="wrr_id[]" value="'+wrr_id+'">');
        }

        $(this).closest('tr').remove();
        var tr_cnt = $('#wrap-tbl-color tbody tr').length;
        if (tr_cnt == 0) {
            $('#wrap-tbl-color').append('<tr class="empty"><td colspan="3">추가버튼을 클릭하여 색상을 등록해주세요.</td></tr>');
        }
    });
});
function tbl_tr_add() {

    var tbl_tr_html = '';
        tbl_tr_html += '<tr>';
        tbl_tr_html += '    <td><input type="text" name="wrr_color_bg[]" value="#ffffff" id="wrr_color_bg" class="frm_input jscolor {hash:true}" size="8"></td>';
        tbl_tr_html += '    <td><input type="text" name="wrr_color_tx[]" value="#919191" id="wrr_color_tx" class="frm_input jscolor {hash:true}" size="8"></td>';
        tbl_tr_html += '    <td style="text-align:center;"><a href="#none" class="btn-set del-tr">삭제</a></td>';
        tbl_tr_html += '</tr>';

    $('#wrap-tbl-color').append(tbl_tr_html);
    jscolor.installByClassName("jscolor");
}
//-->
</script>

<?php
include_once(G5_PATH.'/tail.sub.php');
?>

