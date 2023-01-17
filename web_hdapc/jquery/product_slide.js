$(document).ready(function() {
   var autoLoad= setInterval(function(){
   $('.next').trigger('click');
   },3000); 


   $('.next').click(function(event) {
      if (event.originalEvent !== undefined) {
          clearInterval(autoLoad);
         }
      var vi_tri_hien_tai = $('.active-btn').index()+1;
      var slide_sau = $('.active').next();
      if(slide_sau.length!=0){
         $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
         });
         slide_sau.addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
         });

          $('.active-btn').removeClass('active-btn');
          $('.btn-slide li:nth-child('+(vi_tri_hien_tai+1)+')').addClass('active-btn');

      }else{
         $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
         });
         $('.first_slide').addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
         });

         $('.active-btn').removeClass('active-btn');
         $('.btn-slide li:first-child').addClass('active-btn');
      }
   });


     $('.previous').click(function(event) {
      clearInterval(autoLoad);
      var vi_tri_hien_tai = $('.active-btn').index()+1;
      var slide_truoc = $('.active').prev();
      if(slide_truoc.length!=0){
         $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
         });
         slide_truoc.addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
         });

          $('.active-btn').removeClass('active-btn');
          $('.btn-slide li:nth-child('+(vi_tri_hien_tai-1)+')').addClass('active-btn');

      }else{
         $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
         });
         $('.last_slide').addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
         });

          $('.active-btn').removeClass('active-btn');
          $('.btn-slide li:last-child').addClass('active-btn');
      }
   });


           $('.btn-slide li').click(function(event) {
               clearInterval(autoLoad);
               var vi_tri_hien_tai = $('.active-btn').index()+1;
               var vi_tri_click = $(this).index()+1;
               $('.btn-slide li').removeClass('active-btn');
               // alert('xin chao');
               $(this).addClass('active-btn');
               if(vi_tri_click>vi_tri_hien_tai){
                  $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
                     $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
                  });
                  $('.pdSlide:nth-child('+vi_tri_click+')').addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
                     $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
                  });
               }
               if(vi_tri_click<vi_tri_hien_tai){
                  $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
                     $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
                  });
                  $('.pdSlide:nth-child('+vi_tri_click+')').addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
                     $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
                  });
               }
           });

     
    




});


