<div class="main-body">
	<div class="bitem">
		<a href="<?php esc_url(the_permalink()) ?>" alt="<?php the_title_attribute(); ?>">
	        <?php the_post_thumbnail('blog-thumb'); ?>
	    </a>
		<h2 class="btitle">
			<a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a>
		</h2>
		<span>
			Posted at <a href="#" class="post-time"><?php echo get_the_date(); ?></a> <br> <br>
		</span>
		<button onclick="window.location='<?php esc_url(the_permalink()) ?>';"> <?php _e('Read More ','kulula') ?></button> <br><br>
		
		
	</div>
</div>