<?php get_header(); ?>
	<div class="main-body">
		<div class="container">
			<div class="">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
				<a href="<?php esc_url(the_permalink()) ?>" alt="<?php the_title_attribute(); ?>">
			        <?php the_post_thumbnail('blog-thumb'); ?>
			    </a>
				
				<h1 class="mtitle"><?php the_title(); ?></h1>
				<span class="post-meta-details">
					Posted by 
					<a href="" class="post-author"><?php the_author(); ?></a>
					 at 
					 <a href="#" class="post-time"><?php the_date(); ?></a>
				</span>
				<p class="mdescription">
					<?php the_content(); ?>
				</p>

				<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>
			<?php endwhile; endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>