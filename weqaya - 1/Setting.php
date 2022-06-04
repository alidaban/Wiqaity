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
    <link href="loadMore/css/style.css"type="text/css" rel="stylesheet">
    <link href="css/wall.css"type="text/css" rel="stylesheet">
    <link href="css/style.css"type="text/css" rel="stylesheet">

    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/term-index.css"type="text/css" rel="stylesheet">
    <link href="css/Statistics.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">

    
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
        
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>الأعدادات</title>



    </head>
    <body>
<?php include_once("header.php"); ?> 

        <section class="wall">
            <div class="row">
                <!--Alerts from bootstrap-->
                

                <div class="path">
                    <a href="#">الرئيسية</a>
                    <i class="ion-chevron-left"></i>
                    <a href="#">الأعدادات</a>
                
                </div>
             
                
                
                <div class="clear"></div>
                    <div class="inner-wall-box item " style="display: block;">
                        <div class="img-static-back"> 
                            <div class="art-header">
                                <a href="#"><p>الاعدادات</p></a>
                            </div>
                            <div class="static-gradient"></div>

                                <img src="images/computer-3343887_1920.png" class="statics-img">
                        </div>
                        <div class="background-setting">
                        <div class="title-setting"> الخصوصية</div>
                        <form>
                        <div class="options">
                            <div class="fst-options">
                            <div class="fst-right-setting">
                               <div class="dis-flex">
                                       <div class="option">من يرى صورة الملف الشخصي:</div>
                                    <select class="form-control  profile-select" id="sel1">
                                    <option>لا أحد</option>
                                    <option>الأطباء</option>
                                    <option> العامة </option>
                                    </select>
                                </div>
                                 <div class="dis-flex">
                             <div class="option">من يرى منشوراتي:</div>                                       <select class="form-control  profile-select" id="sel1">
                                    <option>لا أحد</option>
                                    <option>الأطباء</option>
                                    <option> العامة </option>

                                  </select>
                                </div>
                                <div class="dis-flex">
                                    <div class="option">من يستطيع ان يرى تعليقاتي:</div>
                                    <select class="form-control  profile-select" id="sel1">
                                        <option>العامة</option>
                                        <option>صاحب التعليق/المنشور</option>
                                     </select>
                                </div>
                                <div class="dis-flex"><div class="option">من يمكنه مراسلتي:</div> 
                                <select class="form-control  profile-select" id="sel1">
                                    <option>الأطباء فقط</option>
                                    <option>العامة</option>

                                </select>
                                </div>
                                <div class="dis-flex"><div class="option">من يمكنه الوصول لملفي الشخصي:</div>
                                <select class="form-control  profile-select" id="sel1">
                                <option>الأطباء فقط</option>
                                <option>العامة</option>
                                </select>
                                </div>
                            </div>
                            <div>
       



                           

                            </div>
                            </div>
                            <div class="setting-h-line"></div>
                            <div class="clear"></div>
                            <div class="title-setting"> الاشعارات</div>
                            <div class="snd-marg">
                                <div class="marg-1">استقبال الاشعارات عند نشر التالي</div>





                                <div class="fst-check">
                                    <div>
                                        <label class="container">نشر مقالات طبية
                                              <input type="checkbox" checked="checked">
                                              <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="container">تجارب المستخدمين
                                              <input type="checkbox" checked="checked">
                                              <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="container">الاجابة على اسئلة
                                              <input type="checkbox" checked="checked">
                                              <span class="checkmark"></span>
                                        </label>
                                    </div>
                                 </div>
                                <div>
                                    <label class="container">استقبال الاشعارات على سطح المكتب
                                          <input type="checkbox" checked="checked">
                                          <span class="checkmark"></span>
                                    </label>
                                </div>
                                    <div>
                                        <label class="container">استقبال الاشعارات على البريد الألكتروني
                                              <input type="checkbox" checked="checked">
                                              <span class="checkmark"></span>
                                        </label>
                                    </div>
                            </div>
                            <div class="setting-h-line"></div>
                            <div class="title-setting">قائمة المحظورين</div>
                            <div class="marg-1 marg-3">لايوجد محظورين لعرضهم</div>
                            <div>
                                <ul class="list-of-ban">   
                                    <li class="ban-person"><i class="ion-close-circled close-ban"></i>عامر سليم</li>
                                    <li class="ban-person"><i class="ion-close-circled close-ban"></i>احمد كمال</li>
                                    <li class="ban-person"><i class="ion-close-circled close-ban"></i>رامي حسن</li>
                                </ul>
                            </div>

                        </div>
                        
                        </form>
                            </div>
                            
                        
                    </div>
                        
                   
                <!--display just when the wall is empty-->
                <div class="warnning-none">
                    <div class="warnning-icon"><i class="ion-alert"></i></div>
                    <div class="warnning-p">عذرا لايوجد شيئ لعرضه</div>
                
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
        <script src="js/loader.js"></script>
        <script src="js/Gjs.js"></script>s


    </body>
</html>
