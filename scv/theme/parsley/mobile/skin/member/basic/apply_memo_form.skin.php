<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 쪽지 보내기 시작 { -->
<div id="memo_write" class="new_win">
    <h1 id="win_title">공고 지원하기</h1>
    <div class="new_win_con2">
        <!-- <ul class="win_ul">
            <li><a href="./memo.php?kind=recv">받은쪽지</a></li>
            <li><a href="./memo.php?kind=send">보낸쪽지</a></li>
            <li class="selected"><a href="./memo_form.php">쪽지쓰기</a></li>
        </ul> -->

        <form name="fmemoform" action="<?php echo $memo_action_url; ?>" onsubmit="return fmemoform_submit(this);" method="post" autocomplete="off">
        <div class="form_01">
            <h2 class="sound_only">지원하기</h2>
            <ul>
                <li>
                    <label for="me_recv_mb_id" class="sound_only">받는 회원아이디<strong>필수</strong></label>
                    <input type="hidden" name="bo_table" value="works">
                    <input type="hidden" name="wr_id" value=<?php echo $wr_id ?>>
                    <input type="hidden" name="val" value=<?php echo $val ?>>
                    <?php if($ma_id != -1) { ?>
                        <input type="hidden" name="ma_id" value=<?php echo $ma_id?>>
                    <?php } ?>
                    <input type="hidden" name="me_recv_mb_id" value="<?php echo $me_recv_mb_id; ?>" id="me_recv_mb_id" required class="frm_input full_input required" size="47" placeholder="받는 회원아이디">
                    <span class="frm_info"><?php
                    if($val == 2){ //노동자 회원 지원 메시지
                        echo "공고 담당자에게 보낼 말을 입력해주세요.";
                    }
                    else if($val == 1){ //건설사 회원 지원자에게 합격 메시지
                        echo "합격 지원자에게 보낼 말을 입력해주세요.";
                    }else{ //건설하 회원 지원자에게 불합격 메시지
                        echo "불합격한 지원자에게 보낼 말을 입력해주세요.";
                    }
                    ?>
                    </span>
                </li>
                <li>
                    <label for="me_memo" class="sound_only">내용</label>
                    <textarea name="me_memo" id="me_memo" required class="required"><?php
                        if($val == 2){ //노동자 회원 지원 메시지
                            echo "[지원] 공고보고 지원합니다. 잘부탁드립니다.";
                        }
                        else if($val == 1){ //건설사 회원 지원자에게 합격 메시지
                            echo "[합격] 본 공고에 지원해주셔서 감사합니다. 공고 내용 잘 숙지하시고 공고 날짜 시간에 뵙겠습니다!";
                        }else{ //건설하 회원 지원자에게 불합격 메시지
                            echo "[불합격] 본 공고에 지원해주셔서 감사합니다. 아쉽게도 이번 공고에 맞지 않게 되서 반려하게 됬습니다. 다음에도 많은 지원 부탁드리겠습니다.";
                        }
                    ?></textarea>
                </li>
                <li>
                    <span class="sound_only">자동등록방지</span>
                    
                    <?php echo captcha_html(); ?>
                    
                </li>
            </ul>
        </div>

        <div class="win_btn">
        	<button type="submit" id="btn_submit" class="btn btn_b02 reply_btn"><?php 
            if($val == 2){ //노동자 회원 지원 메시지
                echo "지원 메시지 보내기";
            }
            else if($val == 1){ //건설사 회원 지원자에게 합격 메시지
                echo "합격 메시지 보내기";
            }else{ //건설하 회원 지원자에게 불합격 메시지
                echo "불합격 메시지 보내기";
            }
            ?></button>
        	<button type="button" onclick="window.close();" class="btn_close">돌아가기</button>
        </div>
    </div>
    </form>
</div>

<script>
function fmemoform_submit(f)
{
    <?php echo chk_captcha_js();  ?>

    return true;
}
</script>
<!-- } 쪽지 보내기 끝 -->