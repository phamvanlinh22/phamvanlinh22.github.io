$(document).ready(function() {
   var autoLoad= setInterval(function(){
   $('.bt-right').trigger('click');
   },3000); 


   $('.bt-right').click(function(event) {
      if (event.originalEvent !== undefined) {
          clearInterval(autoLoad);
         }
      var vi_tri_hien_tai = $('.active-nut').index()+1;
      var slide_sau = $('.active').next();
      if(slide_sau.length!=0){
         $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
         });
         slide_sau.addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
         });

          $('.active-nut').removeClass('active-nut');
          $('.bt-mn li:nth-child('+(vi_tri_hien_tai+1)+')').addClass('active-nut');

      }else{
         $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
         });
         $('.slide:first-child').addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
         });

         $('.active-nut').removeClass('active-nut');
         $('.bt-mn li:first-child').addClass('active-nut');
      }
   });


     $('.bt-left').click(function(event) {
      clearInterval(autoLoad);
      var vi_tri_hien_tai = $('.active-nut').index()+1;
      var slide_truoc = $('.active').prev();
      if(slide_truoc.length!=0){
         $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
         });
         slide_truoc.addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
         });

          $('.active-nut').removeClass('active-nut');
          $('.bt-mn li:nth-child('+(vi_tri_hien_tai-1)+')').addClass('active-nut');

      }else{
         $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
         });
         $('.slide:last-child').addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
         });

          $('.active-nut').removeClass('active-nut');
          $('.bt-mn li:last-child').addClass('active-nut');
      }
   });


           $('.bt-mn li').click(function(event) {
               clearInterval(autoLoad);
               var vi_tri_hien_tai = $('.active-nut').index()+1;
               var vi_tri_click = $(this).index()+1;
               $('.bt-mn li').removeClass('active-nut');
               // alert('xin chao');
               $(this).addClass('active-nut');
               if(vi_tri_click>vi_tri_hien_tai){
                  $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
                     $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
                  });
                  $('.slide:nth-child('+vi_tri_click+')').addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
                     $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
                  });
               }
               if(vi_tri_click<vi_tri_hien_tai){
                  $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
                     $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
                  });
                  $('.slide:nth-child('+vi_tri_click+')').addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
                     $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
                  });
               }
           });

     
     // $('.submenu').mouseover(function(event){
     //     var vt_sbmn1= $('.main-menu:first-child').index();
     //     var vt_ht= $(this).index();
     //     if(vt_sbmn1 != vt_ht)
     //     $('#slider').addClass('hiddenn');
     // });

     //  $('.submenu').mouseout(function(event){
     //     $('#slider').removeClass('hiddenn');
     //  });
     
     $('.lk').mouseover(function(event){
         // var vt_sbmn1= $('.main-menu:first-child').index();
         // var vt_ht= $(this).index();
         // if(vt_sbmn1 != vt_ht)
         $('#slider').addClass('hiddenn');
     });

      $('.lk').mouseout(function(event){
         $('#slider').removeClass('hiddenn');
      });


});


