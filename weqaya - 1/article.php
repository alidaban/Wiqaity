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
    <link href="css/wall.css"type="text/css" rel="stylesheet">
    <link href="css/article.css"type="text/css" rel="stylesheet">
    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
        
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>    
        <?php 
            $id = "";
            $title = "No Title";
            $image = "";
            $content = "No Content";
            $date = "";
            $source = "";
            $writer_id = "";
            $type = "";//article/expereince/question
            // we have 2 methods of get 1- by id 2- by url title
            // if url
            if(isset($_GET["url"])){
                $url = $_GET["url"];
                //echo $url;
                $sql = "SELECT `id`,`title`,`image`,`content`,`date`,`source`,`writer`,`type` FROM (
                    SELECT id,title,image,content,`date`,`source`,('article') as type,`writer` FROM articles as a WHERE `url_title` = '$url'
                    UNION ALL
                    SELECT id,title,image,story as content,`date`,`source`,('expereince') as type,`writer` FROM experiences as e WHERE `url_title` = '$url'
                    UNION ALL
                    SELECT id,question as title,image,answer as content,`date`,('') as source,('question') as type,`writer` FROM questions as q WHERE `url_title` = '$url') as w
                    ORDER BY `date` desc;";
                $articlesResult = $conn->query($sql);
                if ($articlesResult->num_rows > 0) {
                    $row = $articlesResult->fetch_assoc();
                    $type = $row["type"];
                    $id = $row["id"];
                    $title = $row['title'];
                    $image = $row['image'];
                    $content = $row['content'];
                    $date = $row['date'];
                    $source = $row['source'];
                    $writer_id = $row['writer'];
                }

            }
            // else if by id we have to check the type also cos each type has its table in the database
            else if( isset($_GET["id"]) && isset($_GET["type"]) ){
                $id = $_GET["id"];
                $type = $_GET["type"];
                $url_title = "";
                if($type == "article"){
                    $sql = "SELECT `url_title` FROM articles WHERE id = $id";
                    $articlesResult = $conn->query($sql);
                    if ($articlesResult->num_rows > 0) {
                        $row = $articlesResult->fetch_assoc();
                        $url_title = $row["url_title"];
                        header("location:article.php?url=$url_title");
                        exit();
                    }
                }
                else if($type == "expereince"){
                    $sql = "SELECT `url_title` FROM experiences WHERE id = $id";
                    $expResult = $conn->query($sql);
                    if ($expResult->num_rows > 0) {
                        $row = $expResult->fetch_assoc();
                        $url_title = $row["url_title"];
                        header("location:article.php?url=$url_title");
                        exit();
                    }
                }
                else if($type == "question"){
                    $sql = "SELECT `url_title` FROM questions WHERE id = $id";
                    $expResult = $conn->query($sql);
                    if ($expResult->num_rows > 0) {
                        $row = $expResult->fetch_assoc();
                        $url_title = $row["url_title"];
                        echo $url_title;
                        header("location:article.php?url=$url_title");
                        exit();
                    }
                }

                /*if($type == "article"){
                    $sql = "SELECT `id`,`title`,`image`,`content`,`date`,`source`,`writer` FROM articles WHERE id = $id";
                    $articlesResult = $conn->query($sql);
                    if ($articlesResult->num_rows > 0) {
                        $row = $articlesResult->fetch_assoc();
                        $title = $row['title'];
                        $image = $row['image'];

                        $content = $row['content'];
                        $date = $row['date'];
                        $source = $row['source'];
                        $writer_id = $row['writer'];

                    }
                }
                else if($type == "expereince"){
                    $sql = "SELECT id,title,image,story, writer,`date`,source FROM experiences WHERE id = $id";
                    $expResult = $conn->query($sql);
                    if ($expResult->num_rows > 0) {
                        $row = $expResult->fetch_assoc();
                        $title = $row['title'];
                        $image = $row['image'];
                        $content = $row['story'];
                        $date = $row['date'];
                        $source = $row['source'];

                        $writer_id = $row['writer'];
                    }
                }
                else if($type == "question"){
                    $sql = "SELECT id,question as title,image,answer as story, writer,`date` FROM questions WHERE id = $id";
                    $expResult = $conn->query($sql);
                    if ($expResult->num_rows > 0) {
                        $row = $expResult->fetch_assoc();
                        $title = $row['title'];
                        $image = $row['image'];
                        $content = $row['story'];
                        $date = $row['date'];
                        $writer_id = $row['writer'];
                    }
                }*/
            }
            else{//not id or title url
                header("location:error404.php");
                exit();
            }
            // print the title in the window/tab title        
            echo $title;

        ?>
    </title>
    </head>
    <body>
             <?php include_once("header.php"); ?> 
              
            
             
        <section class="wall">
            <div class="row">
 
                <div class="path">
                    <a href="index.php">الرئيسية</a>
                    
                    <?php 
                    if($type=="article"){//article/expereince/question
                        echo '<i class="ion-chevron-left"></i>';
                        echo '<a href="articles.php">مقالات طبية</a>';
                    }else if ($type=="expereince") {
                        echo '<i class="ion-chevron-left"></i>';
                        echo '<a href="experinces.php">تجارب اشخاص</a>';

                    }else if ($type=="question") {
                        echo '<i class="ion-chevron-left"></i>';
                        echo '<a href="questions.php">الاسئلة</a>';

                    }
                    ?>
                    <i class="ion-chevron-left"></i>
                    <?php echo " ".$title; ?>
                
                </div>
                                                   <!-- report form -->
                <!-- success message -->
                <div id="report_form_success_message" class="alert alert-success alert-style alert-report" role="alert">تم أرسال أبلاغك بنجاح سيتم مراجعته بأقرب فرصة</div>
                 <!-- end success message -->

                <div class="text-box ask-box">
                    <form class="quis-form" id="report_form" >
                        <div class="ask-p">الأبلاغ عن هذا المنشور</div>
                        <div class="text-input">
                            <textarea placeholder="أكتب عن ما ازعجك في المنشور" name="message" class="text-area-input"></textarea>
                            <input id="id" name="tid" type="hidden"></input>
                            <input id="type" name="type" type="hidden"></input>
                            <input id="email" name="email" type="hidden" value="<?php echo get_email() ?>"></input>
                           <!--  <a href="#" class="attach-icon">
                            <i class="ion-document-text"></i>
                            </a> -->
                        </div>
            
                        <input type="submit" id="submit_report_form" class="submit-btn btn wall-submit-btn" value="أرسل"> </input>
                    </form>
                </div>
                
                <!-- end report form -->
