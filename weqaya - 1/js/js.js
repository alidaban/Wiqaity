

$(window).bind('load', function(){
        
        $('.spinner').fadeOut(1000);
   });





$(document).ready(function() { 
    
    
    $('.close-ban').click(function(event){
        event.preventDefault();

        $this = $(this);

        $this.closest(".ban-person").css('display',"none");
        
        var a=$this.closest(".ban-person").text();
        $('name-of-ban').html(a);
        $(".alert-style").css('display',"block");
        $(".alert-style").fadeIn(200).fadeOut(2000, function(){
    $("#loading").empty();});

        
    });
    
   /*$(".comment-btn").live('click', function() {*/

    
    /*$(".replay-div1").find('.send-btn').on('click', function(event) {
        event.preventDefault();
        $this = $(this);

       $this.closest(".replay-div1").after('<div class="comment replay-of-comments"> <div class="user-icon-back"><i class="ion-android-person"></i></div> <div class="the-comment"> <div class="comment-detail"> <p>حسام احمد</p> <p> 31-5-2018 15:50</p> </div> <div class="comment-p"><p>'+$this.closest(".replay-div1").find('.replay-form').val()+'</p></div> </div> </div>');
        $('.replay-form').val("");
        $this.closest(".replay-div1").find('.replay-form').focus();   

   });   
    
 
    
    $(".replay-div").find('.send-btn').on('click', function(event) {
        event.preventDefault();
        $this = $(this);
        if($this.closest(".replay-div").find('.replay-form').val()==0)
        $(".replay-form").css('border','2px solid #b52243 ');
        else{
       $this.closest(".replay-div").after('<div class="comment"> <div class="user-icon-back"><i class="ion-android-person"></i></div> <div class="the-comment"> <div class="comment-detail"> <p>حسام احمد</p> <p> 31-5-2018 15:50</p> </div> <div class="comment-p"><p>'+$this.closest(".replay-div").find('.replay-form').val()+'</p></div> <div class="comment-btn">أضافة رد</div> </div> </div>');
        $('.replay-form').val("");
        $this.closest(".replay-div").find('.replay-form').focus(); }  

   });*/
    
        var mouse_is_inside3=false;
    
    $('.text-box').hover(function(){ 
        mouse_is_inside3=true; 
    }, function(){ 
        mouse_is_inside3=false; 
    });

    $('.report-box').hover(function(){ 
        mouse_is_inside3=true; 
    }, function(){ 
        mouse_is_inside3=false; 
    });
    
    $('.add-quis').hover(function(){ 
        mouse_is_inside2=true; 
    }, function(){ 
        mouse_is_inside2=false; 
    });

    $("body").mouseup(function(){ 
        if(! mouse_is_inside && ! mouse_is_inside2 ){
            $('.text-box').removeClass("open");
        z=0;
        }
   

    });

    $("body").mouseup(function(){ 
        if(! mouse_is_inside && ! mouse_is_inside2 ){
            $('.report-box').removeClass("open");
        z=0;
        }
   

    });
    

    
    function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }
    
    $("div").delegate(".comment-btn", "click", function(event) {
        event.preventDefault();
        $this = $(this);
       //alert("*");
       $("#reply_id").val($(this).attr("comment_id"));


       $('.replay-div1').first().css('display','block');
        $('.replay-div1').first().insertAfter($this.closest(".comment"));
        $this.closest(".comment").next('.replay-div1').find('.replay-form').focus();  
       scrollToAnchor(".comment");

        
   });
   /* $(".the-comment").find(".comment-btn").click( function() {
    $this = $(this);
    $this.closest(".the-comment").insertAfter('.comment');;
});
$('.button1').click();*/
    
   
    $( ".load-more-notif-btn2" ).click(function() {
        $( ".message-boxs" ).prepend( "<div class='recive-box'><div class='recive'>يوجد عدة اسباب ممكنة لمثل هذه الاعراض. مثل تـغيرات في الـثدي او مشــاكل القـلب او حتى مشـاكل في الكـتف. لـذلك يفضل مراجعة الـطبيب للتأكد منها</div></div><div class='sender-box'><div class='sender'>عندي وخز في الثدي الأيسر وحرقان وكذلك تحت الابط ويمتد أحيانا الى الكتف ولوحة الكتف فما السبب؟ </div>");
    });



    $( ".writting-back" ).submit(function(event) {
        event.preventDefault();
        $( ".message-boxs" ).append( "<div class='sender-box'><div class='sender'>"+$('.writing-box').val()+"</div></div>");
        $('.writing-box').val("");
        $(".message-boxs3").scrollTop($(".message-boxs3")[0].scrollHeight);



});
        $('.cv-img-back').css({    "display" : "none"});
        $('.upload-cv').css({    "display" : "none"});
        $('.sign-up-form2').css({    "display" : "none"});      

    
        $('.norm-user').click(function(){
            $('.norm-user').css({    "background-color": "white",'color': '#b52243' });
            $('.spic-user').css({    "background-color": "rgba(0,0,0,0",'color': 'white' });
            $('.cv-img-back').css({    "display" : "none"});
            $('.upload-cv').css({    "display" : "none"});
            $('.type-user').attr('value','normal');
            $('.sign-up-form2').css({    "display" : "none"});
            $('.form1').css({    "display" : "block"});

        

    });

        $('.spic-user').click(function(){

            $('.spic-user').css({    "background-color" : "white" ,"color" : '#b52243' });
            $('.norm-user').css({    "background-color" : "rgba(0,0,0,0)","color" : 'white' });
            $('.cv-img-back').css({    "display" : "block"});
            $('.upload-cv').css({    "display" : "block"});
            $('.type-user').attr('value','doctor');
            $('.sign-up-form2').css({    "display" : "block"});
            $('.form1').css({    "display" : "none"});






    });
    
    
    
    
    
    var x=0;
    var y=0;
    var mouse_is_inside = false;
    var mouse_is_inside1 = false;

    
  
    

    
    
    


    $('.notfication-icon').click(function(){
        if(x==0){
        $('.notifications-num').css("display","none");
        $('.notification-menu').addClass('open');
            x=1;
        }
        else
            {
        $(".notification-menu").removeClass("open");
            x=0;
  
            }
    });
    
    
    $('.notification-menu').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    }); 
    
    $('.notfication-icon').hover(function(){ 
        mouse_is_inside1=true; 
    }, function(){ 
        mouse_is_inside1=false; 
    });

    $("body").mouseup(function(){ 
        if(! mouse_is_inside && ! mouse_is_inside1 ){
            $('.notification-menu').removeClass("open");
        x=0;
        }
   

    });
    
    
    
    
    
    
    
    var x=0;
    $('.sign-up-menu-btn').click(function(){
        if(x==0){
        $('.dropdown').addClass('open');
            x=1;
        }
        else
            {
        $(".dropdown").removeClass("open");
            x=0;
  
            }
    });
    
    var z=0;
        $('.add-quis').click(function(){
        if(z==0){
        $('.text-box').addClass('open');
            z=1;
        }
        else
            {
        $(".text-box").removeClass("open");
            z=0;
  
            }
    });    
