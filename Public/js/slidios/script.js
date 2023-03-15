$(document).ready(function(){
    $('.slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    $('.slick-prev').click(function(){
        $('.slider').slick('slickPrev');
    });
    $('.slick-next').click(function(){
        $('.slider').slick('slickNext');
    });
  });