$(document).ready(function(){
  $('.slide').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1000,
      arrows:false
  
    });
  $('.slick-prev').click(function(){
      $('.slider').slick('slickPrev');
  });
  $('.slick-next').click(function(){
      $('.slider').slick('slickNext');
  });
});