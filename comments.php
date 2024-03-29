<?php if ( post_password_required() ) {
	return;
} ?>
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
			<h3 class="comments-title">
		<?php
		printf( _nx( 'One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title', 'kulula'),
			number_format_i18n( get_comments_number() ), get_the_title() );
		?>
			</h3>
			<ul class="comment-list">
				<?php
				wp_list_comments( array(
					'short_ping'  => true,
					'avatar_size' => 50,
				) );
				?>
			</ul>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments">
					<?php _e('Comments are closed.', 'kulula') ; ?>
			</p>
		<?php endif; ?>
		<ul class="pagination justify-content-center mb-4">

	      <li class="page-item disabled">
	        <?php next_comments_link( 'Newer Comments &rarr;' ); ?>
	      </li>
	      <li class="page-item">
	        <?php previous_comments_link( '&larr; Older Comments' ,array(
	          'class'=>'page-link'
	        )); ?>
	      </li>
	    </ul>
		<?php comment_form(); ?>
	</div>