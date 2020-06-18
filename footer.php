<?php
# ######################################################################
#  GWD WP Web App version 0.1
# #######################################################################
?>

<footer>
  <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-nav' ) ); ?>

  
  <?php wp_nav_menu( array( 'theme_location' => 'social-menu', 'container_class' => 'social-nav' ) ); ?>

<p>All images and web site content &copy;  2017-<?php echo date("Y"); ?>. All rights reserved for published and unpublished works.</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
