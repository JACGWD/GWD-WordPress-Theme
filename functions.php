<?php
# ######################################################################
#  GWD WP Web App version 0.1
# #######################################################################
?>


<?php
// DISABLE THE FULL SCREEN EDITOR BY DEFAULT, IF YOU FIND IT ANNOYING
// JUST COPY/PASTE THIS SECTION. NO EDITS REQUIRED.
if (is_admin()) {
    function disable_editor_fullscreen_by_default() {
    $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
    wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'disable_editor_fullscreen_by_default' );
}
?>


<?php
// THIS SECTION ADDS CSS AND JAVASCRIPT FILES TO THE HEADER AND FOOTER

function gwd_setup(){

// ADD GOOGLE FONTS
wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Maven+Pro:regular,medium,semi-bold,bold|Open+Sans&display=swap');

// ADD DEFAULT RESET STYLESHEETS
// If targeting the style.css immediately inside the theme folder, use get_stylesheet_uri()
// If using a CSS subfolder, use get_template_directory_uri()

wp_enqueue_style('modern', get_template_directory_uri()."/css/modern-css-reset.css", NULL, microtime(), 'all');
// wp_enqueue_style('normalize', get_template_directory_uri()."/css/normalize.css", NULL, microtime(), 'all');
// wp_enqueue_style('simple', get_template_directory_uri()."/css/simple-css-reset.css", NULL, microtime(), 'all');


// ADD DEFAULT CSS STYLESHEET: STYLE.CSS
wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
// Purpose of parameters in order:
// name of the stylesheet (in the theme root folder only)
// destination of the stylesheet
// dependencies of the CSS file
// version number of the stylesheet, set to "microtime" during development to avoid manually chnaging the number
// media types


// ADD MODERNIZR FOR CSS FEATURE DETECTION
// SEE https://modernizr.com/
wp_enqueue_script("modernizr", get_theme_file_uri("/js/modernizr-jacgwd.min.js"), NULL, microtime(), false);


// JQUERY
// wp_enqueue_script("jquery", get_theme_file_uri("/js/jquery-3.4.1.min.js"), NULL, microtime(), true);
// Wordpress Core already has JQuery


// ADD JQUERY PLUGINS CODE AND ALL CUSTOM JAVASCRIPT
wp_enqueue_script("plugins", get_theme_file_uri("/js/plugins.js"), NULL, microtime(), true);
wp_enqueue_script("combined-scripts", get_theme_file_uri("/js/combined-scripts.js"), NULL, microtime(), true);
// Purpose of parameters in order:
// name of the script file
// source path
// dependencies
// version
// in footer (true) or not (false) option
}


// RUNS THE SETUP FUNCTION
add_action('wp_enqueue_scripts', 'gwd_setup');




// ADD FEATURES TO THE THEME
function gwd_init(){

add_theme_support('post-thumbnails');
// Enable featured images and post thumbnails

add_theme_support('title-tag');
// Adds a custom <title> tag in the <head>

add_theme_support('html5',
array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption')
// Forces WP to use semantic HTML 5 tags such as <figure> and <figcaption>
);
}

// ADDS THESE FEATURES TO WP
add_action('after_setup_theme', 'gwd_init');



// CUSTOM POST TYPE: "PROJECTS" POST TYPE
// SEE: https://developer.wordpress.org/themes/template-files-section/custom-post-type-template-files/

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
// ADDS THE CUSTOM POST TYPE TO WP
add_action('init', 'gwd_custom_post_type');



?>
