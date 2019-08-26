(function( $ ) {
    "use strict";
 
    wp.customize( 't_theme_footer_background', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'background-color', to );
        } );
    });

    wp.customize( 't_theme_display_header', function( value ) {
		value.bind( function( to ) {
			false === to ? $( 'header' ).hide() : $( 'header' ).show();
		} );
	} );

 
})( jQuery );