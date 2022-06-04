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
    <link href="css/about-us.css"type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css"/>
    <link href="css/style.css"type="text/css" rel="stylesheet">
    <link href="css/Profile.css"type="text/css" rel="stylesheet">        
    <link href="css/wall.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">

        
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    
        
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>الملف الشخصي</title>



    </head>
    <body>
<?php include_once("header.php"); ?> 
                <div id="report_form_success_message" class="alert alert-success alert-style alert-report" role="alert">تم تعديل بياناتك بنجاح</div>

        <div class="wall" style="padding-bottom: 30px;">
<!--             <div class="alert alert-success alert-style alert-report" role="alert">تم أرسال أبلاغك بنجاح سيتم مراجعته بأقرب فرصة</div>
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
                </div>

 -->        
            <?php

                    $email =  get_email();
                    //echo $email;
                    $sql = "SELECT fname, lname, dob, nationality, image FROM user WHERE email = '$email'";
                    $Result = $conn->query($sql);
                    if ($Result->num_rows > 0) {
                        $row = $Result->fetch_assoc();
                        $fname = $row['fname'];
                        $lname = $row['lname'];

                        $image = "icons/pink_user_big.png";//default image
                        if(isset($row['image']))
                        $image = $row['image'];

                        $email = $email;
                        $nationality = $row['nationality'];
                        $dob = $row['dob'];
                        
            ?>   

             <!-- start box -->
            <div class="about-us-box ">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="profile-photo-back">
                            <div class="profile-photo-border">
                                <img src="images/<?php echo $image ?>">
                            </div>
                              <!--                   
                        <div class="blus-back ">
                                <input type="file" class="hide_file">
                                <i class="ion-plus blus-circled"></i>
                        </div> -->
                        </div>
                    </div>



                    <div class="col-sm-6 btns-style row-1">
<!--                         <a href="#" class="btn btn-1"><i class="ion-android-mail"></i><span class="btn-p">ارسل رسالة</span></a>
                         -->                        <a href="#" class="btn btn-2"><i class="ion-ios-compose-outline"></i><span class="btn-2-text">تعديل المعلومات</span></a>
                        
                     
                        

                    </div>
                    <div class="col-sm-2">
<!--                        <div class="profile-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-more more-color" ></i></a></div>
                        <ul class="dropdown-menu dropdown-menu-more-pro-1 dropdownMenu-more" aria-labelledby="dropdownMenu3">
                            <li class="report-person"><a href="#">ابلاغ</a></li>
                            <li class="block-person"><a href="#">حظر هذا الشخص</a></li>

                        </ul>
 -->                    </div>
                </div>
                <form id="update_user_form">
                    <div class="row">
                        <div class="col-sm-4"><div class="margin-buttom-form">الأسم الأول</div></div>
                        <div class="col-sm-8">
                        <input name="fname" type="text" class="prfile-input" value="<?php echo $fname ?>"></div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-4"><div class="margin-buttom-form">الأسم الأخير</div></div>
                        <div class="col-sm-8">
                        <input name="lname" type="text" class="prfile-input"value="<?php echo $lname ?>"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div class="margin-buttom-form">البريد الألكتروني</div></div>
                        <div class="col-sm-8">
                        <input name="email" type="text" class="prfile-input" value="<?php echo $email ?>"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div class="margin-buttom-form">الدولة</div></div>
                        <div class="col-sm-8">
                            <select name="nationality" class="form-control prfile-input profile-select" id="sel1"   >
                                <option>اختر دولة</option>

                                <option>فلسطين</option>
                                <option>جيبوتى</option>
                                <option> عمان </option>
                                <option>اليمن</option>
                                <option>الكويت</option>
                                <option>السودان</option>
                                <option>تونس</option>
                                <option>سوريا</option>
                                <option>لبنان</option>
                                <option>العراق</option>
                                <option>الاردن</option>
                                <option>الصومال</option>
                                <option>قطر</option>
                                <option>البحرين</option>
                                <option>الجزائر</option>
                                <option>المغرب</option>
                                <option>ليبيا</option>
                                <option>السعودية</option>
                                <option>مصر</option>
                                <option>الامارات العربية المتحدة </option>
                                <option>جزر القمر</option>
                              </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><div class="margin-buttom-form">تاريخ الميلاد</div></div>
                        <div class="col-sm-8">
                            <div class="input-group date" data-provide="datepicker">
                                <input  id="datepicker" name="dob" value="<?php echo $dob; ?>" data-date-format="yyyy-mm-dd" type="text" class="form-control form-control-profile prfile-input datepicker"style="    width: 372px;
    height: 37px;
    border-radius: 7px;
    text-align: right;
    border: 1px black solid;
                                " >
<input type="hidden" id="dbdatepicker" name="dbdatepicker" value="<?php echo $dob; ?>" data-date-format="yyyy-mm-dd">
                                <div class="input-group-addon">
                                </div>
                            </div>
                                
                        </div>
                    </div>
                    <div class="row"><a href="#">طلب تغيير كلمة المرور</a></div>
                    <input type="submit" value="حفظ التعديلات" class="btn btn-3" id="submit_edit_user">
                </form>
            </div>
            <!-- end box -->
            <?php } ?>
<!--             <div id="1" class="profile-title">تجارب</div>

           <div class="wall-1">
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
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-more " ></i></a></div>
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
        
        </div>   
         -->
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
<script type="text/javascript">
    $.fn.datepicker.defaults.format = "yyyy-mm-dd";


$(document).ready(function () {

    $('#datepicker').datepicker({
    dateFormat: 'mm-dd-yyyy', altField: '#dbdatepicker', altFormat: 'mm-dd-yyyy',
});

});
</script>
                <script language=javascript>
                    $("#submit_edit_user").click(function(e) {
                            e.preventDefault();//to disable link

                        $.post('Controller/update_user.php', $('#update_user_form').serialize(),
                            function (data) {//الانتهاء من العملية
                                    //alert(data);
                                   // $('.text-box').removeClass('open');//to hide the form
                                    $('#report_form_success_message').css('display','block');
                                     setTimeout(function(){
                                    $('#report_form_success_message').fadeOut(2500);
                                        }, 1500);
                                    //window.location.replace("index.php")
                                });
                    });

                </script>



    </body>
</html>
