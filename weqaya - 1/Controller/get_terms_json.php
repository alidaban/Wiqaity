
<?php 

include_once "../DB.php";

$from = $_GET['init'];
$limit =  5;

$result = $conn->query("SELECT `id`, `term`, `definition` FROM `terminologies` WHERE `deleted` = 0 LIMIT $limit OFFSET $from");
//$count = $conn->query("SELECT count(id) FROM terminologies ");
if ($result->num_rows > 0) 
{
    // looping through all results
    // products node
    $response["details"] = array();
    while ($row = $result->fetch_assoc())
    {
        // temp user array
        $term = array();

        $term["id"] = strip_tags($row["id"]);

        $term["term"] = strip_tags($row["term"]);

        $term["definition"] = strip_tags($row["definition"]);

        array_push($response["details"],$term);

    }

    // success
    $response["success"] = 1;

    // echoing JSON response
    //var_dump($response);
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
}

?>