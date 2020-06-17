<?php
# ######################################################################
#  GWD WP Web App version 0.1
#  Single Post template page
#  See: https://developer.wordpress.org/themes/basics/template-hierarchy/
# #######################################################################
?>

<?php get_header(); ?>


<?php
while(have_posts()){
  the_post();
  ?>

  <h2><?php the_title(); ?></h2>

  <b>Posted by <?php the_author(); ?></b>

  <img src="<?php echo get_the_post_thumbnail_url(get_the_id()); ?>" />
  <?php // get the featured image ?>

  <?php
  the_content();
  comment_form();
}
?>
<?php get_footer(); ?>
