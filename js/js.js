$(document).ready(function() {
	$('.menu li a').click(function(){
		var content = $(this).attr('href');
		var splitA = content.split('#');
		var contentX = $('.'+splitA[1]).offset().top;

		$('body, html').animate({scrollTop: contentX}, 1200);
			console.log(contentX);

	})    	
	$('.submenu').hide();
	$('.dropdown').click(function(){
		$('.submenu ul').toggle('slow');
	})
	$("#carousel").owlCarousel({
		navigation : false, 
		slideSpeed : 600,
		paginationSpeed : 400,
		pagination: false,
		singleItem: true,
		autoPlay: true,
		autoHeight: true,
		transitionStyle : "fade"
		// "singleItem:true" is a shortcut for:
		// items : 1, 
		// itemsDesktop : false,
		// itemsDesktopSmall : false,
		// itemsTablet: false,
		// itemsMobile : false

	});

});

