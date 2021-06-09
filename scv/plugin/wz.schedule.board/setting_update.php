<?php
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/wz.schedule.board/config.php');
include_once(WCAL_PLUGIN_PATH.'/lib/function.lib.php');

if (!$is_admin) {
    echo '<script type="text/javascript">window.parent.$.magnificPopup.close();</script>';
    exit;
}

$wrc_default_view = isset($_POST['wrc_default_view']) ? trim($_POST['wrc_default_view']) : '';
$wrc_display_name = isset($_POST['wrc_display_name']) ? trim($_POST['wrc_display_name']) : 0;
$wrc_weeks_number = isset($_POST['wrc_weeks_number']) ? trim($_POST['wrc_weeks_number']) : 0;
$wrc_lang = isset($_POST['wrc_lang']) ? trim($_POST['wrc_lang']) : 'ko';

$wrc_default_view = clean_xss_tags($wrc_default_view);
$wrc_display_name = clean_xss_tags($wrc_display_name);
$wrc_weeks_number = clean_xss_tags($wrc_weeks_number);
$wrc_lang = clean_xss_tags($wrc_lang);

$wrc_display_types = serialize($_POST['wrc_display_types']);

$query_common = "
            wrc_default_view = '".$wrc_default_view."',
            wrc_display_name = '".$wrc_display_name."',
            wrc_weeks_number = '".$wrc_weeks_number."',
            wrc_lang = '".$wrc_lang."',
            wrc_display_types = '".$wrc_display_types."'
        ";
$query = "update {$g5['board_schedule_config_table']} set ".$query_common." where wrc_id = '".$wscb['wrc_id']."' ";
sql_query($query, true);

// 색상정보 초기화
$query = "delete from {$g5['board_schedule_color_table']} where wrc_id = '".$wscb['wrc_id']."'";
sql_query($query);

// 색상정보 등록
foreach ($_POST['wrr_color_bg'] as $key => $value) {
    $query = "insert into {$g5['board_schedule_color_table']} set
                        wrc_id = '".$wscb['wrc_id']."',
                        wrr_color_bg = '".$value."',
                        wrr_color_tx = '".$_POST['wrr_color_tx'][$key]."'
          ";
    sql_query($query, true);
}
?>
<html>
    <head>
        <title>설정정보저장</title>
        <script>
            // 결제 중 새로고침 방지 샘플 스크립트 (중복결제 방지)
            function noRefresh()
            {
                /* CTRL + N키 막음. */
                if ((event.keyCode == 78) && (event.ctrlKey == true))
                {
                    event.keyCode = 0;
                    return false;
                }
                /* F5 번키 막음. */
                if(event.keyCode == 116)
                {
                    event.keyCode = 0;
                    return false;
                }
            }

            document.onkeydown = noRefresh ;
            window.parent.location.reload();
        </script>
    </head>
</html>