jQuery(document).ready(function($){
	
	if($('img.img').attr('src') == ''){
		$('img.img').css('display', 'none')
	}

	$("ul.primary-menu > li").each(function(){
		if($(this).has("ul").length){
          $(this).children('a').after('<i class="fa fa-chevron-down"></i>');
        }
    });

	$('ul.primary-menu li.menu-item i').on('click', function(){
		$(this).siblings('ul.sub-menu').slideToggle('slow');


		$(document).on('click', function(event) {
		  if (!$(event.target).closest('ul.primary-menu').length) {
		    $('ul.sub-menu').slideUp();
		  }
		});
	});

	$('header .container > i').click(function(){
		$(this).siblings('div').children('nav').children('div').children().slideToggle('slow');
		
	});
	$(".owl-carousel").owlCarousel({
		items:1,
		loop:true,
	    autoplay:true,
	    autoplayTimeout:1000,
	    autoplayHoverPause:true
	});

})