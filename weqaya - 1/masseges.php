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

    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/style.css"type="text/css" rel="stylesheet">

    <link href="css/queries.css"type="text/css" rel="stylesheet">
    
        
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>الرسائل</title>
     





    </head>
    <body>
        
            <?php include_once("header.php"); ?> 


            <div class="confirm-block-box">
                <div><i class="ion-close-circled"></i></div>
                

                <div class="block-cont">
                    <div>حظر حساب مستخدم</div>
                    <div>هل انت متأكد انك تريد حظر هذا الشخص، لن يظهر لك مرة اخرى
    يمكنك اعادة فك الحظر عنه في الاعدادات</div>
                    <input type="button" class="btn btn-4" value="موافق">
                </div>
                
            
            </div>


            <div class="message-back">
            <div class="masseges">
                <span class="contacts-message">
                    <div class="message-title">المحادثات</div>
                    <div class="message-menu ">
                        <div class="message-menu">
                            <ul class="notif-box load-more3">

                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf read-message">
                                            <!--report-button-->
                                            <div class="more-div three-dots-message" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-more message-del" ></i></a></div>
                                            <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                                <li class="block-person"><a href="#">حذف</a></li>

                                            </ul>
                                            <!--report-button-->
                                            
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf ">
                                           <div class="more-div three-dots-message" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-more message-del" ></i></a></div>
                                            <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                            <li class="block-person"><a href="#">حذف</a></li>

                                            </ul>
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf read-message">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf read-message">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf ">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf ">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf read-message">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf ">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="item2">
                                    <div class="one-message">
                                        <div class="user-icon-back">
                                            <i class="ion-android-person"></i>
                                            
                                        </div>
                                        <div class="message-inf read-message">
                                            <span class="font-size">د أحمد حسن</span>
                                            <span>15:03</span>
                                            <span>31/5/2018</span>
                                            <div class="three-dot">وعليكم السلام ورحمة الله وبركاته</div>
                                       
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div>
                            </div>
                        </div>
                    </div>
                </span>
                <span class="massege-box">
                    <div class="message-title">د.احمد حسن</div>
                    <div>اخصائي اورام سرطانية</div>
                    <div class="message-boxs3">
                    <div class="message-boxs2">

                            <div class="load-more-notif-btn2">عرض المزيد</div></div>
                    <div class="message-boxs">
                     
                        <div class="time-of-massege">31-5-2018 15:04</div>
                        <div class="recive-box">
                            <div class="recive">يوجد عدة اسباب ممكنة لمثل هذه الاعراض. مثل
     تـغيرات في الـثدي او مشــاكل القـلب او حتى
    مشـاكل في الكـتف. لـذلك يفضل مراجعة الـطبيب
     للتأكد منها</div>
                        </div>
                        <div class="sender-box">
                        <div class="sender">عندي وخز في الثدي الأيسر وحرقان وكذلك تحت
     الابط ويمتد أحيانا الى الكتف ولوحة الكتف فما
     السبب؟
    </div>

                        </div>
                        <div class="recive-box">
                            <div class="recive">يوجد عدة اسباب ممكنة لمثل هذه الاعراض. مثل
     تـغيرات في الـثدي او مشــاكل القـلب او حتى
    مشـاكل في الكـتف. لـذلك يفضل مراجعة الـطبيب
     للتأكد منها</div>
                        </div>
                        <div class="sender-box">
                        <div class="sender">عندي وخز في الثدي الأيسر وحرقان وكذلك تحت
     الابط ويمتد أحيانا الى الكتف ولوحة الكتف فما
     السبب؟
    </div>

                        </div>
                        <div class="recive-box">
                            <div class="recive">يوجد عدة اسباب ممكنة لمثل هذه الاعراض. مثل
     تـغيرات في الـثدي او مشــاكل القـلب او حتى
    مشـاكل في الكـتف. لـذلك يفضل مراجعة الـطبيب
     للتأكد منها</div>
                        </div>
                        <div class="sender-box">
                        <div class="sender">عندي وخز في الثدي الأيسر وحرقان وكذلك تحت
     الابط ويمتد أحيانا الى الكتف ولوحة الكتف فما
     السبب؟
    </div>

                        </div>
                        <div class="recive-box">
                            <div class="recive">يوجد عدة اسباب ممكنة لمثل هذه الاعراض. مثل
     تـغيرات في الـثدي او مشــاكل القـلب او حتى
    مشـاكل في الكـتف. لـذلك يفضل مراجعة الـطبيب
     للتأكد منها</div>
                        </div>
                        <div class="sender-box">
                        <div class="sender">عندي وخز في الثدي الأيسر وحرقان وكذلك تحت
     الابط ويمتد أحيانا الى الكتف ولوحة الكتف فما
     السبب؟
    </div>

                        </div>
                        <div class="recive-box">
                            <div class="recive">يوجد عدة اسباب ممكنة لمثل هذه الاعراض. مثل
     تـغيرات في الـثدي او مشــاكل القـلب او حتى
    مشـاكل في الكـتف. لـذلك يفضل مراجعة الـطبيب
     للتأكد منها</div>
                        </div>
                        <div class="sender-box">
                        <div class="sender">عندي وخز في الثدي الأيسر وحرقان وكذلك تحت
     الابط ويمتد أحيانا الى الكتف ولوحة الكتف فما
     السبب؟
    </div>

                        </div>
                        <div class="recive-box">
                            <div class="recive">يوجد عدة اسباب ممكنة لمثل هذه الاعراض. مثل
     تـغيرات في الـثدي او مشــاكل القـلب او حتى
    مشـاكل في الكـتف. لـذلك يفضل مراجعة الـطبيب
     للتأكد منها</div>
                        </div>
                        <div class="sender-box">
                        <div class="sender">عندي وخز في الثدي الأيسر وحرقان وكذلك تحت
     الابط ويمتد أحيانا الى الكتف ولوحة الكتف فما
     السبب؟
    </div>
                        </div>
                            </div>

                        </div>
                    <form class="writting-back">
                        <input type="text" placeholder="كتابة رسالة" class="writing-box">
                        <i class="ion-document-text upload-writting-text">                                <input type="file" class="hide_file">
                        </i>
                        <input type="submit" class="hide-sub">
                        
                    </form>

                    
                
                </span>


            </div> 
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
