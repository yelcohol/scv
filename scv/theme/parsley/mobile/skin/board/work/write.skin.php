<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php'); // 달력 
//include_once(G5_PLUGIN_PATH.'/wz.schedule.board/config.php');

// $arr_color = array();
// $query = "select * from {$g5['board_schedule_color_table']} where wrc_id = '".$wscb['wrc_id']."' order by wrr_id asc";
// $res = sql_query($query);
// while($row = sql_fetch_array($res)) {
//     $arr_color[] = $row;
// }
// $cnt_color = count($arr_color);
// if ($res) sql_free_result($res);

$is_time_use = false;
$wr_7_1 = $wr_7_2 = '00'; // 시작시간
$wr_8_1 = $wr_8_2 = '00'; // 종료시간
if ($wscb['wrc_display_types']) {
    $arr_display_types = unserialize($wscb['wrc_display_types']);
    if (in_array('timeGridWeek', $arr_display_types) || in_array('timeGridDay', $arr_display_types)) {
        $is_time_use = true;
        list($wr_7_1, $wr_7_2) = explode(':', $write['wr_7']);
        list($wr_8_1, $wr_8_2) = explode(':', $write['wr_8']);
    }
}
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
	<input type="hidden" name="ca_name_before" value="<?php echo $write['ca_name'] ?>">
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
        			<input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input required" maxlength="25" placeholder="제목">
		    	</div>
		    </li>
		    <!-- <li class="bo_w_option">
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
		    </li> -->
			<li>
			<div class="wli_tit">담당자 정보</div>
			<div class="write_div">
        		<label for="wr_1" class="sound_only">회사명</label>
        		<input class="frm_input full_input required" type="text" name="wr_1" value="<?=$write['wr_1']?>" id="wr_1" maxlength="20" placeholder="업체 이름">
    		</div>
    		<div class="write_div">
        		<label for="wr_2" class="sound_only">담당자명</label>
        		<input class="frm_input full_input required" type="text" name="wr_2" value="<?=$write['wr_2']?>" id="wr_2" maxlength="10" placeholder="담당자 이름">
    		</div>
    		<div class="write_div">
        		<label for="wr_3" class="sound_only">담당자 연락처</label>
        		<input class="frm_input full_input required" type="tel" name="wr_3" value="<?=$write['wr_3']?>" id="wr_3" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13" placeholder="담당자 연락처">
    		</div>
			</li>
			<li>
			<div class="wli_tit" style="font-size:1.2em;border-top: 1px solid #e4e5e7; padding-top:10px;">작업 날짜 및 시각</div>
			<div class="write_div clock">
            <input type="text" name="wr_6" value="<?php echo $write['wr_6']; ?>" readonly id="wr_6" required class="frm_input required" size="8" maxlength="8">
            
            <select name="wr_7_1" id="wr_7_1">
                <?php
                for ($z=0; $z<=23; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_7_1 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            <select name="wr_7_2" id="wr_7_2">
                <?php
                for ($z=0; $z<=59; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_7_2 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            ~
            <input type="text" name="wr_16" value="<?php echo $write['wr_16']; ?>" readonly id="wr_16" required class="frm_input required" size="8" maxlength="8">
            
            <select name="wr_8_1" id="wr_8_1">
                <?php
                for ($z=0; $z<=23; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_8_1 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            <select name="wr_8_2" id="wr_8_2">
                <?php
                for ($z=0; $z<=59; $z++) {
                    $str = sprintf('%02d', $z);
                    $selected = ($wr_8_2 == $str ? 'selected=selected' : '');
                    echo '<option value="'.$str.'" '.$selected.'>'.$str.'</option>'.PHP_EOL;
                }
                ?>
            </select>
            </div>
			</li>
			<li>
			<!-- 지원한 인원은 wr_4 -->
			<div class="write_div">
				<label for="wr_5" class="sound_only">모집 인원</label>
				<input class="frm_input thirty_input required" type="number" name="wr_5" value="<?=$write['wr_5']?>" id="wr_5" placeholder="모집 인원" required>
			</div>
			</li>


			<li>
			<div class="wli_tit" style="font-size:1.2em;border-top: 1px solid #e4e5e7; padding-top:10px;">모집 직종</div>
			<div class="write_div">
	
			<ul>	
				<li>
					<label><b>조공</b></label><br>
					<div style="display:flex;flex-wrap: wrap;">
					<span><input type="checkbox" name="wr_9[]" value="일반공(잡부)"<?php if(strpos($write['wr_9'], "일반공(잡부)")!==false) echo ' checked';?>> 일반공(잡부)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="조력공(조공)"<?php if(strpos($write['wr_9'], "조력공(조공)")!==false) echo ' checked';?>> 조력공(조공)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="청소"<?php if(strpos($write['wr_9'], "청소")!==false) echo ' checked';?>> 청소&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="비계(아시바)"<?php if(strpos($write['wr_9'], "비계(아시바)")!==false) echo ' checked';?>> 비계(아시바)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="철거(해체)"<?php if(strpos($write['wr_9'], "철거(해체)")!==false) echo ' checked';?>> 철거(해체)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="할석공(하스리)"<?php if(strpos($write['wr_9'], "할석공(하스리)")!==false) echo ' checked';?>> 할석공(하스리)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="운반공(곰방)"<?php if(strpos($write['wr_9'], "운반공(곰방)")!==false) echo ' checked';?>> 운반공(곰방)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="기타(조공)"<?php if(strpos($write['wr_9'], "기타(조공)")!==false) echo ' checked';?>> 기타(조공)&nbsp;&nbsp;</span>
					</div>
				</li>
				<li>
					<label><b>기공</b></label><br>
					<div style="display:flex;flex-wrap: wrap;">
					<span><input type="checkbox" name="wr_9[]" value="목수(목공)"<?php if(strpos($write['wr_9'], "목수(목공)")!==false) echo ' checked';?>> 목수(목공)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="용접공"<?php if(strpos($write['wr_9'], "용접공")!==false) echo ' checked';?>> 용접공&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="설비"<?php if(strpos($write['wr_9'], "설비")!==false) echo ' checked';?>> 설비&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="조경"<?php if(strpos($write['wr_9'], "조경")!==false) echo ' checked';?>> 조경&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="미장공"<?php if(strpos($write['wr_9'], "미장공")!==false) echo ' checked';?>> 미장공&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="타일공"<?php if(strpos($write['wr_9'], "타일공")!==false) echo ' checked';?>> 타일공&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="석재"<?php if(strpos($write['wr_9'], "석재")!==false) echo ' checked';?>> 석제&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="조적공(쓰미)"<?php if(strpos($write['wr_9'], "조적공(쓰미)")!==false) echo ' checked';?>> 조적공(쓰미)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="콘크리트공(타설)"<?php if(strpos($write['wr_9'], "콘크리트공(타설)")!==false) echo ' checked';?>> 콘크리트공(타설)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="방수"<?php if(strpos($write['wr_9'], "방수")!==false) echo ' checked';?>> 방수&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="철근공"<?php if(strpos($write['wr_9'], "철근공")!==false) echo ' checked';?>> 철근공&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="전기"<?php if(strpos($write['wr_9'], "전기")!==false) echo ' checked';?>> 전기&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="로프공"<?php if(strpos($write['wr_9'], "로프공")!==false) echo ' checked';?>>로프공&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="기타(기공)"<?php if(strpos($write['wr_9'], "기타(기공)")!==false) echo ' checked';?>> 기타(기공)&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="도장공(페인트공)"<?php if(strpos($write['wr_9'], "도장공(페인트공)")!==false) echo ' checked';?>> 도장공(페인트공)&nbsp;&nbsp;</span>
					</div>
				</li>
				<li>
					<label><b>파출</b></label><br>
					<div style="display:flex;flex-wrap: wrap;">
					<span><input type="checkbox" name="wr_9[]" value="가사"<?php if(strpos($write['wr_9'], "가사")!==false) echo ' checked';?>> 가사&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="육아"<?php if(strpos($write['wr_9'], "육아")!==false) echo ' checked';?>> 육아&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="산후조리"<?php if(strpos($write['wr_9'], "산후조리")!==false) echo ' checked';?>> 산후조리&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="청소"<?php if(strpos($write['wr_9'], "청소")!==false) echo ' checked';?>> 청소&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="식당"<?php if(strpos($write['wr_9'], "식당")!==false) echo ' checked';?>> 식당&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="간병"<?php if(strpos($write['wr_9'], "간병")!==false) echo ' checked';?>> 간병&nbsp;&nbsp;</span>
					</div>
				</li>
				<li>
					<label><b>기타</b></label><br>
					<div style="display:flex;flex-wrap: wrap;">
					<span><input type="checkbox" name="wr_9[]" value="제조, 생산"<?php if(strpos($write['wr_9'], "제조, 생산")!==false) echo ' checked';?>> 제조/생산&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="물류"<?php if(strpos($write['wr_9'], "물류")!==false) echo ' checked';?>> 물류&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="경비"<?php if(strpos($write['wr_9'], "경비")!==false) echo ' checked';?>> 경비&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="운전"<?php if(strpos($write['wr_9'], "운전")!==false) echo ' checked';?>> 운전&nbsp;&nbsp;</span>
					<span><input type="checkbox" name="wr_9[]" value="기타"<?php if(strpos($write['wr_9'], "기타")!==false) echo ' checked';?>> 기타&nbsp;&nbsp;</span>
					</div>
				</li>
			</ul>
			</div>
			</li>
			<li>
			<div class="write_div">
				<label for="wr_10" class="sound_only">일당</label>
				<input class="frm_input thirty_input required" type="number" name="wr_10" value="<?=$write['wr_10']?>" id="wr_10" max="999999999" placeholder="일당" required>
			
				<label for="wr_15" class="sound_only">준비물</label>
				<input class="frm_input thirty_input" type="text" name="wr_15" value="<?=$write['wr_15']?>" id="wr_15" placeholder="준비물">
			
				<label for="wr_17" class="sound_only">복리후생</label>
				<input class="frm_input thirty_input" type="text" name="wr_17" value="<?=$write['wr_17']?>" id="wr_17" placeholder="복리후생">
			</div>
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

			<!-- 일자리 주소 입력  -->

			<li>
				<label>근무지</label>
				<?php if ($config['cf_req_addr']) { ?><strong class="sound_only">필수</strong><?php }  ?>
				<label for="reg_wr_zip" class="sound_only">우편번호<strong class="sound_only"> 필수</strong></label>
				<input type="text" name="wr_11" id="reg_wr_zip" <?php echo "required" ?> style="width:80px;" class="frm_input twopart_input <?php echo "required" ?>" size="5" maxlength="6"  placeholder="우편번호" value="<?=$write['wr_11']?>" onclick="win_zip('fwrite', 'wr_11', 'wr_12', 'wr_13', 'wr_14', 'wr_addr_jibeon');">
				<button type="button" class="btn_frmline" onclick="win_zip('fwrite', 'wr_11', 'wr_12', 'wr_13', 'wr_14', 'wr_addr_jibeon');">주소 검색</button><br>
				<input type="text" name="wr_12" id="reg_wr_addr1" class="frm_input frm_address full_input" size="50"  placeholder="기본주소" value="<?=$write['wr_12']?>">
				<label for="reg_wr_addr1" class="sound_only">기본주소<strong> 필수</strong></label><br>
				<input type="text" name="wr_13" id="reg_wr_addr2" class="frm_input frm_address full_input" size="50" placeholder="상세주소" value="<?=$write['wr_13']?>">
				<label for="reg_wr_addr2" class="sound_only">상세주소</label>
				<br>
				<input type="text" name="wr_14" id="reg_wr_addr3" class="frm_input frm_address full_input" size="50" readonly="readonly" placeholder="참고항목" value="<?=$write['wr_14']?>">
				<label for="reg_wr_addr3" class="sound_only">참고항목</label>
				<input type="hidden" name="wr_addr_jibeon" value="<?php //echo get_text($member['mb_addr_jibeon']); ?>">
			</li>

	        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
	        <li class="bo_w_link">
	        	<div class="wli_tit">링크 #<?=$i?></div>
	        	<div class="wli_cnt">
	            	<label for="wr_link<?php echo $i ?>"><span class="sound_only">링크 #<?php echo $i ?></span></label>
	            	<input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo $write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input wr_link" placeholder="링크를 입력해주세요.">
	        	</div>
	        </li>
	        <?php } ?>

	        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
	        <li class="bo_w_flie write_div">
	        	<div class="wli_tit">파일첨부 #<?=$i+1?></div>
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

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    // <!-- 달력 시작-->
    // $(function(){
    //     $(".datepicker").datepicker({
    //         dateFormat: "yy-mm-dd",
    //         onSelect:function(dateText, inst) {
    //             console.log(dateText);
    //             console.log(inst);
    //         }
    //     });
    //     $(".targetFocus").click(function(){
    //         $($(this).data("target")).focus();
    //     });
    // });
    // <!-- 달력 끝 -->
    $(function(){ // 날짜 입력
		$("#wr_6, #wr_16").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yymmdd", showButtonPanel: true });

        $(document).on('click', '.btn-color', function() {
            $('.btn-color').text('선택').css('font-weight', 'normal').removeClass('active');
            $(this).text('사용').css('font-weight', 'bold').addClass('active');
            var color_bg = $(this).attr('data-bg');
            var color_tx = $(this).attr('data-tx');
            $('#wr_17').val(color_tx);
            $('#wr_18').val(color_bg);
        });
	});
</script>
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

//휴대번호 하이픈(-)
function autoHypenTel(str) {
  str = str.replace(/[^0-9]/g, '');
  var tmp = '';

  if (str.substring(0, 2) == 02) {
    // 서울 전화번호일 경우 10자리까지만 나타나고 그 이상의 자리수는 자동삭제
    if (str.length < 3) {
      return str;
    } else if (str.length < 6) {
      tmp += str.substr(0, 2);
      tmp += '-';
      tmp += str.substr(2);
      return tmp;
    } else if (str.length < 10) {
      tmp += str.substr(0, 2);
      tmp += '-';
      tmp += str.substr(2, 3);
      tmp += '-';
      tmp += str.substr(5);
      return tmp;
    } else {
      tmp += str.substr(0, 2);
      tmp += '-';
      tmp += str.substr(2, 4);
      tmp += '-';
      tmp += str.substr(6, 4);
      return tmp;
    }
  } else {
    // 핸드폰 및 다른 지역 전화번호 일 경우
    if (str.length < 4) {
      return str;
    } else if (str.length < 7) {
      tmp += str.substr(0, 3);
      tmp += '-';
      tmp += str.substr(3);
      return tmp;
    } else if (str.length < 11) {
      tmp += str.substr(0, 3);
      tmp += '-';
      tmp += str.substr(3, 3);
      tmp += '-';
      tmp += str.substr(6);
      return tmp;
    } else {
      tmp += str.substr(0, 3);
      tmp += '-';
      tmp += str.substr(3, 4);
      tmp += '-';
      tmp += str.substr(7);
      return tmp;
    }
  }

  return str;
}
$('#wr_3').keyup(function (event) {
  event = event || window.event;
  var _val = this.value.trim();
  this.value = autoHypenTel(_val);
});
</script>
