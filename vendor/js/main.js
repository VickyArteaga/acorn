$( document ).ready(function() {

   $(window).scroll(function() {
       if($(window).scrollTop() > 80) {
          $('header nav').addClass('darkness');
       } else {
           $('header nav').removeClass('darkness');
       }
   });

})