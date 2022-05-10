//mobile-owl
$(document).ready(function(){
	
	if (window.innerWidth < 768 && $('.mobile-owl').length > 0){
		$('.mobile-owl').removeAttr('class').addClass('owl-carousel owl-theme sp-owl-carousel');
		$('.sp-owl-carousel').owlCarousel({
		    loop:true,
		    margin:20,
		    nav:false,
		    dots:false,
		    items:2,
		    autoplay:true,
    		autoplayTimeout:1000,
    		autoplayHoverPause:true,
    		transitionStyle: "fade",
    		animateIn: 'fadeIn',
            animateOut: 'fadeOut'
		})
	}
	/////
	if (window.innerWidth < 768 && $('.mobile-dd').length > 0){
		var t = $('.mobile-dd > li').find('.active').text();
		//alert(t)
		var dd = '<div class="sp-dd-row">'+t+'</div>';
		$(dd).insertBefore('.mobile-dd');
		$(document).on("click",".sp-dd-row",function() {
    		//alert("click");
    		$(this).toggleClass('active');
    		$('.mobile-dd').slideToggle();
		});
	}
	////
	$(document).on("click",".mobile-arrow-left",function() {
		//alert("click left");
		var element = document.getElementById("scroll-on-mobile");
  		element.scrollLeft -= 50;
	});
	$(document).on("click",".mobile-arrow-right",function() {
		//alert("click right");
		var element = document.getElementById("scroll-on-mobile");
  		element.scrollLeft += 50;
	});
	//matchheight
	if ($('.matchheight').length > 0){
		$('.matchheight').matchHeight();
	}
	//////
	window.addEventListener('resize', function(event){
  		console.log('window resize')
  		if (window.innerWidth > 768){
  			if ($('.sp-dd-row').length > 0){
  				$('.sp-dd-row').remove();
  				$('.mobile-dd').removeAttr('style');
  			}
  			if ($('.sp-owl-carousel').length > 0){
  				$('.sp-owl-carousel').trigger('destroy.owl.carousel');
  				$('.sp-owl-carousel').removeAttr('class').addClass('d-md-block d-lg-flex justify-content-between mobile-owl');
  			}
  		}else if (window.innerWidth < 768){

  		}
	});
});