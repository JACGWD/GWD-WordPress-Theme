<?php
# ######################################################################
#  GWD WP Web App version 0.1
# #######################################################################
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<?php
				while(have_posts()){the_post();
				?>
<h2>
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</h2>
<?php the_excerpt(); ?>

				<?php }


				?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
