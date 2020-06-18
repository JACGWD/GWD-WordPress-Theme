<?php
# ######################################################################
#  GWD WP Web App version 0.1
# #######################################################################
?>

<?php get_header(); ?>
<p>page.php page template</p>

<?php
while(have_posts()){
  the_post();
  ?>

  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  <b>Posted by <?php the_author(); ?></b>

  <img src="<?php echo get_the_post_thumbnail_url(get_the_id()); ?>" />
  <?php // get the featured image ?>

  <?php
  the_content();
}
?>
<?php get_footer(); ?>
