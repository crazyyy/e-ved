jQuery.noConflict();
//Crousel Init	
jQuery(document).ready(function() {
	jQuery(".carousel-posts").jCarouselLite({		//carousel settings
			visible: jQuery('#carousel-full li').length,						// visible items
			auto: 5000,									// carousel speed
			btnNext: ".next",						// next button class
			btnPrev: ".prev"						// previous button class
   	});
});