<section id="bo_v_rel">
	<h2>연관질문</h2>
    <ul>
    <?php
        for($i=0; $i<$view['rel_count']; $i++) {
        ?>
        <li>
            <div class="li_title">
            	<a href="<?php echo $rel_list[$i]['view_href']; ?>" class="li_sbj">
					<span class="li_stat <?php echo $rel_list[$i]['qa_status_class'] ?>"><?php echo $rel_list[$i]['qa_status_subject'] ?></span> 
                    <strong><?php echo get_text($rel_list[$i]['category']); ?></strong>
                    <?php echo $rel_list[$i]['subject']; ?>
                    <span class="li_date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $rel_list[$i]['date'] ?></span>
                </a>
            </div>
        </li>
        <?php
        }
        ?>
    </ul>
</section>
