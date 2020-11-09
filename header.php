<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php // START PWA THINGS ?>
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="<?= get_template_directory_uri() ?>/pwa/icon-96x96.png">
    <meta name="apple-mobile-web-app-status-bar" content="#639">
    <meta name="theme-color" content="#639">
    <?php // END PWA THINGS ?>
    <?php
    if (is_user_logged_in()) {
        ?>
        <style>
            body {margin-top: 32px;}
            @media (max-width: 782px) { body {margin-top: 46px;} }
        </style>
        <?php
    }
    ?>
    <?php wp_head(); ?>
    <?php //START GOOGLE ANALYTICS -->
    if(!current_user_can('editor')
    and !current_user_can('administrator')
    and !preg_match('/127.0.0.1/', $_SERVER['REMOTE_ADDR'])) { ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-28718385-11"></script>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-28718385-11', 'jnjsite.com', {
        'storage': 'none',
        'anonymizeIp': true,
        'clientId': window.localStorage.getItem('googleAnalyticsClientId')
        });
        ga(function(tracker) {
        window.localStorage.setItem('googleAnalyticsClientId', tracker.get('clientId'));
        });
        ga('send', 'pageview');
        </script>
    <?php } //<!-- END GOOGLE ANALYTICS ?>
</head>
<body <?php body_class('container-fluid'); ?>>

<?php
wp_body_open();
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="/">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if (has_custom_logo()) {
                echo '<img src="'.esc_url($logo[0]).'" alt="'.get_bloginfo('name').' - '.get_bloginfo('description').'" class="main-logo-img">';
            } else {
                echo get_bloginfo('name');
            }
            ?>
            JnjSite.com
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-menu-id" aria-controls="header-menu-id" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
        wp_nav_menu([
            // DEFAULT -->
            //'menu' => '',
            //'container' => 'ul',
            //'container_class' => '',
            //'container_id' => '',
            //'container_aria_label' => '',
            //'menu_class' => 'navbar-nav mr-auto',
            //'menu_id' => '',
            //'echo' => true,
            //'fallback_cb' => 'wp_page_menu',
            //'before' => '',
            //'after' => '',
            //'link_before' => '',
            //'link_after' => '',
            //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            //'item_spacing' => 'preserve',
            //'depth' => 0,
            //'walker' => '',
            //<-- END DEFAULT
            'theme_location' => 'header-menu',
            'depth' => 7,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'header-menu-id',
            'menu_class' => 'navbar-nav mr-auto',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker(),
        ]);
        ?>
        <form class="form-inline form-navbar-search" action="/" method="get">
            <input class="form-control" type="search" placeholder="Buscar" aria-label="Search" name="s" value="<?= $_GET['s']; ?>">
            <button class="btn btn-outline-success btn-navbar-search" type="submit">Buscar</button>
        </form>
    </nav>