( function( $ ) {
	
	/*
	* We're going to use the Waypoints and ScrollTo libraries to build a dynamic menu.
	* This will animate a scroll effect to and from panels in the page as well as
	* highlighting the current panel in the nav menu.
	*/
	function dynamicNav() {
		var $sections = $( '.liber-panel' );

		// Use the Waypoints plugin to indicate our current nav item
		$sections.waypoint( {
			handler: function( direction ) {
				var activePanel = this;
				var panelID = activePanel.element.id;

				// If we're scrolling up, set the previous panel as our current panel.
				// This just means that, when we hit to top of a panel (bottom of a new panel)
				// we'll highlight the correct panel. Wheee!
				if ( 'up' === direction ) {
					// Subtract twice because waypoints is one-indexed; DOM is zero-indexed.
					var elementIndex = activePanel.key.substr( 9, 1 ) - 2;
					panelID = $sections.eq( elementIndex ).attr('id');
				}
			},
			offset: '110px'
		});

		// Use scrollTo library to smoothly scroll between panels.
		// Note that the admin bar lenght is only taken into consideration on screen size > 480px, when it becomes fixed.
		// Also, we take into account he height of the primary menu after 768px.
		$navLinks.click( function() {
			var yCoord = ( 1 === $adminBar.length && $( window ).outerWidth() > 480 ) ? $adminBar.outerHeight() : 0;
			var offset = $( window ).outerWidth() > 768 ? $primaryMenu.outerHeight() : 0;
			$.scrollTo( $( this ).attr( 'href' ), {
				duration: 400,
				offset: { 'top': -1 * ( yCoord + offset ) }
			} );
		});
	}
	
} )( jQuery );
