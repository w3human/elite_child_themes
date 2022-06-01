/**
 * Theme Customizer enhancements, specific to panels, for a better user experience.
 *
 * This allows us to detect when the user has opened specific sections within the Customizer,
 * and adjust our preview pane accordingly.
 */

( function( $ ) {

	"use strict";
	wp.customize.bind( 'ready', function() {

	// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
	if ( wp.customize.section( 'liber_panel1' ) ) {
		wp.customize.section( 'liber_panel1' ).expanded.bind( function( isExpanding ) {
			// isExpanding will = true if you're entering the section, false if you're leaving it
			wp.customize.previewer.send( 'section-highlight', { section: 'liber-panel1', expanded: isExpanding } );
		} );
	}

	// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
	if ( wp.customize.section( 'liber_panel2' ) ) {
		wp.customize.section( 'liber_panel2' ).expanded.bind( function( isExpanding ) {
		// isExpanding will = true if you're entering the section, false if you're leaving it
		wp.customize.previewer.send( 'section-highlight', { section: 'liber-panel2', expanded: isExpanding } );
		} );
	}

	// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
	if ( wp.customize.section( 'liber_panel3' ) ) {
		wp.customize.section( 'liber_panel3' ).expanded.bind( function( isExpanding ) {
		// isExpanding will = true if you're entering the section, false if you're leaving it
		wp.customize.previewer.send( 'section-highlight', { section: 'liber-panel3', expanded: isExpanding } );
		} );
	}

	// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
	if ( wp.customize.section( 'liber_panel4' ) ) {
		wp.customize.section( 'liber_panel4' ).expanded.bind( function( isExpanding ) {
		// isExpanding will = true if you're entering the section, false if you're leaving it
		wp.customize.previewer.send( 'section-highlight', { section: 'liber-panel4', expanded: isExpanding } );
		} );
	}

	// Detect when the section for each panel is expanded (or closed) so we can adjust preview accordingly
	if ( wp.customize.section( 'liber_panel5' ) ) {
		wp.customize.section( 'liber_panel5' ).expanded.bind( function( isExpanding ) {
		// isExpanding will = true if you're entering the section, false if you're leaving it
		wp.customize.previewer.send( 'section-highlight', { section: 'liber-panel5', expanded: isExpanding } );
		} );
	}

  } );

} )( jQuery );
