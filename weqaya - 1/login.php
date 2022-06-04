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
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet" type="text/css">
    <link href="css/style.css"type="text/css" rel="stylesheet">
    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
        
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>تسجيل الدخول</title>



    </head>
    <body>
    <?php
    $link = null;
        if($_POST['link']){
            $link = $_POST['link'];
        }
    ?>
            <?php include_once("header.php"); ?>        
            <section class="log-in">

                <form class="login-form" action="Controller/main_controller.php" method="post">
                    <h2>تسجيل الدخول</h2>
                    <input type="button" class="facebook-btn btn white" value="الدخول باستخدام فيسبوك" >
                    <input type="button" class="twitter-btn btn white" value="الدخول باستخدام تويتر" >
                    <div class="contact-input">
                    <?php 
                    if ($link!=null){
                        echo '<input type="hidden" name="link" value="'.$link.'">';
                    }
                    ?>
                    <input type="email" name="email" placeholder="البريد الالكتروني" required>
                    </div>
                    <div class="contact-input">
                    <input type="password" name="password" placeholder="كلمة المرور" required>
                    </div>
                    <div> 
                       <label class="container">حفظ المعلومات للدخول مباشرةً
                              <input type="checkbox" name="accept" class="check-mark-style" >
                              <span class="checkmark"></span>
                        </label>
                    </div>
                    
                    <input type="submit" name="login" class="sent-btn btn white" value="تسجيل الدخول" >
                    <div class="white"><a href="#">هل نسيت كلمة المرور؟</a></div>
                    <div class="white"><a href="SignUp-User.php">ليس لديك حساب على الطبي؟</a></div>
                
                </form>
            
            </section> 
        
            <?php include_once("footer.php"); ?>
        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/js.js"></script>
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>
