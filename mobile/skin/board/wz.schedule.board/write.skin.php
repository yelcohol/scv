<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');
include_once(G5_PLUGIN_PATH.'/wz.schedule.board/config.php');

$arr_color = array();
$query = "select * from {$g5['board_schedule_color_table']} where wrc_id = '".$wscb['wrc_id']."' order by wrr_id asc";
$res = sql_query($query);
while($row = sql_fetch_array($res)) {
    $arr_color[] = $row;
}
$cnt_color = count($arr_color);
if ($res) sql_free_result($res);

$is_time_use = false;
$wr_5_1 = $wr_5_2 = '00'; // 시작시간
$wr_6_1 = $wr_6_2 = '00'; // 종료시간
if ($wscb['wrc_display_types']) {
    $arr_display_types = unserialize($wscb['wrc_display_types']);
    if (in_array('timeGridWeek', $arr_display_types) || in_array('timeGridDay', $arr_display_types)) {
        $is_time_use = true;
        list($wr_5_1, $wr_5_2) = explode(':', $write['wr_5']);
        list($wr_6_1, $wr_6_2) = explode(':', $write['wr_6']);
    }
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css?v=191112">', 0);
?>

<!-- 밑에 add_stylesheet 함수를 사용하지 않는이유은 가끔 홈페이지 개발시 오류로 add_stylesheet 함수가 먹지 않는 현상으로 인해 사용하지 않습니다. -->
<link rel="stylesheet" href="<?php echo WCAL_PLUGIN_URL;?>/css/style.css">

<section id="bo_w">
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= PHP_EOL.'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= PHP_EOL.'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= PHP_EOL.'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= PHP_EOL.'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>
    <div class="form_01 write_div">
        <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

        <?php if ($is_category) { ?>
        <div class="bo_w_select write_div">
            <label for="ca_name" class="sound_only">분류<strong>필수</strong></label>
            <select id="ca_name" name="ca_name" required>
                <option value="">선택하세요</option>
                <?php echo $category_option ?>
            </select>
        </div>
        <?php } ?>

        <?php if ($is_name) { ?>
        <div class="write_div">
            <label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
            <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input full_input required" maxlength="20" placeholder="이름">
        </div>
        <?php } ?>

        <?php if ($is_password) { ?>
        <div class="write_div">
            <label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
            <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input full_input <?php echo $password_required ?>" maxlength="20" placeholder="비밀번호">
        </div>
        <?php } ?>

        <?php if ($is_email) { ?>
        <div class="write_div">
            <label for="wr_email" class="sound_only">이메일</label>
            <input type="email" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input full_input  email" maxlength="100" placeholder="이메일">
        </div>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <div class="write_div">
            <label for="wr_homepage" class="sound_only">홈페이지</label>
            <input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input full_input " placeholder="홈페이지">
        </div>
        <?php } ?>

        <?php if ($option) { ?>
        <div class="write_div">
            <span class="sound_only">옵션</span>
            <?php echo $option ?>
        </div>
        <?php } ?>

        <div class="bo_w_tit write_div">
            <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
            <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" placeholder="제목">
        </div>

        <div class="bo_w_tit write_div">
            <label for="wr_1" class="sound_only">기간<strong>필수</strong></label>
            <input type="text" name="wr_1" value="<?php echo $write['wr_1']; ?>" readonly id="wr_1" required class="frm_input required" size="8" maxlength="8" placeholder="시작일">
            <?php if ($is_time_use) {?>
            <select name="wr_5_1" id="wr_5_1">
                <?php
                for ($z=0; $z<=23; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_5_1 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            <select name="wr_5_2" id="wr_5_2">
                <?php
                for ($z=0; $z<=59; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_5_2 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            <?php } ?>
            ~
            <input type="text" name="wr_2" value="<?php echo $write['wr_2']; ?>" readonly id="wr_2" required class="frm_input required" size="8" maxlength="8" placeholder="종료일">
            <?php if ($is_time_use) {?>
            <select name="wr_6_1" id="wr_6_1">
                <?php
                for ($z=0; $z<=23; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_6_1 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            <select name="wr_6_2" id="wr_6_2">
                <?php
                for ($z=0; $z<=59; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_6_2 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            <?php } ?>
        </div>

        <div class="bo_w_tit write_div">
            <label for="wr_3" class="sound_only">표시색상</label>
            <ul class="clr-list">
            <?php
            if ($cnt_color) {
                foreach ($arr_color as $k => $v) {
                    ?>
                    <li><a href="#none" class="btn-color <?php echo ($v['wrr_color_bg'] == $write['wr_4'] ? 'active' : '');?>" data-bg="<?php echo $v['wrr_color_bg'];?>" data-tx="<?php echo $v['wrr_color_tx'];?>" style="background-color:<?php echo $v['wrr_color_bg'];?>;color:<?php echo $v['wrr_color_tx'];?>;"><?php echo ($v['wrr_color_bg'] == $write['wr_4'] ? '사용' : '선택');?></a></li>
                    <?php
                }
            }
            ?>
            </ul>
            <input type="hidden" name="wr_3" id="wr_3" value="<?php echo $write['wr_3']; ?>"/>
            <input type="hidden" name="wr_4" id="wr_4" value="<?php echo $write['wr_4']; ?>"/>
        </div>

        <div class="write_div">
            <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
            <?php } ?>
            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <div id="char_count_wrap"><span id="char_count"></span>글자</div>
            <?php } ?>
        </div>

        <?php
        for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) {
            if ($i > 1) break;
        ?>
        <div class="bo_w_link write_div">
            <label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i> <span class="sound_only">링크 #<?php echo $i ?></span></label>
            <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo $write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input wr_link">
        </div>
        <?php } ?>

        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <div class="bo_w_flie write_div">
            <div class="file_wr write_div">
                <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="fa fa-download" aria-hidden="true"></i><span class="sound_only">파일 #<?php echo $i+1 ?></span></label>
                <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
            </div>
            <?php if ($is_file_content) { ?>
            <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
            <?php } ?>

            <?php if($w == 'u' && $file[$i]['file']) { ?>
            <span class="file_del">
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
            </span>
            <?php } ?>

        </div>
        <?php } ?>

        <?php if ($is_use_captcha) { //자동등록방지 ?>
        <div class="write_div">
            <span class="sound_only">자동등록방지</span>
            <?php echo $captcha_html ?>

        </div>
        <?php } ?>

    </div>

    <div class="btn_top top write_div">
        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
        <input type="submit" value="작성완료" id="btn_submit" class="btn_submit" accesskey="s">
    </div>
    </form>
</section>

<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
    $("#wr_content").on("keyup", function() {
        check_byte("wr_content", "char_count");
    });
});

<?php } ?>
function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f)
{
    <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: g5_bbs_url+"/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        if (typeof(ed_wr_content) != "undefined")
            ed_wr_content.returnFalse();
        else
            f.wr_content.focus();
        return false;
    }

    if (document.getElementById("char_count")) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(check_byte("wr_content", "char_count"));
            if (char_min > 0 && char_min > cnt) {
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            }
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }

    <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

$(function() {
    $("#wr_1, #wr_2").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yymmdd", showButtonPanel: true });
    $(document).on('click', '.btn-color', function() {
        $('.btn-color').text('선택').css('font-weight', 'normal').removeClass('active');
        $(this).text('사용').css('font-weight', 'bold').addClass('active');
        var color_bg = $(this).attr('data-bg');
        var color_tx = $(this).attr('data-tx');
        $('#wr_3').val(color_tx);
        $('#wr_4').val(color_bg);
    });
});
</script>
