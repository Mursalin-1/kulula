<?php 
function t_theme_register_theme_customizer($wp_customize){
	$wp_customize->add_setting(
		't_theme_header_background',
		array(
			'default'=>'#000'
		)
	);
	$wp_customize->add_setting(
		't_theme_footer_background',
		array(
			'default'=>'#000'
		)
	);
	$wp_customize->add_setting(
		't_theme_header_text_color',
		array(
			'default'=>'#fff'
		)
	);
	$wp_customize->add_setting(
		't_theme_footer_text_color',
		array(
			'default'=>'#fff'
		)
	);
	$wp_customize->add_setting(
		't_theme_menu_hover_background',
		array(
			'default'=>'#e3e3e3'
		)
	);
	$wp_customize->add_setting(
		't_theme_button_background',
		array(
			'default'=>'#e3e3e3'
		)
	);
	$wp_customize->add_setting(
		't_theme_button_text_color',
		array(
			'default'=>'#000'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background',
			array(
				'label'=> __('Header Background Color', 'kulula'),
				'section'=> 'colors',
				'settings'=>'t_theme_header_background'
			)
		)

	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_background',
			array(
				'label'=> __('Footer Background Color', 'kulula'),
				'section'=> 'colors',
				'settings'=>'t_theme_footer_background'
			)
		)

	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_text_color',
			array(
				'label'=> __('Header and Menu Text Color', 'kulula'),
				'section'=> 'colors',
				'settings'=>'t_theme_header_text_color'
			)
		)

	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
				'label'=> __('Footer Text Color', 'kulula'),
				'section'=> 'colors',
				'settings'=>'t_theme_footer_text_color'
			)
		)

	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'menu_hover_background',
			array(
				'label'=> __('Menu Hover Background', 'kulula'),
				'section'=> 'colors',
				'settings'=>'t_theme_menu_hover_background'
			)
		)

	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'button_background',
			array(
				'label'=> __('Button Background Color', 'kulula'),
				'section'=> 'colors',
				'settings'=>'t_theme_button_background'
			)
		)

	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'button_text_color',
			array(
				'label'=> __('Button Text Color', 't_theme'),
				'section'=> 'colors',
				'settings'=>'t_theme_button_text_color'
			)
		)

	);

	$wp_customize->add_section(
		't_theme_display_options',
		array(
			'title'=>'Display Options',
			'priority'=> 200
		)
	);
	$wp_customize-> add_setting(
		't_theme_display_header',
		array(
			'default'=> 'true'
		)
	);
	$wp_customize-> add_setting(
		't_theme_display_footer',
		array(
			'default'=> 'true'
		)
	);
	$wp_customize-> add_setting(
		't_theme_footer_text',
		array(
			'default'=> '&copy;'
		)
	);
	$wp_customize->add_control(
		't_theme_display_header',
		array(
			'section'=> 't_theme_display_options',
			'label'=>'Display Header?',
			'type'=> 'checkbox'
		)
	);
	$wp_customize->add_control(
		't_theme_display_footer',
		array(
			'section'=> 't_theme_display_options',
			'label'=>'Display Footer?',
			'type'=> 'checkbox'
		)
	);
	$wp_customize->add_control(
		't_theme_footer_text',
		array(
			'section'=> 't_theme_display_options',
			'label'=>'Add footer text',
			'type'=> 'text'
		)
	);

	$wp_customize->add_section(
		't_theme_social_options',
		array(
			'title'=>'Social Options',
			'priority'=> 200
		)
	);
	$wp_customize->add_setting(
		't_theme_twitter',
		array(
			'default'=> 'http://twitter.com'
		)
	);
	$wp_customize->add_setting(
		't_theme_facebook',
		array(
			'default'=> 'http://facebook.com'
		)
	);
	$wp_customize->add_setting(
		't_theme_instagram',
		array(
			'default'=> 'http://Instagram.com'
		)
	);
	$wp_customize->add_control(
		't_theme_twitter',
		array(
			'section'=>'t_theme_social_options',
			'label'	=> 'Twitter',
			'type'=> 'text'
		)
	);
	$wp_customize->add_control(
		't_theme_facebook',
		array(
			'section'=>'t_theme_social_options',
			'label'	=> 'Facebook',
			'type'=> 'text'
		)
	);
	$wp_customize->add_control(
		't_theme_instagram',
		array(
			'section'=>'t_theme_social_options',
			'label'	=> 'Instagram',
			'type'=> 'text'
		)
	);

}
add_action('customize_register', 't_theme_register_theme_customizer');

function t_theme_customizer_css() {
    ?>
    <style type="text/css">

    	<?php if( false === get_theme_mod( 't_theme_display_header' ) ) { ?>
		    header { display: none; }
		<?php } // end if ?>

    	<?php if( false === get_theme_mod( 't_theme_display_footer' ) ) { ?>
		    footer { display: none; }
		<?php } // end if ?>

		header.site-header,ul.primary-menu, ul.sub-menu,header .container>i{	
			background-color: <?php echo get_theme_mod('t_theme_header_background'); ?>;
		} 
		header li, header a {
		    color: <?php echo get_theme_mod('t_theme_header_text_color') ?>;
		}
		ul.primary-menu li:hover {
			background:  <?php echo get_theme_mod('t_theme_menu_hover_background') ?>;
		}
        footer.footer { background-color: <?php echo get_theme_mod( 't_theme_footer_background' ); ?>; }

        footer, footer i {
		    color: <?php echo get_theme_mod( 't_theme_footer_text_color' ); ?>;
		}
		input[type=submit], button{
			background:<?php echo get_theme_mod( 't_theme_button_background' ); ?>;
		}
		input[type=submit], button{
			color:<?php echo get_theme_mod( 't_theme_button_text_color' ); ?>;
		}

    </style>

    <?php
}
add_action( 'wp_head', 't_theme_customizer_css' );




