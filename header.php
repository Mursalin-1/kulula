<?php
	$background_options = get_option('t_theme_background_options');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title('| ', true, 'right'); ?></title>
	<?php wp_head() ?>
	<style type="text/css">
		
		header.site-header,ul.primary-menu, ul.sub-menu,header .container>i{	
			background: <?php echo $background_options['header_background'] ?>;
		} 
		footer.footer{
			background: <?php echo $background_options['footer_background'] ?>;
		}
		header li, header a {
		    color: <?php echo $background_options['header_text_color'] ?>;
		    font-weight: 600;
		}
		footer, footer i {
		    color: <?php echo $background_options['footer_text_color'] ?>;
		}
		ul.primary-menu li:hover {
			background:  <?php echo $background_options['menu_hover_background'] ?>;
		}
	</style>
</head>
<body <?php body_class(); ?> >


	<div class="pager">
		<?php
		$display_options = get_option('t_theme_display_options');
		if(isset($display_options['show_header'])){?>
			<header class="site-header">
				<div class="container">
					<a class="site-title" href="<?php echo esc_url(home_url()) ?>"><?php echo bloginfo( 'name' ); ?></a>
					<i class="fa fa-bars"></i>
					<div class="site-header-menu">
						<nav class="primary-menu">
						<?php $args = [ 
	 						'theme_location' => 'primary',
	 						'menu_class' => 'primary-menu'
	 					 ]; ?>
						<?php wp_nav_menu( $args ) ?>					
						</nav>
					</div>
				</div>
			</header>
		<?php }	?>
	</div>
	<div class="container">
		<img class="img" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="100%" alt="" />
 	</div>
	<div class="header">
		<div class="container">
			<div class="blog-header">
				<h1 class="page-title"><?php echo get_bloginfo('name') ?></h1>
				<span class="breadcumb">
					<?php if(is_front_page() || is_home()){ ?>
						<a href="<?php echo esc_url(home_url()) ?>"><i class="fa fa-home"></i></a>/
					<?php }else{ ?>
						<a href="<?php echo esc_url(home_url()) ?>"><i class="fa fa-home"></i></a>/
						<a href="<?php echo esc_url(the_permalink()) ?>"><?php the_title(); ?></a>
					<?php } ?>
				</span>
			</div>
		</div>
	</div>
