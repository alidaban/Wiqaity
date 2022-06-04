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
    <link href="css/owl.carousel.min.css" type="text/css" rel="stylesheet">
    <link href="css/owl.theme.default.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet" type="text/css">
    <link href="css/style.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>الرئيسية</title>

 

    </head>
    <body>
    <?php include_once("index_header.php"); 
//        print_r($_SESSION);
    ?>
        <div class="row header-con">
                    <div class="img-1"><img src="images/Layer%2018-2.png"></div>
                    <div class="main-p">
                        <div><p class="p-1">البوابة العربية الاولى التي تختص بسرطان
 الثدي</p></div>
                        <div><p class="p-2"><q> شبكة تختص بنشر الوعي عن سرطان الثدي في العالم العربي، عن طريق
    <br />نشر المعلومات والتقارير من قبل مختصين والاجابة عن تساؤلاتهم </q></p></div>

                    </div>
                    <?php 
                    // echo "<div>";
                    // print_r($_SESSION);
                    // echo "</div>";
                    //if there is no session print login and sign up
                    if(!isset($_SESSION) && !isset($_COOKIE)){
                        echo'<div class="buttons">
                        <a href="login.php">
                        <div class="btn btn-full">تسجيل الدخول</div></a>
                        <a href="SignUp-User.php">
                        <div class="btn btn-ghost">مستخدم جديد</div>
                        </a>
                    </div>';
                    }
                    else{
                        //if there is session or cookies make sure he is not loged in
                    if(!(isset($_SESSION['loged']) && $_SESSION['loged'] == true) && !(isset($_COOKIE["loged"]) && $_COOKIE["loged"]==true ))
                    { ?>
                    <div class="buttons">
                        <a href="login.php">
                        <div class="btn btn-full">تسجيل الدخول</div></a>
                        <a href="SignUp-User.php">
                        <div class="btn btn-ghost">مستخدم جديد</div>
                        </a>
                    </div>
                    <?php }} ?>
                </div>
                
            
            </section>
            <section class="our-services">
                <div class="row">
                    <h1>خدماتنا</h1>
                    <div class="col-sm-3 one-section">
                        <div class="icon-back"><i class="ion-chatbox"></i></div>
                        <h3>اعرف اكثر</h3>
                        <p>عن انواع سرطان الثدي واعراضه
                        <br />المبكرة ليتم تشخيصه مبكرا</p>
                    </div>
                    
                    <div class="col-sm-3 one-section">
                        <div class="icon-back"><i class="ion-chatboxes"></i></div>
                        <h3>تواصل</h3>
                        <p>مع الاعضاء والمختصين والمجربين
                        <br />من قبلك لتستفيد من خبراتهم</p>
                    </div>
                    
                    <div class="col-sm-3 one-section">
                        <div class="icon-back"><i class="ion-iphone"></i></div>
                        <h3>اطرح سؤالا</h3>
                        <p>على اطباء سرطان الثدي
