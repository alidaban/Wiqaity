<!DOCTYPE html>
<html lang="ar">
<?php include_once 'DB.php'; ?>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!--<link href="css/normalize.css"type="text/css" rel="stylesheet">-->
    <link href="css/ionicons.css"type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet" type="text/css">
    <link href="loadMore/css/style.css"type="text/css" rel="stylesheet">
    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    <link href="css/about-us.css"type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css"/>
    <link href="css/style.css"type="text/css" rel="stylesheet">
    <link href="css/Profile.css"type="text/css" rel="stylesheet">        
    <link href="css/wall.css"type="text/css" rel="stylesheet">
        
    
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>ملف الطبيب</title>



    </head>
    <body>
<?php include_once("header.php"); ?> 

        <div class="wall" style="
      padding-bottom: 30px;">
          <!--  <div class="alert alert-success alert-style alert-report" role="alert">تم أرسال أبلاغك بنجاح سيتم مراجعته بأقرب فرصة</div>
            <div class="alert alert-success alert-style alert-block" role="alert">تم الحظر بنجاح</div>
 
            <div class="confirm-block-box">
                <div><i class="ion-close-circled"></i></div>
                

                <div class="block-cont">
                    <div>حظر حساب مستخدم</div>
                    <div>هل انت متأكد انك تريد حظر هذا الشخص، لن يظهر لك مرة اخرى
    يمكنك اعادة فك الحظر عنه في الاعدادات</div>
                    <input type="button" class="btn btn-4" value="موافق">
                </div>
                
            
            </div>
                <div class="text-box ask-box">
                    <form class="quis-form">
                        <div class="ask-p">الأبلاغ عن هذا الشخص</div>
                        <div class="text-input">
                            <textarea placeholder="أكتب أبلاغك عن هذا الشخص" class="text-area-input"></textarea>
                            <a href="#" class="attach-icon"><i class="ion-document-text"></i></a>
                        </div>
            
            
                        <input type="submit" class="submit-btn btn wall-submit-btn" value="أرسل"> 
                    </form>
                </div> -->
                <?php 
                if(isset($_GET['id'])){
                    $id =  $_GET['id'];
                    $sql = "SELECT u.fname as fname, u.lname as lname, u.dob as dob, u.nationality as nationality, u.image as image, d.university as university, d.specilize as speciality, d.degree as degree, d.graduated_year as yog FROM user as u JOIN doctors as d ON u.id = d.id_user WHERE u.id = $id";
                    $articlesResult = $conn->query($sql);
                    if ($articlesResult->num_rows > 0) {
                        $row = $articlesResult->fetch_assoc();
                        $name = $row['fname']." ".$row['lname'];
                        $image = "icons/pink_doctor_big.png";//default image
                        if(isset($row['image']))
                        $image = $row['image'];

                        $speciality = $row['speciality'];
                        $degree = $row['degree'];
                        $graduated_year = $row['yog'];
                        $nationality = $row['nationality'];
                        $dob = $row['dob'];
                        $university = $row['university'];
                    
                 ?>
            <div class="about-us-box ">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="profile-photo-back">
                            <div class="profile-photo-border">

                                <img src="images/<?php echo $image; ?>">
                            </div>
                                                
                        </div>
                    </div>



                    <div class="col-sm-6 btns-style row-1" style="height: 34px;">
                        <!-- <a href="#" class="btn btn-1"><i class="ion-android-mail"></i><span class="btn-p">ارسل رسالة</span></a>
                        <a href="#" class="btn btn-2"><i class="ion-ios-compose-outline"></i><span class="btn-2-text">تعديل المعلومات</span></a>
                         -->
                     
                        

                    </div>
                    <!-- <div class="col-sm-2">
                       <div class="profile-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-more" ></i></a></div>
                        <ul class="dropdown-menu dropdown-menu-more-pro-1 dropdownMenu-more" aria-labelledby="dropdownMenu3">
                            <li class="report-person"><a href="#">ابلاغ</a></li>
                            <li class="block-person"><a href="#">حظر هذا الشخص</a></li>

                        </ul>
                    </div> -->
                </div>
                <form>
                    <div class="row">
                        <div class="doc-name col-sm-12">د. <?php echo $name; ?></div>
                    </div>
                    
<!--                     <div class="row">
                        <div class="col-sm-4"><div>البريد الألكتروني</div></div>
                        <div class="col-sm-8"><div>Moh.Yasser@gmail.com</div></div>
                    </div>
 -->                    <div class="row">
                        <div class="col-sm-4"><div>الدولة</div></div>
                        <div class="col-sm-8"><div><?php echo $nationality; ?></div></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div>تاريخ الميلاد</div></div>
                        <div class="col-sm-8">
                            <?php echo $dob; ?>
                            </div>
                                
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div>التخصص</div></div>
                        <div class="col-sm-8"><div><?php echo $speciality; ?></div></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div>الدرجة العلمية</div></div>
                        <div class="col-sm-8"><div><?php echo $degree; ?> </div></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div>سنة التخرج</div></div>
                        <div class="col-sm-8"><div><?php echo $graduated_year; ?></div></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div>الجامعة</div></div>
                        <div class="col-sm-8"><div><?php echo $university; ?></div></div>

                    </div>
                    
                </form>
            </div>
<?php }} ?>
<!--                 <div class="profile-title">المقالات</div>
 --><!-- wall start -->
