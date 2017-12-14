( function( $ ) {

  // Homepage Header
	wp.customize( 'homepage_header_title', function( value ) {
		  value.bind( function( newval ) {
			  $('#homepage').find('.header-image .content-container h1').html( newval );
		  } );
	 } );

   wp.customize( 'homepage_header_image', function( value ) {
 		  value.bind( function( newval ) {
 			   $('#homepage').find('.image').css('background-image', 'url(' + newval + ')');
 		  } );
 	 } );

   wp.customize( 'homepage_header_copy', function( value ) {
 		  value.bind( function( newval ) {
 			   $('#homepage').find('.header-image .content-container .copy').html( newval );
 		  } );
 	 } );

	 //Homepage Section 1
	 wp.customize( 'homepage_section_one_title', function( value ) {
			 value.bind( function( newval ) {
					$('#homepage').find('.section-one h1').html( newval );
			 } );
		} );

		wp.customize( 'homepage_section_one_intro_copy', function( value ) {
 			 value.bind( function( newval ) {
 					$('#homepage').find('.section-one .intro-copy').html( newval );
 			 } );
 		} );

		// Homepage Section 2
		wp.customize( 'homepage_capabilities_intro_copy', function( value ) {
			 value.bind( function( newval ) {
					$('#homepage').find('.section-two .intro-copy').src(newval);
			 } );
		} );

  } )( jQuery );
