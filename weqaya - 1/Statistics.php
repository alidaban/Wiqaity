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
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    <link href="css/term-index.css"type="text/css" rel="stylesheet">
    <link href="css/Statistics.css"type="text/css" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    
        
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>الأحصائيات</title>



    </head>
    <body>
<?php include_once("header.php"); ?> 

        <section class="wall">
            <div class="row">
                <!--Alerts from bootstrap-->
                

                <div class="path">
                    <a href="#">الرئيسية</a>
                    <i class="ion-chevron-left"></i>

                    <a href="#">أحصائيات</a>
                
                </div>
             
                
                
                <div class="clear"></div>
                    <div class="inner-wall-box item " style="display: block;">
                        <div class="img-static-back"> 
                            <div class="art-header">
                                <a href="#"><p>احصائيات مرض السرطان لعام 2012</p></a>
                            </div>
                            <div class="static-gradient"></div>

                                <img src="images/rawpixel-603645-unsplash.png" class="statics-img">
                        </div>
                            <div id="chart_div"></div>


                        <div class="art-back">
                            
                            

                            
                            <div id="columnchart_values" ></div>


                        </div>
                        
                        <div class="share-source">
                            <div class="edit-statis-text1"><span class="edit-statis-text">المصدر: </span> منظمة الصحة العالمية</div>
                            <div class="h-line-sm"></div>
                            <div class="edit-statis-text1">مشاركة الأحصائية</div>
                            <div class="social-icon ">
                                    <a href="#"><div class="f-icon"><i class="ion-social-facebook"></i></div></a>

                                    <a href="#"><div class="icon-back-f w-icon"><i class="ion-social-whatsapp-outline white"></i></div></a>
                                    <a href="#"><div class="icon-back-f t-icon margin-left"><i class="ion-social-twitter white"></i></div></a>

                            </div>
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
