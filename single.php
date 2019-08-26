<?php get_header(); ?>
	<div class="main-body">
		<div class="container">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if(have_posts()) : while(have_posts()) : the_post(); 
			
				get_template_part('content-single', get_post_format() );

				if(comments_open()):
					comments_template();
				endif;
			
			endwhile; endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>