<?php

if (has_post_thumbnail() && !post_password_required()) {
    //var_dump(get_the_post_thumbnail());
    ?>
    <figure class="featured-image-figure">
        <img src="<?= get_the_post_thumbnail_url() ?>" 
        class="img-fluid w-100"
        alt="<?= the_title() ?>">
        <?php
        //the_post_thumbnail();
        $caption = get_the_post_thumbnail_caption();
        if ($caption) {
            ?>
            <figcaption class="featured-image-caption"><?php echo wp_kses_post($caption); ?></figcaption>
            <?php
        } ?>

    </figure>
    <?php
}