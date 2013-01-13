/*
	Sets up and calls SimpleModal lightbox for products page with reviews/add to cart options
*/

$(document).ready(function() {

	$(".item").fancybox({
			'hideOnContentClick': false,
			'width': '600',
			'height': '500',
			'showCloseButton': true,
			'autoDimensions': false
			
		});

});