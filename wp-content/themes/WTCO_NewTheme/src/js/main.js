jQuery(document).ready(function(){
    if(window.location.href.includes("galleries")){
        console.log("hi Uaa")
       var $ = jQuery;
        $('.slider-main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: $('.slider-nav')[0]
        });
        $('.slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor:  $('.slider-main')[0],
            dots: true,
            centerMode: true,
            focusOnSelect: true,
            adaptiveHeight: true
        });
    }else{
        jQuery(".owl-carousel").owlCarousel({
            margin:10,
            loop:true,
            autoWidth:true,
            items:4
        });
        setTimeout(function() {
            jQuery(".owl-carousel .owl-stage").css("display","flex");
        }, 250);
    }
  });