<?php 
include_once '../DB.php';
if(is_loged()){
	
    $text = Clear($_POST['text']);
    $article_id = $_POST['article_id'];
    $article_type = $_POST['article_type'];
    echo $text."** ".$article_id.": ".$article_id;
	$comment_reply = 0;

	if(isset($_POST['comment_reply']))
		$comment_reply = $_POST['comment_reply'];

	$var = insert_comment($text, $article_id, $article_type,$comment_reply);
	

	//$date_time = "CURRENT_TIMESTAMP";

	//echo $type." : ".$tid." : ".$message." : ".$var;

}//end is loged*/


?>