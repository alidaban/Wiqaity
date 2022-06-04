<!DOCTYPE html>
<html lang="ar">
<?php include_once 'DB.php'; ?>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!--<link href="css/normalize.css"type="text/css" rel="stylesheet">-->
    <link href="css/ionicons.css"type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet" type="text/css">
    <link href="loadMore/css/style.css"type="text/css" rel="stylesheet">
    <link href="css/style.css"type="text/css" rel="stylesheet">
    <link href="css/wall.css"type="text/css" rel="stylesheet">
    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    <link href="css/contact-us.css" type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">

    
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    
        
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>تواصل معنا</title>



    </head>
    <body>
<?php include_once("header.php"); ?> 

        <section class="wall">
            <div class="contact-box">
            <div class="row">
                <div class="col-sm-12 contact-welcome">
                    <div><i class="ion-android-mail"></i></div>
                    <div><h1 class="">نسعد بخدمتكم</h1></div>
                </div>
                        
            
            </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="send-p">أرسل رسالة</p>
                        <form id="contact_form">
                            <?php if (is_loged()){ ?>
                            <input id="name" name="name"  type="text" placeholder="الأسم" value="<?php echo get_user_name() ?>">
                            <input id="email" name="email" type="text" placeholder="البريد الألكتروني" value="<?php echo get_email() ?>" >
                            <?php } else{?>
                            <input id="name" name="name"  type="text" placeholder="الأسم">
                            <input id="email" name="email" type="text" placeholder="البريد الألكتروني">
                            <?php } ?>
                            <input id="subject" name="subject" type="text" placeholder="الموضوع">
                            <textarea id="message"  name="message"  placeholder="الرسالة"></textarea>
                            <input id="submit_contact_form" type="submit" class="submit-btn" value="أرسل"> 

                        </form>
                <div id="report_form_success_message" class="alert alert-success alert-style alert-report" role="alert">شكرا لك، تم أرسال رسالتك بنجاح سيتم مراجعتها بأقرب وقت</div>

                    </div>
                    <div class="col-sm-6 contact-info">
                            <div class="p-info"><p><i class="ion-iphone"></i>0097-0591-1234-567 <br /><br />
                                <i class="ion-at"></i><a href="#">breastcancer@info.ps</a>
                                </p>
                            </div>  
                            <div class="social-icon ">
                                <a href="#"><div class="f-icon"><i class="ion-social-facebook"></i></div></a>

                                <a href="#"><div class="icon-back-f y-icon"><i class="ion-social-youtube white"></i></div></a>
                                <a href="#"><div class="icon-back-f t-icon margin-left"><i class="ion-social-twitter white"></i></div></a>

                            </div>


                    </div>
            
                </div>
            </div>
        
        </section>   
        
                    <?php include_once("footer.php"); ?>

        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/js.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="loadMore/js/loadMoreResults.js"></script>
        <script src="js/jquery.dotdotdot.js"></script>
                                <script language=javascript>
                    $("#submit_contact_form").click(function(e) {
                            e.preventDefault();//to disable link

                        $.post('Controller/send_contact_us.php', $('#contact_form').serialize(),
                            function (data) {//الانتهاء من العملية
                                    //alert(data);
                                   // $('.text-box').removeClass('open');//to hide the form
                                    $('#report_form_success_message').css('display','block');
                                     setTimeout(function(){
                                    $('#report_form_success_message').fadeOut(2500);
                                        }, 1500);
                                    $('#name').val("");
                                    $('#email').val("");
                                    $('#subject').val("");
                                    $('#message').val("");
                                    //window.location.replace("index.php")
                                });
                    });

                </script>


    </body>
</html>
