/*-------------------------------------------------------------------*/
(function ($) {
	"use strict";
	var healthcare = {
		initialised: false,
		version: 1.0,
		mobile: false,
		init: function () {

			if(!this.initialised) {
				this.initialised = true;
			} else {
				return;
			}

			/*-------------- ---------------------------------------------------
			------------------------------------------------------------------------------------------------*/
			this.Slider_all();
			
			
		},
		
		/*--------------  ---------------------------------------------------
		---------------------------------------------------------------------------------------------------*/
		Slider_all: function(){
			if($('#our_doctor_team_slider').length > 0){
				var do_team_owl = $("#our_doctor_team_slider");
				do_team_owl.owlCarousel({
					autoplay:true,
					loop:true,
					autoplayTimeout:2000,
					items:3,
					dots:false,
					margin:20,
					stagePadding:0,
					smartSpeed:450,
					responsive:{
						0:{
							items:1
						},
						580:{
							items:2
						},
						700:{
							items:2
						},
						1024:{
							items:2
						},
						1200:{
							items:3
						},
						1480:{
							items:3
						}
					}
				});
				// Custom Navigation Events
				$(".our_doctor_team > .customNavigation > .next").click(function(){
					do_team_owl.trigger('next.owl.carousel');
				});
				$(".our_doctor_team > .customNavigation > .prev").click(function(){
					do_team_owl.trigger('prev.owl.carousel');
				});
			}
		}
	
	};
	healthcare.init();
})(jQuery);



$('.dropdown-toggle').click(function() {
    var location = $(this).attr('href');
    window.location.href = location;
    return false;
});