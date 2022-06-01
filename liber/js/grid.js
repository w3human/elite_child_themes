( function( $ ){
	"use strict";
	if($(window).width() >= 700){
	//Masonry blocks
	var $blocks = jQuery.noConflict();
	$blocks = $(".columns");

	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			itemSelector: '.fourcolumn, .threecolumn, .twocolumn',
			layoutMode : 'masonry'
		});

		// Fade blocks in after images are ready (prevents jumping and re-rendering)
		$(".fourcolumn, .threecolumn, .twocolumn").fadeIn();
	});

	$(window).resize(function () {
		$blocks.masonry('reload');
	});
	}
})( jQuery );