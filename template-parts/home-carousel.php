<?php

defined('ABSPATH') or die();

// Show slider..
$recent_posts = wp_get_recent_posts([
    'numberposts' => 10,
    'offset' => 0,
    'category' => 0,
    'orderby' => 'post_modified',
    'order' => 'DESC',
    'include' => '',
    'exclude' => '',
    'meta_key' => '',
    'meta_value' => '',
    'post_type' => ['post', 'page'],
    'post_status' => 'publish', //'draft, publish, future, pending, private',
    'suppress_filters' => true,
]);
//var_dump($recent_posts);
?>
<div id="carouselHome" class="carousel carousel-home slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $first = true;
        $counter = 0;
        foreach ($recent_posts as $recent_post) {
            ?>
            <li data-target="#carouselHome" data-slide-to="<?= $counter; ?>"<?= $first ? ' class="active"' : ''; ?>></li>
            <?php
            $first = false;
            ++$counter;
        }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        $first = true;
        foreach ($recent_posts as $recent_post) {
            ?>

            <div 
            class="carousel-item carousel-item-home<?= $first ? ' active' : ''; ?>" 
            data-url="<?= home_url($recent_post['post_name']).'/'; ?>">
                <img src="<?= get_the_post_thumbnail_url($recent_post['ID']); ?>" 
                class="d-block w-100"
                alt="<?= $recent_post['post_title']; ?>">
                <div class="carousel-caption">
                    <h5><a href="<?= home_url($recent_post['post_name']).'/'; ?>"><?= $recent_post['post_title']; ?></a></h5>
                </div>
            </div>

            <?php
            $first = false;
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
