<!DOCTYPE html>
<html lang="ar">
<?php //include_once 'DB.php'; ?>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!--<link href="css/normalize.css"type="text/css" rel="stylesheet">-->
    <link href="css/ionicons.css"type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
   
    <link href="css/bootstrap-rtl.css" rel="stylesheet" type="text/css">

    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/style.css"type="text/css" rel="stylesheet">

    <link href="css/queries.css"type="text/css" rel="stylesheet">
    
        
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
        
    <title>تسجيل المستخدم جديد</title>





    </head>
    <body>
    <?php
    $link = null;
        if($_POST['link']){
            $link = $_POST['link'];
        }
    ?>

       <?php include_once("header.php");?> 

 
        
        
        
            <section class="sign-up">
                
                <div class="sign-up-form" >
                    <p class="title-sign">تسجيل مستخدم جديد</p>
                    <div class="choice contact-input">
                        <span class="norm-user user">مستخدم عادي</span>
                        <span class="spic-user user">تسجيل كمختص</span>
                    
                    </div>
                    <input type="button" class="facebook-btn btn white contact-input" value="التسجيل باستخدام فيسبوك" >
                    <input type="button" class="twitter-btn btn white" value="الدخول باستخدام تويتر" >

                    <form action="Controller/main_controller.php" method="post">
                        <div class=" contact-sep">
                        <div class="line"></div>
                        <p class="white">أو</p>
                        <div class="line"></div>
                        </div>
                        <input type="hidden" name="normal" value="normal" >
                        <?php 
                        if ($link!=null){
                            echo '<input type="hidden" name="link" value="'.$link.'">';
                        }
                        ?>

                        <div class="contact-input form1">
                        <input type="name" name="fname" placeholder="الأسم الأول" required></div>
                        <div class="contact-input form1">
                        <input type="name" name="lname" placeholder="الأسم الأخير"required></div>
                        <div class="contact-input form1">
                        <input type="email" name="email" placeholder="البريد الالكتروني" required>
                        </div>
                        <div class="contact-input form1">
                        <input type="password" name="password" placeholder="كلمة المرور"  required>
                        </div>
                        <div class="log-check form1"> 
                           <label class="container">أوافق على 
                           <a href="policies.php" class="white check-hover">شروط الخدمة وسياسة الخصوصية</a>
                                  <input type="checkbox" name="polices" class="check-mark-style" required>
                                  <span class="checkmark"></span>
                            </label>
                        </div>               
                        <input type="submit" class="form1 sent-btn btn white contact-input" value="تسجيل مستخدم جديد" >
                    </form>

                <form class="sign-up-form2 " action="Controller/main_controller.php" method="post" enctype="multipart/form-data">
                    <div class="contact-input form2">
                    <input type="name" name="fname" placeholder="الأسم الأول" required>
                    </div>
                    <div class="contact-input from2">
                    <input type="name" name="lname" placeholder="الأسم الأخير"required>
                    </div>
                    <div class="contact-input from2">
                    <input type="email" name="email" placeholder="البريد الالكتروني" required>
                    </div>
                    <div class="contact-input from2">
                    <input type="password" name="password" placeholder="كلمة المرور"  required>
                    </div>
                    <div class="cv-img-back contact-input"><img src="images/address-card.svg" class="cv-img" style="    width: 71px;    height: 100px;"></div>
                    
                    <div class="upload-cv"> 
                                <input type="file" class="hide_file" id="file-upload" multiple required />
                                <label for="file-upload">أرفاق السيرة الذاتية</label>
                                <div id="file-upload-filename"></div>

                    </div>
                    <div class="log-check form2"> 
                       <label class="container">أوافق على 
                       <a href="policies.php" class="white check-hover">شروط الخدمة وسياسة الخصوصية</a>
                              <input type="checkbox" name="polices" class="check-mark-style" required>
                              <span class="checkmark"></span>
                        </label>
                    </div>               
                    <input type="submit" class="form2 sent-btn btn white contact-input" value="تسجيل مستخدم جديد" >
                    </form>
                </div>
                
            
            </section> 
        
            <?php include_once("footer.php"); ?>

            
        
        
        

        <script src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/datatables.min.js"></script>  
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/locales/bootstrap-datepicker.de.min.js"></script> 
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/js.js"></script>
        <script src="loadMore/js/loadMoreResults.js"></script>
        <script src="js/jquery.dotdotdot.js"></script>



    </body>
</html>
