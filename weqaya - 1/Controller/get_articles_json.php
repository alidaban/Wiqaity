<?php 
include_once "../DB.php";

$type = "article";//article, experience, question
$from = $_GET['init'];
$limit =  5;

$result = $conn->query("SELECT `id`, `title`, `content`, `date`, `image`, `source`, `writer` FROM `articles` WHERE `deleted` = 0 LIMIT $limit OFFSET $from");
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
        //$article["content"] = substr($article["content"],0,350);
/*        echo '<div style="height:100; overflow:hidden; borders:2px" >';
echo $row["content"]."<br>";
echo '</div>';
        echo '<div style="height:100; overflow:hidden; borders:2px" >';

echo trim($row["content"])."<br>";
echo '</div>';
        echo '<div style="height:100; overflow:hidden; borders:2px" >';

echo stripslashes(trim($row["content"]))."<br>";
echo '</div>';
        echo '<div style="height:100; overflow:hidden; borders:2px" >';

echo removeTAGS(stripslashes(trim($row["content"])))."<br>";
echo '</div>';
        echo '<div style="height:100; overflow:hidden; borders:2px" >';

echo removeTAGS(stripslashes(trim($row["content"])))."<br>";
echo '</div>';
        echo '<div style="height:100; overflow:hidden; borders:2px" >';

echo string_limit_words(removeTAGS(stripslashes(trim($row["content"]))),50)."<br>";
echo '</div>';
        echo '<div style="height:100; overflow:hidden; borders:2px" >';

echo "<br><br><br><br>";
        echo '</div>';
*/
        $article["date"] = Clear(convert_to_UTF8(strip_tags($row["date"])));

        $article["image"] = Clear(convert_to_UTF8(strip_tags($row["image"])));

        $article["source"] = Clear(convert_to_UTF8(strip_tags($row["source"])));

        $article["writer"] = Clear(convert_to_UTF8(strip_tags($row["writer"])));

        

        array_push($response["details"],$article);

    }

    $response["type"] = $type;//article, experience, question

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