/*    var v=0;
        $('.add-quis').click(function(){
        if(v==0){
        $('.report-box').addClass('open');
            v=1;
        }
        else
            {
        $(".report-box").removeClass("open");
            v=0;
  
            }
    });  */
    
    
    
    //block person button
    $('.report-person').click(function(event){
                event.preventDefault();

        
        if(z==0){
        $('.text-box').addClass('open');
            z=1;
        }
        else
            {
        $(".text-box").removeClass("open");
            z=0;
  
            }
    });

    $('.report-person').click(function(event){
                event.preventDefault();

        
        if(v==0){
        $('.report-box').addClass('open');
            v=1;
        }
        else
            {
        $(".report-box").removeClass("open");
            v=0;
  
            }
    });

    
    //block person button

    var mouse_is_inside2=false;
    
    $('.text-box').hover(function(){ 
        mouse_is_inside2=true; 
    }, function(){ 
        mouse_is_inside2=false; 
    });
    
    $('.report-box').hover(function(){ 
        mouse_is_inside2=true; 
    }, function(){ 
        mouse_is_inside2=false; 
    });
    
    $('.add-quis').hover(function(){ 
        mouse_is_inside2=true; 
    }, function(){ 
        mouse_is_inside2=false; 
    });

    $("body").mouseup(function(){ 
        if(! mouse_is_inside && ! mouse_is_inside2 ){
            $('.text-box').removeClass("open");
        z=0;
        }
         });
    $("body").mouseup(function(){ 
        if(! mouse_is_inside && ! mouse_is_inside2 ){
            $('.report-box').removeClass("open");
        z=0;
        }

    });
    
    
    
     
    $('#owl-carousel').owlCarousel({
        dots: true,
        items: 2,
        rtl: true,
        loop:true,
    responsive: {
      
                  0: {
                    items: 1
                  },
                670:{
                items: 2

                },
        
           
                  1000: {
                    items: 4
                  }
    }
        });
    
    $('#owl-carousel2').owlCarousel({
        dots: true,
        items: 2,
        rtl: true,
        loop:true,
    responsive: {
      
                  0: {
                    items: 1
                  },
                670:{
                items: 2

                },

                  1000: {
                    items: 4
                  }
    }
        });

    
    
    $('.load-more3').loadMoreResults({
         displayedItems: 5,
         showItems: 0,

     button: {

      'class': 'load-more-notif-btn',

      'text': 'عرض المزيد'
                         

    },
          
               tag: {
    
        'name': 'li',
    
        'class': 'item2'
    
      }


    });
       //notifications 
        $('.load-more2').loadMoreResults({
         displayedItems: 4,
         showItems: 0,

     button: {

      'class': 'load-more-notif-btn',

      'text': 'عرض المزيد'
                         

    },
          
               tag: {
    
        'name': 'li',
    
        'class': 'item2'
    
      }


    });
    
            $('.prfile-input').prop('disabled', true);
    
    
    
        var mouse_is_inside3=false;
    
    $('.confirm-block-box').hover(function(){ 
        mouse_is_inside3=true; 
    }, function(){ 
        mouse_is_inside3=false; 
    });



    $("body").mouseup(function(){ 
        if(! mouse_is_inside3 ){
            $('.confirm-block-box').css('display','none');
        z=0;
        }
   

    });
        
        $('.block-person').click(function(event){
            event.preventDefault();

            $('.confirm-block-box').css('display','block');
        });
    $('.btn-4').click(function(event){
            event.preventDefault();
            $('.confirm-block-box').css('display','none');
        });
    
    

        var m=0;
             
            $('.btn-2').click(function(event){
                if(m==0){
                  $('.btn-2-text').text( "الغاء");
                  $('.btn-2').removeClass('open'); 
                  event.preventDefault();
                        $('.btn-3').addClass('open');


  
                $(".prfile-input").prop('disabled', false);
                    m=1;}
                    else{
                $('.btn-2-text').text( "تعديل المعلومات");
                $(".prfile-input").prop('disabled', true);
                $('.btn-3').removeClass('open');

                m=0;

                    
                }

                

            });
    $("#fos p").dotdotdot({

      callback: function( isTruncated ) {},
      /* Function invoked after truncating the text.
         Inside this function, "this" refers to the wrapper. */

    ellipsis: "\u2026 ",
      /* The text to add as ellipsis. */

      height: 11,
      /* The (max-)height for the wrapper:
         null: measure the CSS (max-)height ones;
         a number: sets a specific height in pixels;
         "watch": re-measures the CSS (max-)height in the "watch". */

    keep: $(".for-more"),
      /* jQuery-selector for elements to keep after the ellipsis. */

      tolerance: 30,
      /* Deviation for the measured wrapper height. */

      truncate: "word",
      /* How to truncate the text: By "node", "word" or "letter". */

      watch: "window",
      /* Whether to update the ellipsis: 
         true: Monitors the wrapper width and height;
         "window": Monitors the window width and height. */

   });
    
    
    /**************uploadfile**************************/
    var input = document.getElementById( 'file-upload' );
    var infoArea = document.getElementById( 'file-upload-filename' );

    /*input.addEventListener( 'change', showFileName );*/

    function showFileName( event ) {

      // the change event gives us the input it occurred in 
      var input = event.srcElement;

      // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
      var fileName = input.files[0].name;

      // use fileName however fits your app best, i.e. add it into a div
      infoArea.textContent = 'File name: ' + fileName;
          $('.cv-img-back').css("margin-bottom","102px");
    }
    
            
            $('.btn-3').click(function(event){   
                event.preventDefault();
                $('.btn-2-text').text( "تعديل المعلومات");

                
                $('.prfile-input').prop('disabled', true);

                $('.btn-3').removeClass('open');

                $('.btn-2').addClass('open');
                m=0;
            });  
$(function () {

    $('.datepicker').datepicker({
    format: 'yyyy-dd-mm',
});
});



          $('.loadMore').loadMoreResults({

          

         displayedItems: 5,
         showItems: 0,

                     button: {

      'class': 'btn-load-more',

      'text': 'عرض المزيد'
                         

    },
          
               tag: {
    
        'name': 'li',
    
        'class': 'item'
    
      }


    }); 
});
  
          



 

        
    
  

