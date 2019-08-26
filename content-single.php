<?php if ( has_post_thumbnail() ) {
	the_post_thumbnail('singleimg');
} ?>
				
<h1 class="mtitle"><?php the_title(); ?></h1>
<span class="post-meta-details">
	Posted by 
	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="post-author"><?php the_author(); ?></a>
	 at 
	 <a href="" class="post-time"><?php the_date(); ?></a>
</span>
<span>| Categories: <?php
        $categories = get_the_category();
        $comma      = ', ';
        $output     = '';
        
        if ( $categories ) {
          foreach ( $categories as $category ) {
            $output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
          }
          echo trim( $output, $comma );
        } ?>
</span>
<span> | 
	<?php the_tags( 'Tagged with: ', ',', '<br />' ); ?>
</span>
<p class="mdescription">
	<?php the_content(); ?>
</p>