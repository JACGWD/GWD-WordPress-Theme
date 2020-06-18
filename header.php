<?php
/* ######################################################################
*  GWD WP Web App version 0.1
* #######################################################################
*/
?>
<!doctype html>
<html class="no-js">

<head>
<meta charset="utf-8">

<link rel="manifest" href="/site.webmanifest">
<link rel="apple-touch-icon" href="/icon.png">
<!-- Place favicon.ico in the root directory -->


<meta name="robots" content="noodp, noydir" />

<meta property="author" content="<?php the_author_meta( 'display_name', 1 ); ?>">

<?php wp_head(); ?>
<?php // LOADS THE DEFAULT WP HEAD SECTION ?>

</head>

<body>

<!--[if IE]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->


<header>
<p class="headerTitle"><?php the_author_meta( 'display_name', 1 ); ?></p>
<p class="headerSubtitle">Montreal-based graphic &amp; UI/UX Designer</p>
</header>

<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'primary-nav' ) ); ?>
