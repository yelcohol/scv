<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<div class="gnb1 gnb_menu swiper-container" id="swipe_gnb_menu">
    <ul class="gnb_1dul swiper-wrapper">
        <?php
        $sql = " select *
                    from {$g5['menu_table']}
                    where me_use = '1'
                      and length(me_code) = '2'
                    order by me_order, me_id ";
        $result = sql_query($sql, false);
        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
        $menu_datas = array();

        for ($i=0; $row=sql_fetch_array($result); $i++) {
            $menu_datas[$i] = $row;

            $sql2 = " select *
                        from {$g5['menu_table']}
                        where me_use = '1'
                          and length(me_code) = '4'
                          and substring(me_code, 1, 2) = '{$row['me_code']}'
                        order by me_order, me_id ";
            $result2 = sql_query
            ($sql2);
            for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                $menu_datas[$i]['sub'][$k] = $row2;
            }

        }

        $i = 0;
        foreach( $menu_datas as $row ){
            if( empty($row) ) continue;
        ?>
        <li class="gnb_1dli" style="z-index:<?php echo $gnb_zindex--; ?>">
            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
        </li>
        <?php
        $i++;
        }   //end foreach $row

        if ($i == 0) {  ?>
            <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
        <?php } ?>
    </ul>
</div>
