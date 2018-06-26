 /*hamburger menu
         		-------------------------*/
 jQuery(document).ready(function () {
 	jQuery('.hamburger').on('click', function () {
 		jQuery('.globalnav_mini').animate({
 			width: 'toggle'
 		}, 600);
 		jQuery(this).toggleClass('active');
 	});
 });

 /*globalnav
 	-------------------------*/
 $(function () {
 	var offset = $('.globalnav').offset();

 	$(window).scroll(function () {
 		if ($(window).scrollTop() > offset.top) {
 			$('.globalnav').addClass('fixed');
 		} else {
 			$('.globalnav').removeClass('fixed');
 		}
 	});
 });
