<?php
function my_theme_enqueue_styles() {
    $parent_style = 'site-css';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


add_action('wp_enqueue_scripts','child_add_javascripts',20); //This will execute the child_add_javascripts callback after the st_header_scripts callback
function child_add_javascripts(){
    wp_enqueue_script('smoothscroll',get_bloginfo('stylesheet_directory') ."/assets/smoothscroll.js",array('jquery'),'1.2.3',true); //This looks in the CHLID theme's directory while template_url looks in the parent theme's directory
}


function homepage_register_sidebars() {
    register_sidebar(array(
        'id' => 'homepage-left-3rd',
        'name' => __('Homepage Left Third Column', 'jointswp'),
        'description' => __('The left third column on the homepage. Appears above Left/Right 2', 'jointswp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'homepage-middle-3rd',
        'name' => __('Homepage Middle Third Column', 'jointswp'),
        'description' => __('The middle third column on the homepage. Appears above Left/Right 2', 'jointswp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));


    register_sidebar(array(
        'id' => 'homepage-right-3rd',
        'name' => __('Homepage Right Third Column', 'jointswp'),
        'description' => __('The right third column on the homepage. Appears above Left/Right 2', 'jointswp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', 'homepage_register_sidebars' );