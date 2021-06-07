<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원 유형 선택 (근로자 or 건설사) { -->
<div class="register">

    <form name="fregister" id="fregister" action="<?php echo $register_action_url ?>" method="POST" autocomplete="off">
         
        <input type="radio" name="reg_type" value="worker" id="worker"> 근로자
        <input type="radio" name="reg_type" value="constructor" id="constructor"> 건설사

    <div class="btn_confirm">
    	<a href="<?php echo G5_URL ?>" class="btn_cancel">취소</a>
        <button type="submit" class="btn_submit">회원가입</button>
    </div>
    </form>
</div>
<!-- } 회원가입 약관 동의 끝 -->
