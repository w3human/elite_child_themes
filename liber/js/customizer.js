/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	"use strict";

	// Collect information from panel-customizer.js about which panels are opening
	wp.customize.bind( 'preview-ready', function() {
		wp.customize.preview.bind( 'section-highlight', function( data ) {

			// If there's an expanded panel section, scroll down to that panel & highlight in the preview
			if ( true === data.expanded ) {
				$.scrollTo( $( '.' + data.section ), {
					duration: 600,
					offset: { 'top': -40 }
				} );
				$( '.' + data.section ).addClass( 'liber-highlight' );
			// If we've left the panel, remove the highlight and scroll back to the top
			} else {
				$.scrollTo( $( '#masthead' ), {
					duration: 300,
					offset: { 'top': 0 }
				} );
				$( '.' + data.section ).removeClass( 'liber-highlight' );
			}
		} );
	} );

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#masthead .site-branding .site-title a, #masthead .site-branding .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '#masthead .site-branding .site-title a, #masthead .site-branding .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
			$( 'body' ).resize();
		} );
	} );

	// Site logo.
	wp.customize( 'site_logo', function( value ) {
		value.bind( function() {
			$( 'body' ).resize();
		} );
	} );


	$( document ).ready( function() {
		// Give each of the panels a highlight & title
		$( '.home' ).find( '.liber-panel' ).each(function() {
			$( this ).append( '<span class="liber-panel-title">' + $( this ).data( 'panel-title' ) + '</span>' );
		});
	});

} )( jQuery );
