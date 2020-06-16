<?php
// This file adds CSS and Javascript files to the header and footer

function gwd_setup(){
// Add Google Fonts
wp_enqueue_style('google-fonts', 'fonts.googleapis.com/css?family=Maven+Pro:regular,medium,semi-bold,bold|Open+Sans&display=swap');

wp_enqueue_style('style', get_stylesheet_directory_uri(), NULL, microtime(), all);
// Purpose of parameters in order: 
// name of the stylesheet (in the theme root folder only)
// destination of the stylesheet
// dependencies of the CSS file 
// version number of the stylesheet, set to "microtime" during development to avoid manually chnaging the number
// media types

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

?>

