
<?php

wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', [], null);
wp_enqueue_style('main', get_template_directory_uri().'/css/main.min.css', ['bootstrap'], null);

wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.min.js', [], '', true);
wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.min.js', ['jquery'], '', true);
wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', ['jquery', 'popper'], '', true);
wp_enqueue_script('main', get_template_directory_uri().'/main.min.js', ['jquery', 'poper', 'bootstrap'], '', true);

add_theme_support('title-tag');

/*add_filter('style_loader_tag', 'filter_preload_css_header', 10, 4);
function filter_preload_css_header($html, $handle)
{
    //if ('my-style-handle' === $handle) {
        return str_replace("rel='stylesheet'", "rel='preload' as='style'", $html);
    //}

    return $html;
}*/
