<?php

function t_theme_menu(){
	add_theme_page(
		'Theme Options',
		'Theme Options',
		'administrator',
		't_theme_options',
		't_theme_display'
	);
}
add_action('admin_menu', 't_theme_menu');

function t_theme_display(){
?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">
 
        <!-- Add the icon to the page -->
        <div id="icon-themes" class="icon32"></div>
        <h2>Theme Options</h2>
 
        <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
        <?php settings_errors(); ?>
        <?php
        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = $_GET[ 'tab' ];
        } // end if
        ?>
         <h2 class="nav-tab-wrapper">
            <a href="?page=t_theme_options&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Display Options</a>
            <a href="?page=t_theme_options&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Options</a>
            <a href="?page=t_theme_options&tab=background_options" class="nav-tab <?php echo $active_tab == 'background_options' ? 'nav-tab-active' : ''; ?>">background Options</a>
        </h2>
         
 
        <!-- Create the form that will be used to render our options -->
        <form method="post" action="options.php">
        <?php

            if($active_tab == 'display_options'){

                settings_fields( 't_theme_display_options' ); 
                do_settings_sections( 't_theme_display_options' );     
            }elseif($active_tab == 'social_options'){
                settings_fields('t_theme_social_options');    
                do_settings_sections('t_theme_social_options');    

            }else{
                settings_fields('t_theme_background_options');    
                do_settings_sections('t_theme_background_options');    

            }

		   submit_button(); 
        ?>
		</form>
 
    </div><!-- /.wrap -->
<?php
}

function t_theme_display_defaults(){
    $defaults = array(
        'show_header'=> '',
        'show_footer'=> '',
        'footer_text'=> ''
    );
    return apply_filters('t_theme_display_defaults',$defaults);
}
function t_theme_social_defaults(){
    $defaults = array(
        'twitter'=> 'http://www.twitter.com/YOURID',
        'fb'=> 'http://www.facebook.com/YOURID',
        'ig'=> 'http://www.Instagram.com/YOURID'
    );
    return apply_filters('t_theme_social_defaults',$defaults);
}
function t_theme_background_defaults(){
    $defaults = array(
        'header_background'=> '#000',
        'footer_background'=> '#000',
        'header_text_color'=> '#fff',
        'footer_text_color'=> '#fff',
        'menu_hover_background'=> '#eee'
    );
    return apply_filters('t_theme_background_defaults',$defaults);
}

function sandbox_initialize_theme_options(){

	if( false == get_option( 't_theme_display_options' ) ) {  
	    add_option( 't_theme_display_options', apply_filters('t_theme_display_defaults','t_theme_display_defaults') );
	} // end if

	add_settings_section(
        'general_settings_section',         // ID used to identify this section and with which to register options
        'Display Options',                  // Title to be displayed on the administration page
        'general_options_callback', // Callback used to render the description of the section
        't_theme_display_options'                           // Page on which to add this section of options
    );
    add_settings_field( 
        'show_header',                      // ID used to identify the field throughout the theme
        'Header',                           // The label to the left of the option interface element
        'toggle_header_callback',   // The name of the function responsible for rendering the option interface
        't_theme_display_options',                          // The page on which this option will be displayed
        'general_settings_section',         // The name of the section to which this field belongs
        array(                              // The array of arguments to pass to the callback. In this case, just a description.
            'Activate this setting to display the header.'
        )
    );
     
    add_settings_field( 
        'show_footer',                      
        'Footer',               
        'toggle_footer_callback',   
        't_theme_display_options',                          
        'general_settings_section',         
        array(                              
            'Activate this setting to display the footer.'
        )
    );

    add_settings_field( 
        'footer_text',                      
        'Footer Text',               
        'footer_text_callback',   
        't_theme_display_options',                          
        'general_settings_section',         
        array(                              
            'Activate this setting to display the footer.'
        )
    );

    register_setting(
        't_theme_display_options',
        't_theme_display_options'
    );
}
add_action('admin_init','sandbox_initialize_theme_options');
function general_options_callback(){
	echo '<p>Select which areas of content you wish to display.</p>';
}
function toggle_header_callback($args) {
     
    $options = get_option('t_theme_display_options');
 
    $html = '<input type="checkbox" id="show_header" name="t_theme_display_options[show_header]" value="1" ' . checked(1, isset($options['show_header'])?$options['show_header']:1, false) . '/>'; 
    $html .= '<label for="show_header"> '  . $args[0] . '</label>'; 
 
    echo $html;
     
} 
function toggle_footer_callback($args) {
     
    $options = get_option('t_theme_display_options');
 
    $html = '<input type="checkbox" id="show_footer" name="t_theme_display_options[show_footer]" value="1" ' . checked(1, isset($options['show_footer'])?$options['show_footer']:1, false) . '/>'; 
    $html .= '<label for="show_footer"> '  . $args[0] . '</label>'; 
 
    echo $html;
 
     
}
function footer_text_callback(){
    $options = get_option('t_theme_display_options');
    $text = '';
    if(isset($options['footer_text'])){
        $text = $options['footer_text'];
    }

    echo '<input type="text" name="t_theme_display_options[footer_text]" id="footer_text" value="'.$text.'">';

}