<!--                <div class="wall-1">
            <div class="row">

                <ul class="wall-box loadMore">
                    <li class="inner-wall-box item " style="display: block;">
                        <div class="wall-image">
                            <img src="images/awareness-cancer-design-579474.png" class="articl-img">
                    </div>

                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header"><a href="#"><p>ماهو مرض سرطان الثدي؟</p></a></div>
                                <div class="date-p"><p>Jun 3, 2018  15:04</p></div>
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-more" ></i></a></div>
                                <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                    <li class="block-person"><a href="#">ابلاغ</a></li>

                                </ul>
                            </div>
                            <div id="fos">
                                <p >
مباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع

                                </p>
                            </div>
                            <span class="for-more"><a href="#" >لقراءة المزيد...</a></span>
                        </div>
                    </li>   
        

                    <li class="inner-wall-box item">
                        <div class="wall-image">
                            <img src="images/awareness-cancer-design-579474.png" class="articl-img">
                        </div>
                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header"><a href="#"><p>ماهو مرض سرطان الثدي؟</p></a></div>
                                <div class="date-p"><p>Jun 3, 2018  15:04</p></div>
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-ios-more" ></i></a></div>
                                <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                    <li ><a href="#">ابلاغ</a></li>

                                </ul>
                            </div>
                            <div id="fos">
                                <p >
مباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسي

                                </p>
                            </div>
                        </div>
                    </li> 
                    

                    
                    <li class="inner-wall-box item">
                        <div class="wall-image">
                            <img src="images/awareness-cancer-design-579474.png" class="articl-img">
                        </div>
                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header"><a href="#"><p>ماهو مرض سرطان الثدي؟</p></a></div>
                                <div class="date-p"><p>Jun 3, 2018  15:04</p></div>
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-ios-more" ></i></a></div>
                                <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                    <li><a href="#">ابلاغ</a></li>

                                </ul>
                            </div>
                            <div id="fos">
                                <p >
مباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسي

                                </p>
                            </div>
                        </div>
                    </li>
                    

                    
                    <li class="inner-wall-box item">
                        <div class="wall-image">
                            <img src="images/awareness-cancer-design-579474.png" class="articl-img">
                        </div>
                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header"><a href="#"><p>ماهو مرض سرطان الثدي؟</p></a></div>
                                <div class="date-p"><p>Jun 3, 2018  15:04</p></div>
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-ios-more" ></i></a></div>
                                <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                    <li><a href="#">ابلاغ</a></li>

                                </ul>
                            </div>
                            <div id="fos">
                                <p >
مباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسي

                                </p>
                            </div>
                        </div>
                    </li>  
                    

                    
                    
                    <li class="inner-wall-box item">
                        <div class="wall-image">
                            <img src="images/awareness-cancer-design-579474.png" class="articl-img">
                        </div>
                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header"><a href="#"><p>ماهو مرض سرطان الثدي؟</p></a></div>
                                <div class="date-p"><p>Jun 3, 2018  15:04</p></div>
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-ios-more" ></i></a></div>
                                <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                    <li><a href="#">ابلاغ</a></li>

                                </ul>
                            </div>
                            <div id="fos">
                                <p >
مباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع المنتخب الفرنسيمباراة لعبها مع نهاية المنتخب الفرنسيمباراة لعبها مع المنتخب 
                                     الفرنسي

                                </p>
                            </div>
                        </div>
                    </li>
                    

                
                </ul>
            
            </div>
        
        </div>    -->
        <!-- wall end -->

         </div>   
  
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
