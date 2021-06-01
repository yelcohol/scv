<?php if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 ?>

<!-- 댓글 쓰기 시작 { -->
<aside id="bo_vc_w" class="bo_vc_w">
    <h2>댓글쓰기</h2>
    <form name="fviewcomment" id="fviewcomment" action="<?php echo $list['comment_action_url']; ?>" onsubmit="return fviewcomment_submit(this);" method="post" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>" id="w">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="comment_id" value="<?php echo $c_id ?>" id="comment_id">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="is_good" value="">

	<div class="bo_vc_w_info">
        <?php echo $list['guest_input']; // 비회원인 경우 입력해야할 input field ?>
        <?php echo $captcha_html // 구글 리캡챠 html 출력 ?>
        <?php echo $list['cmt_send_sns']; // sns 동시 등록 ?>
    </div>

    <span class="sound_only">내용</span>
    <?php echo $list['char_cnt']; // 최소/최대 글자수 사용 시 글자 수 표시 ?>
    <textarea id="wr_content" name="wr_content" maxlength="10000" required class="required" title="내용" placeholder="댓글내용을 입력해주세요" <?php echo $list['cmt_onkeyup']; // 최소/최대 글자수 사용 시 key up 이벤트 ?>><?php echo $list[$i]['c_wr_content']; ?></textarea>
    <?php echo $list['check_byte_js']; // 입력 글 byte check 하는 js ?>

    <script>
    $(document).on("keyup change", "textarea#wr_content[maxlength]", function() {
        var sdiv = $(this).val()
        var mx = parseInt($(this).attr("maxlength"))
        if (sdiv.length > mx) {
            $(this).val(sdiv.subsdiv(0, mx));
            return false;
        }
    });
    </script>

    <div class="bo_vc_w_wr">
        <div class="btn_confirm">
        	<label for="wr_secret" class="wr_secret_ck">비밀글</label>
            <input type="checkbox" name="wr_secret" value="secret" id="wr_secret">
            <button type="submit" id="btn_submit" class="btn_submit" value="댓글등록">댓글등록</button>
            <script>
                $(document).on("click", "#wr_secret", function() {
                    $(".wr_secret_ck").toggleClass("click_on");
                });
            </script>
        </div>
    </div>
    </form>
</aside>

<script>
var use_sns = "<?php echo $list['use_sns']; ?>";

if(use_sns) {
    $(function() {
        // sns 등록
        $("#bo_vc_send_sns").load(
            "<?php echo G5_SNS_URL; ?>/view_comment_write.sns.skin.php?bo_table=<?php echo $bo_table; ?>",
            function() {
                save_html = document.getElementById('bo_vc_w').innerHTML;
            }
        );
    });
}
</script>
<!-- } 댓글 쓰기 끝 -->