function t_theme_initialize_social_options(){
	if(false==get_option('t_theme_social_options')){
		add_option('t_theme_social_options', apply_filters('t_theme_social_defaults','t_theme_social_defaults'));
	}

	add_settings_section(
		'social_settings_section',
		'Social Options',
		'social_options_callback',
		't_theme_social_options'
	);

	add_settings_field(
		'twitter',
		'Twitter',
		'twitter_callback',
		't_theme_social_options',
		'social_settings_section'
	);
	add_settings_field(
		'fb',
		'Facebook',
		'fb_callback',
		't_theme_social_options',
		'social_settings_section'
	);
	add_settings_field(
		'ig',
		'Instagram',
		'ig_callback',
		't_theme_social_options',
		'social_settings_section'
	);

	register_setting(
	    't_theme_social_options',
	    't_theme_social_options'
	);

}
add_action('admin_init', 't_theme_initialize_social_options');
function social_options_callback(){
    echo '<p>Provide the URL to the social networks you\'d like to display.</p>';
}

function twitter_callback(){
	$options = get_option( 't_theme_social_options' );
     
    // Next, we need to make sure the element is defined in the options. If not, we'll set an empty string.
    $url = '';
    if( isset( $options['twitter'] ) ) {
        $url = $options['twitter'];
    } // end if
     
    // Render the output
    echo '<input type="text" id="twitter" name="t_theme_social_options[twitter]" value="' . $url . '" />';
}
function fb_callback(){
	$options = get_option( 't_theme_social_options' );
     
    // Next, we need to make sure the element is defined in the options. If not, we'll set an empty string.
    $url = '';
    if( isset( $options['fb'] ) ) {
        $url = $options['fb'];
    } // end if
     
    // Render the output
    echo '<input type="text" id="fb" name="t_theme_social_options[fb]" value="' . $url . '" />';
}
function ig_callback(){
	$options = get_option( 't_theme_social_options' );
     
    // Next, we need to make sure the element is defined in the options. If not, we'll set an empty string.
    $url = '';
    if( isset( $options['ig'] ) ) {
        $url = $options['ig'];
    } // end if
     
    // Render the output
    echo '<input type="text" id="ig" name="t_theme_social_options[ig]" value="' . $url . '" />';
}
function t_theme_initialize_background_options(){
    if(false==get_option('t_theme_background_options')){
        add_option('t_theme_background_options', apply_filters('t_theme_background_defaults','t_theme_background_defaults'));
    }

    add_settings_section(
        'background_settings_section',
        'Background Options',
        'background_options_callback',
        't_theme_background_options'
    );

    add_settings_field(
        'header_background',
        'Header Background Color',
        'header_background_callback',
        't_theme_background_options',
        'background_settings_section'
    );
    add_settings_field(
        'footer_background',
        'Footer Background Color',
        'footer_background_callback',
        't_theme_background_options',
        'background_settings_section'
    );

    add_settings_field(
        'header_text_color',
        'Header Text Color',
        'header_text_color_callback',
        't_theme_background_options',
        'background_settings_section'
    );


    add_settings_field(
        'footer_text_color',
        'Footer Text Color',
        'footer_text_color_callback',
        't_theme_background_options',
        'background_settings_section'
    );


    add_settings_field(
        'menu_hover_background',
        'Menu Hover Background',
        'menu_hover_background_callback',
        't_theme_background_options',
        'background_settings_section'
    );

    register_setting(
        't_theme_background_options',
        't_theme_background_options'
    );
}
add_action('admin_init', 't_theme_initialize_background_options');

function background_options_callback(){
    echo '<p>Provide select a background color for the following area</p>';
}

function header_background_callback(){
    $options = get_option('t_theme_background_options');
    $color = '';
    if(isset($options['header_background'])){
        $color = $options['header_background'];
    }
    echo '<input type="color" name="t_theme_background_options[header_background]" id="header_background" value="'.$color.'">';
}
function footer_background_callback(){
    $options = get_option('t_theme_background_options');
    $color = '';
    if(isset($options['footer_background'])){
        $color = $options['footer_background'];
    }
    echo '<input type="color" name="t_theme_background_options[footer_background]" id="footer_background" value="'.$color.'">';
}
function header_text_color_callback(){
    $options = get_option('t_theme_background_options');
    $color = '';
    if(isset($options['header_text_color'])){
        $color = $options['header_text_color'];
    }
    echo '<input type="color" name="t_theme_background_options[header_text_color]" id="header_text_color" value="'.$color.'">';
}
function footer_text_color_callback(){
    $options = get_option('t_theme_background_options');
    $color = '';
    if(isset($options['footer_text_color'])){
        $color = $options['footer_text_color'];
    }
    echo '<input type="color" name="t_theme_background_options[footer_text_color]" id="footer_text_color" value="'.$color.'">';
}
function menu_hover_background_callback(){
    $options = get_option('t_theme_background_options');
    $color = '';
    if(isset($options['menu_hover_background'])){
        $color = $options['menu_hover_background'];
    }
    echo '<input type="color" name="t_theme_background_options[menu_hover_background]" id="menu_hover_background" value="'.$color.'">';
}