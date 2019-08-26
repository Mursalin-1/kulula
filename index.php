<?php get_header(); ?>
	<div class="main-body">
		<div class="container">
			<div class="primary">
				<div class="blog-body">
					<?php
						if(have_posts()):
							while(have_posts()):the_post();
								
								get_template_part('content', get_post_format());

							endwhile;
							?>

							<ul class="pagination">
								<li><?php next_posts_link( 'Previous' ); ?></li>
								<li><?php previous_posts_link( 'Next' ); ?></li>
							</ul>

						<?php 
						else: 
							_e('There are no posts','kulula');
						endif;
					?>
				</div>
			</div>
			<?php get_sidebar() ?>
		</div>
	</div>
<?php
get_footer();
?> 