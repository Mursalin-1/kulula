	<footer class="footer">
		<div class="container">
			<?php if(!empty(get_theme_mod('t_theme_facebook'))){ ?>
				<p><?php echo get_theme_mod('t_theme_footer_text') ?></p>
			<?php }?>
			<ul class="footer-menu">
				<?php if(!empty(get_theme_mod('t_theme_twitter'))){ ?>
					<li><a href="<?php echo get_theme_mod('t_theme_twitter') ?>"><i class="fa fa-twitter"></i></a></li>
				<?php }?>
				<?php if(!empty(get_theme_mod('t_theme_facebook'))){ ?>
					<li><a href="<?php echo get_theme_mod('t_theme_facebook') ?>"><i class="fa fa-facebook"></i></a></li>
				<?php }?>
				<?php if(!empty(get_theme_mod('t_theme_instagram'))){ ?>
					<li><a href="<?php echo get_theme_mod('t_theme_instagram') ?>"><i class="fa fa-instagram"></i></a></li>
				<?php }?>
			</ul>
		</div>
	</footer>
	<?php wp_footer() ?>
</body>
</html>