<!--                 <div class="article-text-box">
                    <p>الأبلاغ عن منشور</p>
                    <form>
                        <div class="text-input">
                            <textarea placeholder="أخبرنا عن ماذا أزعجك" class="text-area-input"></textarea>
                            <a href="#" class="attach-icon"><i class="ion-document-text"></i></a>
                        </div>
            
            
                        <input type="submit" class="submit-btn btn wall-submit-btn" value="أرسل"> 
                    </form>
                </div>
 -->                <div class="clear"></div>
                <div class="wall-box ">
                    <div class="inner-wall-box item">
                        <div class="wall-image">
                        <?php 

                            $imgHeight=350;
                            $imgWeidth=650;
                            if(file_exists ( 'images/height_'.$imgHeight.'/'.$image )){
                                    echo '<img src="images/height_'.$imgHeight.'/'.$image.'" class="articl-img img-responsive" />';
                            }
                            else{
                            include_once 'ImageResizer.php';
                            ali_img_resize($image, $imgWeidth, $imgHeight);

                            echo '<img src="images/height_'.$imgHeight.'/'.$image.'" class="articl-img img-responsive" />';


                            //echo <img src="images/awareness-cancer-design-579474.png" class="articl-img img-responsive">;
                            }
                            ?>
                        </div>
                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header"><p><?php echo $title; ?></p></div>
                                <div class="date-p date"><p><?php echo $date; ?></p></div>
                                
                                <?php
                                //report option just for loged users
                                if(is_loged()){
                                ?>
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-ios-more" ></i></a></div>
                                <?php } ?>

                                <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                    <li id=report>
                                        <a post_id=<?php echo $id; ?> post_type=<?php echo $type; ?> href="#">ابلاغ</a>
                                    </li>

                                </ul>
                            </div>
                            <div id="fos" class="fos">
                                <p ><?php echo $content; ?>
                                </p>
                                <!-- add source -->
                                <p>
                                <?php 

                                if( isset($source) ){
                                    //echo "source is set \n";
                                    if ($source!=null) {

                                        echo "<br/> <br/> <span style='color:#B52243; font-size: large'>المصدر: "."</span><span style='font-size: large'>".$source."</span>";
                                    }
                                }
                                ?>
                                </p>
                            </div>

                            <div class="h-line"></div>
                            <!-- if no writer then show nothing or our logo -->
                            <div class="row writer">
                            <!-- writer -->
                            <?php 
                            
                                //echo $writer_id;
                                if($writer_id){
                                    $doctor_name = "";
                                    $speciality = "";
                                    $university = "";
                                    $image = "";

                                    $sql = "SELECT u.fname as fname, u.lname as lname, u.image as image, d.id as did, d.university as university, d.specilize as speciality, d.degree as degree FROM user as u JOIN doctors as d ON u.id = d.id_user WHERE u.id = $writer_id";
                                    $expResult = $GLOBALS['conn']->query($sql);
                                    if($expResult->num_rows > 0){
                                        $row = $expResult->fetch_assoc();
                                        //echo $expResult->num_rows;
                                        $fname = $row['fname'];
                                        $lname = $row['lname'];
                                        $doctor_name = $fname." ".$lname;
                                        $speciality = $row['speciality'];
                                        $university = $row['university'];
                                        $image =  $row['image'];

                                    

                            ?>
                                <div class="col-sm-6">

                                <div class="about-writer"><p>عن الكاتب</p></div>
                                <div class="auth-detials">
                                    <div class="auth-img-back">
                                    <a href="doctor-profile.php?id=<?php echo $writer_id; ?>">
                                    <?php 
                                        if(!$image){//default
                                            echo '<img style="height: 100px;    width: 100px;" src="images/icons/white_doctor_big.png" class="doc-img">';
                                        }else{
                                            echo '<img style="height: 100px;    width: 100px;" src="images/'.$image.'" class="doc-img">';

                                        }
                                    ?>
                                    </a></div>
                                    <div class="auth-details-p">
                                        <a href="doctor-profile.php?id=<?php echo $writer_id; ?>">
                                        <p class="name"><?php echo $doctor_name; ?></p></a>
                                        <p><?php echo $speciality; ?></p>
                                        <p><?php echo $university; ?></p>
                                    </div>
                                </div>
                                </div>

                            <?php }} ?>
                            <!-- end of writer -->
                            <!-- share for social media -->
                            <?php 
                            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                            $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                            //echo $url; // Outputs: Full URL 
                            ?>
                                <div class="col-sm-6">
                                    <div class="about-writer">
                                        <p>مشاركة المنشور</p>
                                    </div>
                                    <div class="share-icons">
                                    <!-- fb share -->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="popup" 
                                        onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>','popup','width=600,height=400'); return false;">
                                            <div class="icon-back-fa f-icon">
                                                <i class="ion-social-facebook"></i>
                                            </div>
                                        </a> 
                                        <!-- whatss share -->
                                        <a href="https://wa.me/?text=<?php echo $url; ?>"
                                        target="popup" 
                                        onclick="window.open('https://wa.me/?text=<?php echo $url; ?>','popup','width=600,height=400'); return false;">
                                            <div class="icon-back-w f-icon">
                                                <i class="ion-social-whatsapp-outline"></i>
                                            </div>
                                        </a>
                                        
                                        <!-- twitter share -->
                                        <a href="http://twitter.com/share?text=<?php echo $title; ?>&url=<?php echo $url; ?>
                                        &hashtags=Weqaya,breast cancer,سرطان الثدي"
                                        target="popup" 
                                        onclick="window.open('http://twitter.com/share?text=<?php echo $title; ?>&url=<?php echo $url; ?>&hashtags=Weqaya,breast cancer,سرطان الثدي','popup','width=600,height=400'); return false;">
                                            <div class="icon-back-t f-icon">
                                                <i class="ion-social-twitter"></i>
                                            </div>
                                        </a>
 
                                    
                                    </div>
                                  
                                
                                </div>
                            
                            </div>
                            <div class="h-line"></div>

                            <!-- comments -->
                            <div class="comments">

                                <div class="about-writer"><p>التعليقات</p></div>
                                <!-- new comment form -->
                                <?php 
                                if(is_loged()){
                                    ?>
                                <div class="replay-div">
                                    <form id="comment_form">
                                    <input type="hidden" name="article_id" value="<?php echo $id; ?>"></input>
                                    <input type="hidden" name="article_type" value="<?php echo $type; ?>"></input>
                                    <input type="hidden" name="comment_reply" value="0"></input>
                                        <div class="comment">
                                            <div class="user-icon-back">
                                            <?php
                                                if(get_user_image()!=null){
                                            ?>
                                                <img src="images/<?php echo get_user_image(); ?>">
                                            <?php 
                                                }else{ 
                                            ?>
                                                <i class="ion-android-person"></i>
                                            <?php 
                                                }
                                            ?>
                                            </div>
                                            <textarea name="text" id="text" class="replay-form" placeholder="أضف رد"></textarea>
                                        </div>
                                        <a href="#"><div><div class="send-btn" >أرسال</div></div></a>
                                    </form>
                                <div class="clear"></div>
                                <?php 
                                }else{
                                    ?>
                                        لاضافة تعليق يمكنك 
                                        <form method="post" action="login.php" class="form_link_inline">
                                          <input type="hidden" name="link" value="<?php 
                                          echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; 
                                          ?>">
                                          <button type="submit" name="submit_param" value="submit_value" class="form-link-button">
                                            تسجيل الدخول 
                                          </button>
                                        </form>
                                        او
                                        <form method="post" action="SignUp-User.php" class="form_link_inline">
                                          <input type="hidden" name="link" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; ?>">
                                          <button type="submit" name="submit_param" value="submit_value" class="form-link-button">
                                            انشاء حساب جديد 
                                          </button>
                                        </form>
                                        اذا لم يكن لديك حساب بعد.

                                    <?php
                                }
                                ?>
                                </div>
                                <!-- end new comment form -->
                                <!-- show comments -->
                                <?php 
                                $user_full_name = "No Name";
                                $image = "";
                                $content = "No Content";
                                $date = "";
                                $sql = "SELECT c.`id` as id,u.`fname` as fname,u.`lname` as lname,u.`image` as image,c.`text` as content ,c.`date` as date FROM comments as c INNER JOIN user as u
                                    ON u.`id` = c.`user_id`
                                    WHERE c.`article_id` = $id AND c.`deleted`=0 AND c.`hide`=0 AND `reply_comment_id`=0 ORDER BY c.`date` desc";
                                $Result = $conn->query($sql);
                                if ($Result->num_rows > 0) {
                                    while($row = $Result->fetch_assoc()){
                                        $cid = $row['id'];
                                        $fname = $row['fname'];
                                        $lname = $row['lname'];
                                        $fullname = $fname." ".$lname;
                                        $image = $row['image'];
                                        $content = $row['content'];
                                        $date = $row['date'];


                                 ?>
                                <div class="comment">
                                    <div class="user-icon-back">
                                    <?php 
                                        if($image!=null){
                                        ?>
                                            <img src="images/<?php echo $image; ?>">
                                        <?php
                                        }else{
                                        ?>
                                            <i class="ion-android-person"></i>
                                        <?php
                                        }   
                                        ?>
                                    </div>
                                    <div class="the-comment">
                                        <div class="comment-detail">
                                            <p><?php echo $fullname."&nbsp"; ?></p>
                                            <p class="date"><?php echo $date; ?></p>
                                        </div>
                                        <div class="comment-p">
                                            <p><?php echo $content; ?></p>
                                        </div>
                                        <?php 
                                            if(is_loged()){
                                         ?>
                                        <div class="comment-btn" comment_id="<?php echo $cid; ?>">أضافة رد</div>
                                        <?php
                                            }else{
                                              ?>
                                                                                      لاضافة تعليق يمكنك 
                                        <form method="post" action="login.php" class="form_link_inline">
                                          <input type="hidden" name="link" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; ?>">
                                          <button type="submit" name="submit_param" value="submit_value" class="form-link-button">
                                            تسجيل الدخول 
                                          </button>
                                        </form>
                                        او
                                        <form method="post" action="SignUp-User.php" class="form_link_inline">
                                          <input type="hidden" name="link" value="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; ?>">
                                          <button type="submit" name="submit_param" value="submit_value" class="form-link-button">
                                            انشاء حساب جديد 
                                          </button>
                                        </form>
                                        اذا لم يكن لديك حساب بعد.

                                              <?php  
                                            }
                                        ?>

                                    </div>
                                </div>
                                <div class="clear"></div>
<!-- reply section -->
                                <?php
                                    $sql = "SELECT c.`id` as id,u.`fname` as fname,u.`lname` as lname,u.`image` as image,c.`text` as content ,c.`date` as date FROM comments as c INNER JOIN user as u
                                    ON u.`id` = c.`user_id`
                                    WHERE c.`article_id` = $id AND c.`deleted`=0 AND c.`hide`=0 AND `reply_comment_id`=$cid";
                                    $rResult = $conn->query($sql);
                                    if ($rResult->num_rows > 0) {
                                        while($rrow = $rResult->fetch_assoc()){
                                            $rcid = $rrow['id'];
                                            $rfname = $rrow['fname'];
                                            $rlname = $rrow['lname'];
                                            $rfullname = $rfname." ".$rlname;
                                            $rimage = $rrow['image'];
                                            $rcontent = $rrow['content'];
                                            $rdate = $rrow['date'];
                                            ?>
                                <!-- reply -->
                                            <div class="comment replay-of-comments">
                                                <div class="user-icon-back">
                                            <?php 
                                            if($image!=null){
                                            ?>
                                                <img src="images/<?php echo $image; ?>">
                                            <?php
                                            }else{
                                            ?>
                                                <i class="ion-android-person"></i>
                                            <?php
                                            }
                                            ?>
                                                </div>
                                                <div class="the-comment"> 
                                                    <div class="comment-detail"> 
                                                        <p><?php echo $rfullname."&nbsp"; ?></p> 
                                                        <p class="date"><?php echo $rdate; ?></p> 
                                                    </div> 
                                                    <div class="comment-p">
                                                        <p><?php echo $rcontent; ?></p>
                                                    </div> 
                                                </div> 
                                            </div>
                                

                                              <?php
                                        }}
?>
                                <?php

                                 }}
                                  ?>
                                 <!-- new reply form -->
                                <div class="replay-div1">
                                <?php 
                                if(is_loged()){
                                    ?>
                                <form id="reply_form">
                                    <input type="hidden" name="article_id" value="<?php echo $id; ?>"></input>
                                    <input type="hidden" name="article_type" value="<?php echo $type; ?>"></input>
                                    <input type="hidden" id="reply_id" name="comment_reply" value="<?php echo $cid; ?>"></input>
                                    <div class="comment">
                                        <div class="user-icon-back">
                                        <?php
                                            if(get_user_image()!=null){
                                        ?>
                                            <img src="images/<?php echo get_user_image(); ?>">
                                        <?php 
                                            }else{ 
                                        ?>
                                            <i class="ion-android-person"></i>
                                        <?php 
                                            }
                                        ?>
                                        </div>
                                        <textarea name="text" class="replay-form" placeholder="أضف رد"></textarea>
                                    </div>
                                    <a href="#"><div><div class="send-btn">أرسال</div></div></a>
                                
                                </form>
                                    <div class="clear"></div>
                                <?php
                                    }else{
                                        //show the login or register button
                                ?>

                                <?php
                                    }
                                ?>
                                </div>

                            </div>
                            <!-- end of comments -->

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
 
                <script language=javascript>
            // $(document).ready(function() {
            //     //alert("page title");
            //     var state = {},
            //     title = "<?php echo $title; ?>",
            //     path  = "/article/" + "<?php echo str_replace(' ','-',$title); ?>";

            //     window.history.pushState(state,title,path);
            // });

            //implementation of report form function
            $("#report a").click(function(e) {
                e.preventDefault();//to disable link

                    $('.text-box').addClass('open');//to open the form
                    $('.text-area-input').focus();

                    //alert(this.getAttributeNode("post_id").value+" : "+this.getAttributeNode("post_type").value);
                    var post_id = this.getAttributeNode("post_id").value;
                    var post_type = this.getAttributeNode("post_type").value;

                    $("#id").val(post_id);
                    $("#type").val(post_type);
                        //do other stuff when a click happens post_type
                //$("#report_form").css({"display":"block"});
                //alert("asad");
            });
            // end implementation of report form function
            //send report form data by ajax
            $("#submit_report_form").click(function(e) {
                    e.preventDefault();//to disable link

                $.post('Controller/send_report.php', $('#report_form').serialize(),
                    function (data) {//الانتهاء من العملية
                            //alert(data);
                            $('.text-box').removeClass('open');//to hide the form
                            $('#report_form_success_message').css('display','block');
                             setTimeout(function(){
            $('#report_form_success_message').fadeOut(2500);
            }, 1500);
                            $('.text-area-input').val("");
                        });
            });


            // reply send ///////////////////////////////
                $(".replay-div1").find('.send-btn').on('click', function(event) {
        event.preventDefault();
        $this = $(this);
        var username = "<?php echo get_user_name(); ?>";
        var date = moment().format('YYYY-MM-DD h:mm a');

        var id = "<?php echo $id; ?>";
        var type = "<?php echo $type; ?>";
        var cid = $('#reply_id').val();

            $.post('Controller/insert_comment.php', $('#reply_form').serialize(),
        function (data) {
            $this.closest(".replay-div1").after('<div class="comment replay-of-comments"> <div class="user-icon-back"><i class="ion-android-person"></i></div> <div class="the-comment"> <div class="comment-detail"> <p>'+username+'</p> <p>'+date+'</p> </div> <div class="comment-p"><p>'+$this.closest(".replay-div1").find('.replay-form').val()+'</p></div> </div> </div>');
                $('.replay-form').val("");
                $this.closest(".replay-div1").find('.replay-form').focus();   

            });
   });   
    
 
    // comment send ///////////////////////////
    $(".replay-div").find('.send-btn').on('click', function(event) {
        event.preventDefault();
        $this = $(this);
        var username = "<?php echo get_user_name(); ?>";
        var date = moment().format('YYYY-MM-DD h:mm a');
        var id = "<?php echo $id; ?>";
        var type = "<?php echo $type; ?>";
        var cid = 0;

            $.post('Controller/insert_comment.php', $('#comment_form').serialize(),
            function (data) {//الانتهاء من العملية
               
                if($this.closest(".replay-div").find('.replay-form').val()==0)
                $(".replay-form").css('border','2px solid #b52243 ');
                else{
               $this.closest(".replay-div").after('<div class="comment"> <div class="user-icon-back"><i class="ion-android-person"></i></div> <div class="the-comment"> <div class="comment-detail"> <p>'+username+'&nbsp</p> <p> &nbsp'+date+'</p> </div> <div class="comment-p"><p>'+$this.closest(".replay-div").find('.replay-form').val()+'</p></div> <div class="comment-btn">أضافة رد</div> </div> </div>');
                $('.replay-form').val("");
                $this.closest(".replay-div").find('.replay-form').focus(); } 
            });
   });

    $(document).ready(function() {


            var offset = new Date().getTimezoneOffset();

       //alert(offset);
           // $(".time_zone").text(date_time)
            //$(".date").text(moment.utc($(this).text(),'YYYY-MM-DD HH:mm:ss').subtract(offset,'m').format('YYYY-MM-DD h:mm a'));
            $(".date").each(function( index ) {
                $(this).text((moment.utc($(this).text(),'YYYY-MM-DD HH:mm:ss').subtract(offset,'m').format('YYYY-MM-DD h:mm a')));
                //console.log( index + ": " +  );
            });
        //alert($(".date").text());
    })

        </script>

    </body>
</html>
