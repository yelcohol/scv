<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

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
            $option .= PHP_EOL.'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice" class="notice_ck">공지</label>';
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
                $option .= PHP_EOL.'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret" class="secret_ck">비밀글</label>';
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
    
    <div class="form_inpt">
    	<h2 class="sound_only"><?php echo $g5['title'] ?></h2>
		
		<ul class="bo_w_info">
		    <?php if ($is_category) { ?>
		    <li>
		        <div class="wli_tit"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></div>
		        <div class="wli_cnt">
			        <select id="ca_name" name="ca_name" required class="full_input">
			            <option value="">선택하세요</option>
			            <?php echo $category_option ?>
			        </select>
		        </div>
		    </li>
		    <?php } ?>
		    <?php if (!$is_member) {  ?>
		    <li class="wli_left">
		    	<div class="wli_tit">이름</div>
		    	<?php if ($is_name) { ?>
		    	<div class="wli_cnt">
	            	<label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
	            	<input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input full_input required" maxlength="20" placeholder="이름">
	        	</div>
	        	<?php } ?>	
		    </li>
		    <li class="wli_left">
		    	<div class="wli_tit">비밀번호</div>
			    <?php if ($is_password) { ?>
			    	<div class="wli_cnt">
	            		<label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
	            		<input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input full_input <?php echo $password_required ?>" maxlength="20" placeholder="비밀번호">
	        		</div>
	        	<?php } ?>
        	</li>
        	<li class="wli_left">
        		<div class="wli_tit">이메일</div>
				<?php if ($is_email) { ?>
				<div class="wli_cnt">	
					<label for="wr_email" class="sound_only">이메일</label>
					<input type="email" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input full_input email" maxlength="100" placeholder="이메일">
				</div>
				<?php } ?>
        	</li>
        	<li class="wli_left">
        		<?php if ($is_homepage) { ?>
        		<div class="wli_tit">홈페이지</div>
		        <div class="wli_cnt">
		            <label for="wr_homepage" class="sound_only">홈페이지</label>
		            <input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input full_input" placeholder="홈페이지">
		        </div>
		        <?php } ?>	
        	</li>
		    <?php } ?>
		    <li class="bo_w_tit">
		    	<div class="wli_tit">제목</div>
		    	<div class="wli_cnt">
		    		<label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
        			<input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input required" placeholder="제목">
		    	</div>
		    </li>
		    <li class="bo_w_option">
		    	<?php if ($option) { ?>
		    	<div class="wli_tit"><span class="sound_only">글쓰기 옵션</span></div>
		        <div class="wli_cnt">
		            <span class="sound_only">옵션</span>
		            <?php echo $option ?>
		        </div>
		        <?php } ?>
		        <script>
				$(document).ready(function(){
				    $("#notice").click(function(){
				        $(".notice_ck").toggleClass("click_on");
				    });
				
				    $("#mail").click(function(){
				        $(".mail_ck").toggleClass("click_off");
				    });

				    $("#secret").click(function(){
				        $(".secret_ck").toggleClass("click_on");
				    });
				
				    $("input[type='checkbox']").each(function(){
				        var name = $(this).attr('name');
				        if($(this).prop("checked")) {
				            $(this).siblings("label[for='"+name+"']").addClass("click_on");
				        }
				    });
				});
		        </script>
		    </li>
	        <li>
	        	<div class="wli_tit"><span class="sound_only">내용</span></div>
	        	<div class="wli_cnt">
	            <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
	            	<?php if($write_min || $write_max) { ?>
		            <!-- 최소/최대 글자 수 사용 시 -->
		            <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
		            <?php } ?>
		            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
		            <?php if($write_min || $write_max) { ?>
		            <!-- 최소/최대 글자 수 사용 시 -->
		            <div id="char_count_wrap"><span id="char_count"></span>글자</div>
	            </div>
	            <?php } ?>
	        </li>
	        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
	        <li class="bo_w_link">
	        	<div class="wli_tit">링크</div>
	        	<div class="wli_cnt">
	            	<label for="wr_link<?php echo $i ?>"><span class="sound_only">링크 #<?php echo $i ?></span></label>
	            	<input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo $write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input wr_link" placeholder="링크를 입력해주세요.">
	        	</div>
	        </li>
	        <?php } ?>

	        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
	        <li class="bo_w_flie write_div">
	        	<div class="wli_tit">파일첨부</div>
	            <div class="file_wr wli_cnt">
	                <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><span class="sound_only">파일 #<?php echo $i+1 ?></span></label>
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
	        </li>
	        <?php } ?>
	    </ul>

        <?php if ($is_use_captcha) { //자동등록방지 ?>
        <div class="wli_cnt wli_captcha">
            <span class="sound_only">자동등록방지</span>
            <?php echo $captcha_html ?>
        </div>
        <?php } ?>
	</div>
	
	<div class="bo_w_btn">
        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
        <button type="submit" id="btn_submit" class="btn_submit" accesskey="s">작성완료</button>
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
        if (result) {
            obj.value = "html2";
        } else {
            obj.value = "html1";
        }

        $("label[for='html']").addClass('click_on');
    } else {
        obj.value = "";
        $("label[for='html']").removeClass('click_on');
    }
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
</script>
