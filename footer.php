	<?php
	$display_options = get_option('t_theme_display_options');
	$social_options = get_option('t_theme_social_options');
	if(isset($display_options['show_footer'])){?>
	<footer class="footer">
		<div class="container">
			<?php if(isset($display_options['footer_text'])){ ?>
				<p>&copy; <?php echo $display_options['footer_text']?></p>
			<?php } ?>
			<ul class="footer-menu">
				<?php if(isset($social_options['fb'])){ ?>
					<li><a href="<?php echo $social_options['fb'] ?>"><i class="fa fa-facebook"></i></a></li>
				<?php }?>
				<?php if(isset($social_options['twitter'])){ ?>
					<li><a href="<?php echo $social_options['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
				<?php }?>
				<?php if(isset($social_options['ig'])){ ?>
					<li><a href="<?php echo $social_options['ig'] ?>"><i class="fa fa-instagram"></i></a></li>
				<?php }?>
			</ul>
		</div>
	</footer>
	<?php } ?>
	<?php wp_footer() ?>
</body>
</html>