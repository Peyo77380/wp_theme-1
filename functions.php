<?php


require_once( 'widgets/class-wp-widget-articles-showcase.php' );

function larrabesk_setup() {

    // post formats
    add_theme_support( 'post-formats' , array (
        'gallerie',
        'blogpost',
        'page'
    ));
    
    // featured images supports
    add_theme_support( 'post-thumbnails' );

    // thumbnails size
    set_post_thumbnail_size( 900, 600);

    // menus
    register_nav_menus( array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
    ) );


}

add_action( 'after_setup_theme', 'larrabesk_setup');


// sidebar and widgets
function init_widgets () {
    
        register_sidebar( array (
            'name' => __('Sidebar'),
            'id' => 'sidebar',
            'description' => __('Sidebar'),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class=”widget-title”>',
            'after_title' => '</h3>',
            ) 
        );
        
        register_sidebar( array (
            'name' => __('Article Showcase'),
            'id' => 'article_showcase',
            'description' => __('Display latest post with a slider'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class=”widget-title”>',
            'after_title' => '</h3>',
            ) 
        );
         
}
    
    
add_action( 'widgets_init', 'init_widgets' );


function add_custom_widgets () {
    register_widget( 'WP_Widget_Articles_Showcase' );
}
add_action( 'widgets_init', 'add_custom_widgets' );

// set custom excerpt length

function set_excerpt_length () {
    return 20;
};

add_filter( 'excerpt_length', 'set_excerpt_length');

