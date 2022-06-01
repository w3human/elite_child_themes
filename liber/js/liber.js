( function( $ ) {
	"use strict";

	var offset = 100;
	var speed = 500;
	var duration = 900;
	$(window).scroll(function(){
		if ($(this).scrollTop() < offset) {
			$('.scroll-to-top') .fadeOut(duration);
		} else {
			$('.scroll-to-top') .fadeIn(duration);
		}
		});
	$('.scroll-to-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
	});
	
	// Additional class for posts with thumbnails
	function addHentryClass() {
		$( '.hentry + .has-post-thumbnail, .post + .has-post-thumbnail' ).prev().addClass( 'has-post-thumbnail-prev' );
	}

	$( document.body ).on( 'post-load',  addHentryClass );

	addHentryClass();
	

	$(window).scroll(function(){
		var sticky = $('.fixed-header .site-header'),
		scroll = $(window).scrollTop();
		if (scroll >= 100) sticky.addClass('fixed');
		else sticky.removeClass('fixed');
	});
	
} )( jQuery );
