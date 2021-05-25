<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<!-- 밑에 add_stylesheet 함수를 사용하지 않는이유은 가끔 홈페이지 개발시 오류로 add_stylesheet 함수가 먹지 않는 현상으로 인해 사용하지 않습니다. -->
<link href="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/core/main.css" rel="stylesheet" />
<link href="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/daygrid/main.css" rel="stylesheet" />
<link href="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/timegrid/main.css" rel="stylesheet" />
<link href="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/list/main.css" rel="stylesheet" />
<link href="<?php echo WCAL_PLUGIN_URL;?>/css/magnific-popup.css?v=191122" rel="stylesheet" />
<link href="<?php echo WCAL_PLUGIN_URL;?>/css/style.css?v=191122" rel="stylesheet" />

<script src="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/core/main.js"></script>
<script src="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/interaction/main.js"></script>
<script src="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/daygrid/main.js"></script>
<script src="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/timegrid/main.js"></script>
<script src="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/list/main.js"></script>
<script src="<?php echo WCAL_PLUGIN_URL;?>/fullcalendar/packages/core/locales-all.min.js"></script>
<script src="<?php echo WCAL_PLUGIN_URL;?>/js/common.js?v=191002"></script>
<script src="<?php echo WCAL_PLUGIN_URL;?>/js/jquery.magnific-popup.min.js"></script>

<?php
if (!$wscb['wrc_display_types']) {
    $wrc_display_types = 'dayGridMonth,dayGridWeek,dayGridDay';
}
else {
    $arr_display_types = unserialize($wscb['wrc_display_types']);
    if (is_array($arr_display_types)) {
        $wrc_display_types = implode(',', $arr_display_types);
    }
    else {
        $wrc_display_types = $arr_display_types;
    }
}

$wrc_lang = $wscb['wrc_lang'] ? $wscb['wrc_lang'] : 'ko';
?>

<script type="text/javascript">
<!--
document.addEventListener("DOMContentLoaded", function() {
    var initialLocaleCode = "<?php echo $wscb['wrc_lang']?>";
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ "dayGrid", "timeGrid", "list", "interaction" ],
        height: 'parent',
        header: {
            left: "prev,next today",
            center: "title",
            right: "<?php echo $wrc_display_types?>"
        },
        defaultDate: "<?php echo G5_TIME_YMD?>",
        defaultView: "<?php echo ($wscb['wrc_default_view'] ? $wscb['wrc_default_view'] : 'dayGridMonth')?>",
        locale: initialLocaleCode,
        navLinks: true, // can click day/week names to navigate views
        editable: false,
        weekNumbers: <?php echo ($wscb['wrc_weeks_number'] ? 'true' : 'false')?>,
        eventLimit: false, // allow "more" link when too many events
        timeZone: 'UTC',
        events: {
            url: "<?php echo WCAL_PLUGIN_URL;?>/get-events.php?bo_table="+g5_bo_table+"&sca=<?php echo urlencode($sca)?>",
            error: function() {
                $("#script-warning").show();
            }
        },
        eventClick: function(info) {
            console.log(info.event);
            if (info.event.url.indexOf(document.location.hostname) === -1) {
                window.open(info.event.url, '_blank');
                info.jsEvent.preventDefault(); // don't let the browser navigate
            }
        },
        loading: function(bool) {
            $("#loading").toggle(bool);
        }
    });
    calendar.render();

    if (g5_is_admin) {
        $("#calendar .fc-toolbar .fc-right").append('<div class="fc-button-group"><button type="button" class="fc-button fc-button-primary" id="btn-settings">설정</button></div>');
    }

});
jQuery(document).ready(function () {
    $(document).on('click', '#btn-settings', function() {
        $.magnificPopup.open({
            items: {
                src: '<?php echo WCAL_PLUGIN_URL?>/setting.php?bo_table='+ g5_bo_table
            },
            type: 'iframe'
        });
    });

    /*
    $(document).on('click', '.fc-event-container .fc-h-event', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $.magnificPopup.open({
            items: {
                src: href
            },
            type: 'iframe'
        });
    });
    */

});

//-->
</script>

<div id="calendar"></div>