<?php
# ######################################################################
#  GWD WP Web App version 0.1
# #######################################################################
?>
<?php echo get_the_post_thumbnail_url(get_the_id()); ?>
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

				<?php

			the_content();
		 }


				?>
		</main><!-- .site-main -->




		<?php // ADD BLOG POST SECTION w/ LIMIT OF THREE POSTS ?>


		<section>
		<?php
		$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		);

		$blogposts = new WP_Query($args);
		while($blogposts->have_posts()){
			$blogposts->the_post();
?>

			<figure class="card">
				<h3><a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				</a>
			</h3>

			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_the_post_thumbnail_url(get_the_id()); ?>" />
				</a>
				<figcaption><?php echo wp_trim_words(get_the_excerpt(), 30) ?></figcaption>
			</figure>

		<?php } wp_reset_query(); ?>


		</section>


	</div><!-- .content-area -->

<?php get_footer(); ?>
