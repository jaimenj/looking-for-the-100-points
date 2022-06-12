<?php

defined('ABSPATH') or die();

?><header class="entry-header">
    <div class="entry-header-inner section-inner medium">
        <?php

        if (is_singular()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title heading-size-1"><a href="'.esc_url(get_permalink()).'">', '</a></h2>');
        }

        if ('post' == get_post_type()) {
            ?>
            <div class="entry-extra-info mb-2">
                <div class="entry-extra-info-inner">
                    <?php 
                    echo substr(get_post()->post_date, 0, 10);
                    ?> - Categorías: <?php the_category(' / '); ?>
                </div>
            </div>
            <?php
        }

        $intro_text_width = '';
        if (is_singular()) {
            $intro_text_width = ' small';
        } else {
            $intro_text_width = ' thin';
        }
        ?>
    </div>
</header>
