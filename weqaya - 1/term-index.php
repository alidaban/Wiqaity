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
    <link href="css/term-index.css"type="text/css" rel="stylesheet">
    
        
    <link rel="shortcut icon" type="image/x-icon" href="images/Group_2_copy.png" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
    <title>المصطلحات</title>



    </head>
    <body>
<?php include_once("header.php"); ?> 
        <section class="wall">
            <div class="row">
                <div class="path">
                    <a href="index.php">الرئيسية</a>
                    <i class="ion-chevron-left"></i>
                    <a href="#">المصطلحات</a>
                </div>
                <!--Alerts from bootstrap-->
                

                <div class="search-box">
                    <form class="search-form">
                        <button href="#" type="submit" class="search-icon"><i class="ion-search "></i></button>
                        <input type="text" id = ajax_search class="search-text" placeholder="البحث عن مصطلح">
                    
                    </form>
                </div>
             
                
                
                <div class="clear"></div>
                <?php 
                    $sql = "SELECT `term`, `definition` FROM terminologies where `deleted`=0 limit 5 ";//non deleted
                    $articlesResult = $conn->query($sql);
                    $totalsql = "SELECT COUNT(id) as total FROM terminologies where `deleted`=0";//non deleted
                    $totalResult = $conn->query($totalsql);

                    $total_array = $totalResult->fetch_assoc();
                    $total = $total_array["total"];
                    //echo $total['total']+"";
                    if ($articlesResult->num_rows > 0) {
                ?>

                <ul id=list <?php if ($total > 4) { echo 'class="wall-box loadMore"'; } ?>>
                <?php 
                    while($row = $articlesResult->fetch_assoc()) { 
                    //$id = $row['id'];

                    $title = strip_tags($row['term']);
                    $content = strip_tags($row['definition']);

                ?>                    

                    <li class="inner-wall-box item " style="display: block;">
                        <div class="art-back">
                            <div class="inform">
                                <div class="art-header">
                                    <p>
                                        <p><?php echo strip_tags($title);?></p>
                                    </p>
                                </div>

                            </div>
                            <div >
                                <p >
                                <?php echo strip_tags($content);?>
                                </p>
                            </div>
                        </div>
                    </li>

                    <?php 
                }
                    } 
                    ?>
                </ul>
                <!--display just when the wall is empty-->
                <div id=warning class="warnning-none">
                    <div class="warnning-icon"><i class="ion-alert"></i></div>
                    <div class="warnning-p">عذرا لا توجد بيانات لعرضها</div>
                
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
        <script language=javascript>
            $(document).ready(function () {
                var flag_search = false;
            var init = 5;//what row to start when click load more
            //to retrieve ajax data
            var total = <?php echo $total; ?>;
            $(".btn-load-more").click(function () {
                if(flag_search){
                    var txt = $("#ajax_search").val();
                    //init = 5;
                    $.getJSON(
                        'Controller/get_terms_search_json.php', //الرابط اللي طالبينه
                        {'sinit': init , 'q':txt}, //عشان الكاش
                        function (data) {//دالة النجاح
                            total = data.total;

                            if(init >= total-5)//if no need for load more button
                                $(".btn-load-more").hide();
                            else
                                $(".btn-load-more").show();

                           /* $(".result").html("Name : " + data.Name + "<br>Age : " + 
                            data.Age + "<br>Edu[0]:" + data.Edu[0] +
                            "<br>Edu[1]:" + data.Edu[1]);*/
                            for(var i=0;i<data.details.length;i++){
                                //$(".list").append("<b>Text</b>: "+data.details[i].text+", <b>Value</b>: "+data.details[i].value+"<br/>");
                                $("#list").append('<li class="inner-wall-box item " style="display: block;"> <div class="art-back"> <div class="inform">  <div class="art-header">  <p>  <p>' + data.details[i].term + '</p>  </p>  </div>  </div>  <div id="fos">  <p >  ' + data.details[i].definition + ' </p>  </div>  </div> </li>');
                            }

                        init = init + 5;
                    });
///////////////////////////////////////
                }else{
                    $.getJSON(
                    'Controller/get_terms_json.php', //الرابط اللي طالبينه
                    {'init': init }, //عشان الكاش
                    function (data) {//دالة النجاح
                       /* $(".result").html("Name : " + data.Name + "<br>Age : " + 
                        data.Age + "<br>Edu[0]:" + data.Edu[0] +
                        "<br>Edu[1]:" + data.Edu[1]);*/
                        for(var i=0;i<data.details.length;i++){
                            //$(".list").append("<b>Text</b>: "+data.details[i].text+", <b>Value</b>: "+data.details[i].value+"<br/>");
                            if(init >= total-5)
                            $(".btn-load-more").hide();
                            $("#list").append('<li class="inner-wall-box item " style="display: block;"> <div class="art-back"> <div class="inform">  <div class="art-header">  <p>  <p>'+data.details[i].term+'</p>  </p>  </div>  </div>  <div id="fos">  <p >  '+data.details[i].definition+' </p>  </div>  </div> </li>');
                        }

                        init = init + 5;
                    });
                }
        });
            //get data when seach ajax first time
            
            $( ".search-form" ).submit(function(event) {
                flag_search = true;//flag for search
                var sinit = 0 ;
                  event.preventDefault();
                  $("#list").html("<li></li>");
                  var txt = $("#ajax_search").val();
                  if(txt==""){
                    flag_search = false;
                    location.reload();
                  }else{
                    $.getJSON(
                        'Controller/get_terms_search_json.php', //الرابط اللي طالبينه
                        {'sinit': sinit , 'q':txt}, 
                        function (data) {//دالة النجاح
                            if(data.success){
                                total = data.total;  
                                //alert("total: "+total+" init: "+sinit);
                                if(sinit >= total-5)//to hide the loadmore button when no more 
                                    $(".btn-load-more").hide();
                                else
                                $(".btn-load-more").show();

                                // alert("total: " + total);
                               /* $(".result").html("Name : " + data.Name + "<br>Age : " + 
                                data.Age + "<br>Edu[0]:" + data.Edu[0] +
                                "<br>Edu[1]:" + data.Edu[1]);*/
                                for(var i=0;i<data.details.length;i++){
                                    //$(".list").append("<b>Text</b>: "+data.details[i].text+", <b>Value</b>: "+data.details[i].value+"<br/>");
                                    $("#list").append('<li class="inner-wall-box item " style="display: block;"> <div class="art-back"> <div class="inform">  <div class="art-header">  <p>  <p>'+data.details[i].term+'</p>  </p>  </div>  </div>  <div id="fos">  <p >  '+data.details[i].definition+' </p>  </div>  </div> </li>');
                                }
                            }else{//if no data
                                $(".btn-load-more").hide();
                                $("#warning").css({"display":"visible","display": "flex","height":"500px","padding-top":"150px"});
                            }
                        sinit = sinit + 5;
                    });
                  }
            });
});
            


        </script>

    </body>
</html>
