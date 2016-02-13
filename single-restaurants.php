<?php
get_header();
?>
<div class="col span_1_of_12"></div>
<div id="primary" class="content-area col span_10_of_12">
	<div id="content" class="site-content" role="main">
		<?php
		// Start the Loop.
		while (have_posts()) : the_post();
			//load content of restaurant
			get_template_part('template-parts/content', get_post_type());
			//Action to add fields
			do_action('rt_restaurants_add_fields');
			
			// Previous/next post navigation.
			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) {
				comments_template();
			}
		endwhile;
		?>
	</div><!-- #content -->
</div><!-- #primary -->

<?php
get_sidebar('content');
get_sidebar();
get_footer();
