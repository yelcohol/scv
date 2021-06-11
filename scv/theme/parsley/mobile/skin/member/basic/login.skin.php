<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div id="mb_login" class="mbskin">
	<h1><?php echo $g5['title'] ?></h1>
	<div class="mbskin_inner">
	    	
	    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post" id="flogin">
	    <input type="hidden" name="url" value="<?php echo $login_url ?>">
	
	    <fieldset id="login_fs">
	    	<legend>회원로그인</legend>
		    <div class="login_btn_inner">
	        	<label for="login_id" class="sound_only">아이디<strong class="sound_only"> 필수</strong></label>
	       		<input type="text" name="mb_id" id="login_id" placeholder="아이디(필수)" required class="frm_input required" maxLength="20">
	        	<label for="login_pw" class="sound_only">비밀번호<strong class="sound_only"> 필수</strong></label>
	        	<input type="password" name="mb_password" id="login_pw" placeholder="비밀번호(필수)" required class="frm_input required" maxLength="20">
	        </div>        
	        <span class="login_auto">
		        <label for="login_auto_login" id="login_auto_lb"><span class="agree_ck"></span>자동로그인</label>
		        <input type="checkbox" name="auto_login" id="login_auto_login">
	        </span>
	        <button type="submit" value="로그인" class="btn_submit">로그인</button>
		</fieldset>
		
		<?php
	    // 소셜로그인 사용시 소셜로그인 버튼
	    @include_once(get_social_skin_path().'/social_login.skin.php');
	    ?>
		
		<aside id="login_info">
	        <h2>회원로그인 안내</h2>
	        <span>
	        	<a href="./register.php">회원 가입</a>
	        	<a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">정보찾기</a>
			</span>
	    </aside>

	    </form>
	</div>
</div>

<script>
$(function(){
    $("#login_auto_login").on('click', function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?")) {
                $(".agree_ck").removeClass("click_on");
                return false;
            }
        }
    });

    $("#login_auto_lb").click(function(){
        $(".agree_ck").toggleClass("click_on");
    });
});

function flogin_submit(f)
{
    return true;
}
</script>
<!-- } 로그인 끝 -->
