<?php 
include_once "../DB.php";

$type = "question";//article, experience, question
$from = $_GET['sinit'];
$limit =  5;
$q = Clear($_GET['q']);

$result = $conn->query("SELECT `id`, `question`, `answer`, `date`, `image`, `writer` FROM `questions` WHERE `deleted` = 0 AND (question LIKE '%".$q."%' OR answer LIKE '%".$q."%') LIMIT $limit OFFSET $from");

$total_result = $conn->query("SELECT count(`id`) as total FROM `questions` WHERE `deleted` = 0 AND (question LIKE '%".$q."%' OR answer LIKE '%".$q."%') ");
$total_array = get_result_array($total_result);
$total = $total_array["total"];

//to get the total

/*
$total_result = $conn->query("SELECT COUNT(`id`) as total FROM `articles` WHERE `deleted` = 0");
$total_array = get_result_array($total_result);
$total = $total_array["total"];
*/
// $total = get_total('questions');
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

        $article["title"] = str_replace($q,"<span style=background-color:#ffd891; >".$q."</span>",convert_to_UTF8(Clear(strip_tags($row["question"]))));

        //short content
        $article["content"] = str_replace($q,"<span style=background-color:#ffd891; >".$q."</span>",string_limit_words(removeTAGS(stripslashes(trim($row["answer"]))),50));

        $article["date"] = Clear(convert_to_UTF8(strip_tags($row["date"])));

        $article["image"] = Clear(convert_to_UTF8(strip_tags($row["image"])));

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
else {
    $response["total"] = 0;
    
    // success
    $response["success"] = 0;
    echo json_encode($response,JSON_UNESCAPED_UNICODE);

}

?>