<?php
if ($member['mb_id']) {
    // 근로자면
    if ($member['mb_10'] === 'worker')
        $is_worker = true;

    // 건설사면
    else if ($member['mb_10'] === 'constructor')
        $is_constructor = true;
}
?>