<?php 

include_once "../DB.php";

$from = $_GET['sinit'];
$limit =  5;
$q = Clear($_GET['q']);
$result = $conn->query("SELECT  `term`, `definition` FROM `terminologies` WHERE `deleted` = 0 AND (`term` LIKE '%".$q."%' OR `definition` LIKE '%".$q."%') LIMIT $limit OFFSET $from");

$countResult = $conn->query("SELECT count(id) as total FROM `terminologies` WHERE `deleted` = 0 AND (`term` LIKE '%".$q."%' OR `definition` LIKE '%".$q."%')");
$countfetch = $countResult->fetch_assoc();
$count = 0;
if(isset($countfetch["total"]))
    $count = $countfetch["total"];
$response;
if ($result->num_rows > 0) 
{
    // looping through all results
    // products node
    $response["details"] = array();
    while ($row = $result->fetch_assoc())
    {
        // temp user array
        $term = array();

        $term["term"] = str_replace($q,"<span style=background-color:#ffd891; >".$q."</span>",strip_tags($row["term"]));

        $term["definition"] = str_replace($q,"<span style=background-color:#ffd891; >".$q."</span>",strip_tags($row["definition"]));

        array_push($response["details"],$term);

    }

    $response["total"] = $count;
    
    // success
    $response["success"] = 1;

    // echoing JSON response
    //var_dump($response);
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
}else {
    $response["total"] = 0;
    
    // success
    $response["success"] = 0;
    echo json_encode($response,JSON_UNESCAPED_UNICODE);

}

?>