<br />لتحصل على النصيحة منهم</p>
                    </div>
                    
                    
                    <div class="col-sm-3 one-section">
                        <div class="icon-back"><i class="ion-social-buffer"></i></div>
                        <h3>احصل على مساعدة</h3>
                        <p>من خلال المعلومات والتقارير المطروحة
                        <br />في الموقع ومساعدة المختصين</p>
                    </div>
                </div>
            
            </section>
            <section class="midcal-articles">
                <h1>مقالات طبية</h1>
                <div class="row">
                <?php 
                    $sql = "SELECT id,title,image,content FROM articles where deleted = 0 LIMIT 4";
                    $articlesResult = $conn->query($sql);
                    if ($articlesResult->num_rows > 0) {
                    while($row = $articlesResult->fetch_assoc()) { 
					$id = $row['id'];
                ?>

                    <div class="col-md-3">
                        <a href="article.php?id=<?php echo $id; ?>&type=article">
                            <div class="back-img">
                                <div class="art-hover">
                                </div>
                                <?php 
                                
                                $dbimg = $row["image"];
                                //var_dump($dbimg);
                                if(file_exists ( 'images/height_167/'.$dbimg )){
                                    echo '<img src="images/height_167/'.$dbimg.'" class="our-img" />';
                                }
                                else{
                                    $imgHeight=167;
                                    $imgWeidth=222;

                                    /*//$im = imagecreatefrompng('images/'.$dbimg);
                                    $im = imagecreatefrompng('images/1-3.jpg');
                                    $size = min($imgWeidth, $imgHeight);
                                    $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
                                    if ($im2 !== FALSE) {
                                        imagepng($im2, 'images/height_167/'.$dbimg);
                                        imagedestroy($im2);
                                    }
                                    imagedestroy($im);*/

                                    // include_once 'lib/imageresize.class.php';
                                    // $imageResize = new ImageResize();
                                    // $imageResize->resize();

                                    include_once 'ImageResizer.php';
                                    //$dbimg =str_replace(" ","_",$dbimg);
                                    ali_img_resize($dbimg, $imgWeidth, $imgHeight);

                                     echo '<img src="images/height_167/'.$dbimg.'" class="our-img" />';

                                    /*include_once 'lib/ImageResize.php';
                                    $image = new \Gumlet\ImageResize();
                                    $image = new ImageResize('images/'.$dbimg);
                                    $image->resizeToHeight(167);

                                    $image->save('images/height_167'.$dbimg);*/

                                    //echo '<img src="images/height_167/$dbimg class="our-img" />';

                                }
                                ?>

                                    <div class="art-p1">

                                        <p ><?php

                                         echo string_limit_words(removeTAGS(stripslashes(trim($row["title"]))),50); ?></p>
                                    </div>

                            </div>
                        </a>
                        <a href="article.php?id=<?php echo $id; ?>&type=article">
                            <div class="art-p2">
                                    <p><?php
                                         $rest = string_limit_words(removeTAGS(stripslashes(trim($row["content"]))), 15);  // returns "abcde"
                                         echo $rest."..."; ?>
                                    </p>
                            </div>
                        </a>
                    </div>
                    <?php 
                }
            }
            ?>
                    
                </div>
            </section>      
            <section class="doctors-consultant">
                    <h1>الأطباء والاستشاريين</h1>
                    <!-- start of awl carousel -->

                    <div id="owl-carousel" class="owl-carousel owl-theme">
                <?php 
                    $sql = "SELECT u.id, u.fname, u.lname, u.image, d.specilize 
                        FROM user as u
                        INNER JOIN doctors as d ON u.id = d.id_user 
                        where u.deleted = 0
                        LIMIT 8";
                    $articlesResult = $conn->query($sql);
                    if ($articlesResult->num_rows > 0) {
                    while($row = $articlesResult->fetch_assoc()) { 
                //    echo $row['id']."<br>";
                //}}

                ?>
                    <!-- start of doctor item -->
                      <div class="item">
                          <div >
                                <div class="svg0">
                                <a href="doctor-profile.php?id=<?php echo $row["id"]; ?>" >
                                    <div class="svg ccc">
                                        
                                        <?php
                                $dbimg = $row["image"];
                                
                                if(file_exists ( 'images/height_222/'.$dbimg )){
                                    echo '<img src="images/height_222/'.$dbimg.'" class="cons-img" />';
                                }
                                else{
                                    $imgHeight=222;
                                    $imgWeidth=222;
                                    include_once 'ImageResizer.php';
                                    ali_img_resize($dbimg, $imgWeidth, $imgHeight);

                                     echo '<img src="images/height_222/'.$dbimg.'" class="cons-img" />';
}
                                    ?>

<!--                                             <img src="images/team1.jpg" class="cons-img">
 -->                                        
                                    </div>
                                    </a>
                                </div>
                                <a href="doctor-profile.php?id=<?php echo $row["id"]; ?>" >
                                    <div class="doc-p">
                                        <h3 style="color: #fff"><?php echo $row["fname"]." ".$row["lname"]; ?></h3>
                                        <p style="color: #fff"><?php echo $row["specilize"]; ?></p>

                                    </div>
                                </a>
                            </div>
                      </div>
                    <!-- end of doctor item -->
                    <?php }} ?>
                    </div>
                    <!-- end of awl carousel -->
            </section>
            <section class="stories">
                <h1>تجارب اشخاص اخرين</h1>
                
                <div id="owl-carousel2" class="owl-carousel owl-theme">
                <?php 
                    $sql = "SELECT id,title,image,story FROM experiences WHERE deleted = 0 LIMIT 12";
                    $expResult = $conn->query($sql);
                    if ($expResult->num_rows > 0) {
                        while($row = $expResult->fetch_assoc()) { 
                            $id = $row['id'];
                ?>
                        <div class="item">
                                <a href="article.php?id=<?php echo $id; ?>&type=expereince">
                                    <div class="back-img">
                                        <div class="story-hover">
                                        </div>
                                            <div class="story-p1">
                                                <p> <?php echo $row["title"] ?> </p>
                                            </div>
                                        <?php
                                         $dbimg=$row["image"];
                                         if(file_exists ( 'images/height_167/'.$dbimg )){
                                            echo '<img src="images/height_167/'.$dbimg.'" class="our-img" />';
                                         }
                                         else{
                                            $imgHeight=167;
                                            $imgWeidth=222;
                                            include_once 'ImageResizer.php';
                                            ali_img_resize($dbimg, $imgWeidth, $imgHeight);

                                            echo '<img src="images/height_167/'.$dbimg.'" class="our-img" />';
                                         }
                                        ?>
                                    </div>
                                </a>
                                <a href="article.php?id=<?php echo $id; ?>&type=expereince">
                                    <div class="story-p2">
                                            <p><?php
                                         $rest = string_limit_words(removeTAGS(stripslashes(trim($row["story"]))), 15);  // returns "abcde"
                                         echo $rest."..."; ?></p>
                                    </div>
                                </a>
                         </div>
                <?php
                         }
                     }
                ?>

                   
                </div>
            
            </section>
            <section class="contact-us">
            <form class="contact-form" id="contact_form">
                    <h2>تواصل معنا</h2>
                    <?php if (is_loged()){ ?>
                    <div class="contact-input">
                    <input id="name" name="name" type="text" value="<?php echo get_user_name() ?>" placeholder="الاسم"></div>
                    <div  class="contact-input">
                    <input id="email" name="email" type="text" value="<?php echo get_email() ?>" placeholder="البريد الالكتروني"></div>
                    <?php } else { ?>
                    <div class="contact-input">
                    <input id="name" name="name" type="text" placeholder="الاسم"></div>
                    <div class="contact-input">
                    <input id="email" name="email" type="text" placeholder="البريد الالكتروني"></div>
                    <?php } ?>
                    <div class="contact-input">
                    <input id="subject" name="subject" type="text" placeholder="الموضوع"></div>
                    <div class="contact-input contact-input2">
                    <textarea id="message" name="message" placeholder="الرسالة"></textarea></div>
                    <input type="submit" id="submit_contact_form" class="submit-btn btn" value="أرسل" >
                
                </form>
                <div id="report_form_success_message" class="alert alert-success alert-style alert-report" role="alert">شكرا لك، تم أرسال رسالتك بنجاح سيتم مراجعتها بأقرب وقت</div>


            </section>
            <?php include_once("footer.php"); ?>
        </div>
        

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/js.js"></script>
        <script src="loadMore/js/loadMoreResults.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
                                });
                    });

                </script>

    </body>
</html>