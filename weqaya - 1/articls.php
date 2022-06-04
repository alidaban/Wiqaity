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
    <link href="css/style.css"type="text/css" rel="stylesheet">
    <link href="css/wall.css"type="text/css" rel="stylesheet">
    <link href="css/style-login.css"type="text/css" rel="stylesheet">
    <link href="css/queries.css"type="text/css" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
        
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>المقالات</title>



    </head>
    <body>
<?php include_once("header.php"); ?> 

        <section class="wall">
                <?php 
                    $sql = "SELECT id,title,image,content,`date` FROM articles WHERE `deleted` = 0 LIMIT 5";
                    $articlesResult = $conn->query($sql);
                    $total = get_total('articles');
                    //echo $total;
                    if ($articlesResult->num_rows > 0) {

                ?>
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

            <div class="row">
                <div class="path">
                    <a href="index.php">الرئيسية</a>
                    <i class="ion-chevron-left"></i>
                    <a href="#">المقالات</a>
                    </div>
                <ul id=list <?php if ($total > 5) { echo 'class="wall-box loadMore"'; } ?> >
                <?php 
                    while($row = $articlesResult->fetch_assoc()) { 
                    $id = $row['id'];

                    $title = removeTAGS($row['title']);
                    $image = removeTAGS($row['image']);
                    $content = removeTAGS($row['content']);
                    $shortCont = string_limit_words(removeTAGS(stripslashes(trim($row["content"]))),50);
                    $date = $row['date'];
                    $type = 'article';//article/expereince/question

                ?>
                    <li class="inner-wall-box item " style="display: block;">
                        <div class="wall-image">
                            <a href="article.php?id=<?php echo $id;?>&type=<?php echo $type; ?>" >
                            <?php 

                            $imgHeight=350;
                            $imgWeidth=650;
                            if(file_exists ( 'images/height_'.$imgHeight.'/'.$image )){
                                    echo '<img src="images/height_'.$imgHeight.'/'.$image.'" class="articl-img" />';
                            }
                            else{
                            include_once 'ImageResizer.php';
                            ali_img_resize($image, $imgWeidth, $imgHeight);

                        echo '<img src="images/height_'.$imgHeight.'/'.$image.'" class="articl-img" />';

                            //echo<img src="images/awareness-cancer-design-579474.png" class="articl-img">;
                            
                            }
                            ?>
                            </a>
                        </div>
                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header"><a href="article.php?id=<?php echo $id; ?>&type=<?php echo $type; ?>">
                                <p>
                                <?php echo $title;?>
                                </p></a></div>
                                <div class="date-p"><p class="time_zone" >
                                <?php echo $date;?>
                                </p></div>
                                
                                <div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php
                                //report option just for loged users
                                if(is_loged()){
                                ?><a href="#"> <i class="ion-more" ></i></a>
                                <?php } ?></div>
                                
                                <ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3">
                                    <li id=report><a post_id=<?php echo $id; ?> post_type=<?php echo $type; ?> href="#">ابلاغ</a></li>

                                </ul>
                                
                            </div>
                            <div id="fos">
                                <p >

<?php echo $shortCont; ?>   
<span class="for-more">
<a href="article.php?id=<?php echo $id;?>&type=<?php echo $type; ?>" >قراءة المزيد
</a>
</span>

                                </p>
                            </div>
                        </div>
                    </li>  
                    <?php 
                }
                    } 
                    ?>
        
                </ul>
            
            </div>
        </section>   
        
                    <?php include_once("footer.php"); ?>

        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/js.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="loadMore/js/loadMoreResults.js"></script>
        <script src="js/jquery.dotdotdot.js"></script>
        <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>

                <script language=javascript>
        //get data when click load more
            $(document).ready(function () {
            var init = 5;//what row to start when click load more
            //to retrieve ajax data
            var total = <?php echo $total; ?>;
            var is_loged = <?php if(is_loged()){echo "true";} else {echo "false";}  ?>;

            var offset = new Date().getTimezoneOffset();

            $(".btn-load-more").click(function () {
                $.getJSON(
                    'Controller/get_articles_json.php', //الرابط اللي طالبينه
                    {'init': init }, //sent data
                    function (data) {//دالة النجاح
                       
                        for(var i=0;i<data.details.length;i++){
                            var id = data.details[i].id;
                            var type = data.type;
                            var title = data.details[i].title;
                            var images = data.details[i].image;
                            var date = data.details[i].date;
                            //get the local time
                            date = moment.utc(date,'YYYY-MM-DD HH:mm:ss').subtract(offset,'m').format('YYYY-MM-DD h:mm a')
                            //alert(date);
                            var short_content = data.details[i].content;
                            if(init >= total-5)
                            $(".btn-load-more").hide();
                        //to show or hide the report option button
                        if(is_loged){
                            $("#list").append('<li class="inner-wall-box item " style="display: block;"><div class="wall-image"><a href="article.php?id='+ id +'&type='+ type +'"><img src="images/height_350/'+ images +'" class="articl-img" /></a></div><div class="art-back"><div class="inform"><div class="art-header"><a href="article.php?id='+ id +'&type='+ type +'"><p>'+ title +'</p></a></div><div class="date-p"><p class="time_zone" >'+ date +'</p></div><div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><i class="ion-more" ></i></a></div><ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3"><li id=report><a post_id='+ id +' post_type='+ type +' href="#">ابلاغ</a></li></ul></div><div id="fos"><p>'+ short_content +'<span class="for-more"><a href="article.php?id='+ id +'&type='+ type +'" >قراءة المزيد</a></span></p></div></div></li>  ');
                        }else{
                            $("#list").append('<li class="inner-wall-box item " style="display: block;"><div class="wall-image"><a href="article.php?id='+ id +'&type='+ type +'"><img src="images/height_350/'+ images +'" class="articl-img" /></a></div><div class="art-back"><div class="inform"><div class="art-header"><a href="article.php?id='+ id +'&type='+ type +'"><p>'+ title +'</p></a></div><div class="date-p"><p class="time_zone" >'+ date +'</p></div><div class="more-div" type="button" id="dropdownMenu-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></div><ul class="dropdown-menu dropdown-menu-more dropdownMenu-more" aria-labelledby="dropdownMenu3"><li id=report><a post_id='+ id +' post_type='+ type +' href="#">ابلاغ</a></li></ul></div><div id="fos"><p>'+ short_content +'<span class="for-more"><a href="article.php?id='+ id +'&type='+ type +'" >قراءة المزيد</a></span></p></div></div></li>  ');
                                 
                        }
                        
                        }
$("#fos p").dotdotdot({

      callback: function( isTruncated ) {},
      /* Function invoked after truncating the text.
         Inside this function, "this" refers to the wrapper. */

    ellipsis: "\u2026 ",
      /* The text to add as ellipsis. */

      height: 11,
      /* The (max-)height for the wrapper:
         null: measure the CSS (max-)height ones;
         a number: sets a specific height in pixels;
         "watch": re-measures the CSS (max-)height in the "watch". */

    keep: $(".for-more"),
      /* jQuery-selector for elements to keep after the ellipsis. */

      tolerance: 30,
      /* Deviation for the measured wrapper height. */

      truncate: "word",
      /* How to truncate the text: By "node", "word" or "letter". */

      watch: "window",
      /* Whether to update the ellipsis: 
         true: Monitors the wrapper width and height;
         "window": Monitors the window width and height. */

   });
                        init = init + 5;
                }); 
            });
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


});
</script>
<!-- libarary to change the time zone -->
<script language=javascript>
    $(document).ready(function () {
            var offset = new Date().getTimezoneOffset();
            $(".time_zone").each(function( index ) {
                $(this).text((moment.utc($(this).text(),'YYYY-MM-DD HH:mm:ss').subtract(offset,'m').format('YYYY-MM-DD h:mm a')));
                //console.log( index + ": " +  );
            });

       //alert(offset);
           // $(".time_zone").text(date_time)
            //$(".time_zone").text(moment.utc($(".time_zone").text(),'YYYY-MM-DD HH:mm:ss').subtract(offset,'m').format('YYYY-MM-DD h:mm a'));
            //alert(moment.utc("2018-06-13 11:56:00",'YYYY-MM-DD HH:mm:ss').subtract(offset,'m').format('YYYY-MM-DD h:mm a'));
    });

</script>
    </body>
</html>
