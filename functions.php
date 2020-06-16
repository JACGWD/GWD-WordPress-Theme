<?php
# ######################################################################
#  GWD WP Web App version 0.1
# #######################################################################
?>


<?php
// This file adds CSS and Javascript files to the header and footer

function gwd_setup(){

// Add Google Fonts
wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Maven+Pro:regular,medium,semi-bold,bold|Open+Sans&display=swap');

// Add default stylesheet
wp_enqueue_style('modern', get_stylesheet_uri()."/css/modern-css-reset.css", NULL, microtime(), 'all');
// wp_enqueue_style('normalize', get_stylesheet_uri()."/css/normalize.css", NULL, microtime(), 'all');
// wp_enqueue_style('simple', get_stylesheet_uri()."/css/simple-css-reset.css", NULL, microtime(), 'all');
wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
// Purpose of parameters in order:
// name of the stylesheet (in the theme root folder only)
// destination of the stylesheet
// dependencies of the CSS file
// version number of the stylesheet, set to "microtime" during development to avoid manually chnaging the number
// media types

wp_enqueue_script("modernizr", get_theme_file_uri("/js/modernizr-jacgwd.min.js"), NULL, microtime(), false);
wp_enqueue_script("jquery", get_theme_file_uri("/js/jquery-3.4.1.min.js"), NULL, microtime(), true);
wp_enqueue_script("plugins", get_theme_file_uri("/js/plugins.js"), NULL, microtime(), true);
wp_enqueue_script("combined-scripts", get_theme_file_uri("/js/combined-scripts.js"), NULL, microtime(), true);
// Purpose of parameters in order:
// name of the script file
// source path
// dependencies
// version
// in footer (true) or not (false) option
}

add_action('wp_enqueue_scripts', 'gwd_setup');
// Runs the setup function


// Add Features to the Theme

function gwd_init(){

add_theme_support('post-thumbnails');
// Enable featured images and post thumbnails

add_theme_support('title-tag');
// Adds a custom <title> tag in the <head>

add_theme_support('html5',
array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption')
// Forces WP to use semantic HTML5 such as <figure> and <figcaption>
);
}

add_action('after_setup_theme', 'gwd_init');



// Projects post type

function gwd_custom_post_type(){
  register_post_type('project',
array(
  'rewrite' => array('slug' => 'projects'),
  'labels' => array(
    'name' => 'Projects',
    'singular_name' => 'Project',
    'add_new_item' => 'Add New Project',
    'edit_item' => 'Edit Project'
  ),
  'menu-icon' => 'dashicons-clipboard',
  'public' => true,
  'has_archive' => true,
  'supports' => array(
    'title', 'thumbnail', 'editor', 'excerpt', 'comments'
  )
)
);
}

add_action('init', 'gwd_custom_post_type');



?>
