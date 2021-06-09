<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>
<!-- mobile side gnb 시작 { -->
<div id="m_gnb_all" class="hd_div bg">
	<button type="button" id="m_gnb_close" class="hd_closer"><span class="sound_only">메뉴닫기</span><i class="fa fa-times" aria-hidden="true"></i></button>
	<div class="m_gnb_side">
        <h2>전체메뉴</h2>
	    <ul class="gnb_1dul">
	    <?php
	    $sql = " select *
	                from {$g5['menu_table']}
	                where me_mobile_use = '1'
	                  and length(me_code) = '2'
	                order by me_order, me_id ";
	    $result = sql_query($sql, false);

	    for($i=0; $row=sql_fetch_array($result); $i++) {
	    ?>
	        <li class="gnb_1dli">
	            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
	            <?php
	            $sql2 = " select *
	                        from {$g5['menu_table']}
	                        where me_mobile_use = '1'
	                          and length(me_code) = '4'
	                          and substring(me_code, 1, 2) = '{$row['me_code']}'
	                        order by me_order, me_id ";
	            $result2 = sql_query($sql2);

	            for ($k=0; $row2=sql_fetch_array($result2); $k++) {
	                if($k == 0)
	                    echo '<button class="btn_gnb_op">하위분류</button><ul class="gnb_2dul">'.PHP_EOL;
	            ?>
	                <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><span></span><?php echo $row2['me_name'] ?></a></li>
	            <?php
	            }

	            if($k > 0)
	                echo '</ul>'.PHP_EOL;
	            ?>
	        </li>
	    <?php
	    }

	    if ($i == 0) {  ?>
	        <li id="m_gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하세요.<?php } ?></li>
	    <?php } ?>
	    </ul>

	    <div id="text_size">
        	<h2>글자 크기 조절</h2>
		    <!-- font_resize('엘리먼트id', '제거할 class', '추가할 class'); -->
		    <button id="size_down" onclick="font_resize('html_wrap', 'ts_down2 ts_down1 ts_def ts_up1 ts_up2', ts_control('prev'), this);">작게</button>
		    <button id="size_def" onclick="font_resize('html_wrap', 'ts_down2 ts_down1 ts_def ts_up1 ts_up2', 'ts_def', this);" class="select">기본</button>
		    <button id="size_up" onclick="font_resize('html_wrap', 'ts_down2 ts_down1 ts_def ts_up1 ts_up2', ts_control('next'), this);">더크게</button>
		</div>
    </div>
</div>
<!-- } mobile gnb 끝 -->

<script>
$(function(){
    $(".gnb_menu_btn").click(function(){
        $("#m_gnb_all").show();
    });
});


var ts_array = ['ts_down2', 'ts_down1', 'ts_def', 'ts_up1', 'ts_up2'];

// 폰트 사이즈 조절
function ts_control(mode)
{
    var font_resize_class = get_cookie("ck_font_resize_add_class");
    var current_ts_idx = ts_array.indexOf(font_resize_class);

    if(mode == 'prev') {
        return current_ts_idx > 0 ? ts_array[current_ts_idx-1] : ts_array[0];
    } else {
        return current_ts_idx < ts_array.length-1 ? ts_array[current_ts_idx+1] : ts_array[ts_array.length-1];
    }
}

$(function ($) {
	//폰트 사이즈 조절 상태 표시
    var font_resize_class = get_cookie("ck_font_resize_add_class");
	$("#text_size button").removeClass('ft_status');
    if(font_resize_class == ts_array[0] || font_resize_class == ts_array[1]) {
        $("#text_size button").first().addClass('ft_status');
    } else if (font_resize_class == ts_array[2]) {
        $("#text_size button").eq(1).addClass('ft_status');
    } else {
        $("#text_size button").last().addClass('ft_status');
	}

    // 폰트 사이즈 조절 버튼 클릭
    $("#text_size button").on('click', function(e) {
        var font_resize_class = get_cookie("ck_font_resize_add_class");
        $("#text_size button").removeClass('ft_status');
        if(font_resize_class == ts_array[0] || font_resize_class == ts_array[1]) {
            $("#text_size button").first().addClass('ft_status');
        } else if (font_resize_class == ts_array[2]) {
            $("#text_size button").eq(1).addClass('ft_status');
        } else {
			$("#text_size button").last().addClass('ft_status');
		}
    });
});
</script>
