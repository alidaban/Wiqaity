<?php 
include_once "../DB.php";

//$type = "article";//article, experience, question
$from = $_GET['init'];
$limit =  5;

$result = $conn->query("SELECT id,title,image,content,`date`,type FROM(
                    SELECT id,title,image,content,`date`,('article') as type FROM articles as a WHERE `deleted` = 0
                    UNION ALL
                    SELECT id,title,image,story as content,`date`,('expereince') as type FROM experiences as e WHERE `deleted` = 0
                    UNION ALL
                    SELECT id,question as title,image,answer as content,`date`,('question') as type FROM questions as q WHERE `deleted` = 0) as w
                    ORDER BY `date` desc LIMIT $limit OFFSET $from");
//to get the total

/*
$total_result = $conn->query("SELECT COUNT(`id`) as total FROM `articles` WHERE `deleted` = 0");
$total_array = get_result_array($total_result);
$total = $total_array["total"];
*/
$total = get_total('articles');
//$count = $conn->query("SELECT count(id) FROM terminologies ");
if ($result->num_rows > 0) 
{
    // looping through all results
    // products node
    $response["details"] = array();
    while ($row = $result->fetch_assoc())
    {
        // temp user array
        $article = array();

        $article["id"] = convert_to_UTF8(Clear(strip_tags($row["id"])));

        $article["title"] = convert_to_UTF8(Clear(strip_tags($row["title"])));

        //short content
        $article["content"] = string_limit_words(removeTAGS(stripslashes(trim($row["content"]))),50);

        $article["date"] = Clear(convert_to_UTF8(strip_tags($row["date"])));

        $article["image"] = Clear(convert_to_UTF8(strip_tags($row["image"])));

        $article["type"] = $row["type"];


        

        array_push($response["details"],$article);

    }

    //$response["type"] = $type;//article, experience, question

    $response["total"] = $total;
    // success
    $response["success"] = 1;
    // echoing JSON response
    //var_dump($response);
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
}
//code to handle image find and resize
/*

                            $imgHeight=350;
                            $imgWeidth=650;
                            if(file_exists ( 'images/height_'.$imgHeight.'/'.$image )){
                                    echo '<img src="images/height_'.$imgHeight.'/'.$image.'" class="articl-img" />';
                            }
                            else{
                            include_once 'ImageResizer.php';
                            ali_img_resize($image, $imgWeidth, $imgHeight);
                            echo "<image href= >;
*/
?>