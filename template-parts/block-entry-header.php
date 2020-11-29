<header class="entry-header">
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
                    <?php the_date('Y-m-d'); ?> - Categorías: <?php the_category(' / '); ?>
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

        if (has_excerpt() && is_singular()) {
            ?>
            <div class="intro-text section-inner max-percentage<?php echo $intro_text_width; ?>">
                <?php the_excerpt(); ?>
            </div>
            <?php
        }
        ?>
    </div>
</header>
