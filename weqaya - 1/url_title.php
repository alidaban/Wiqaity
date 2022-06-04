<?php
 include_once 'DB.php';
    $sql = "SELECT id,question FROM questions";
    $articlesResult = $conn->query($sql);
    $total = get_total('questions');
    //echo $total;
    if ($articlesResult->num_rows > 0) {
        while($row = $articlesResult->fetch_assoc()) { 
        	$id = $row['id'];
        	$title = $row['question'];
        	$new_title = str_replace(" ","-",$title);
        	$sql = "UPDATE questions SET `url_title`='$new_title' WHERE `id` = $id ";
			if (mysqli_query($conn, $sql)) {
			    echo "Record updated successfully<br/>";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}


        }
    }
    echo "<br/>--------------<br/>";

    $sql = "SELECT id,title FROM experiences";
    $articlesResult = $conn->query($sql);
    $total = get_total('experiences');
    //echo $total;
    if ($articlesResult->num_rows > 0) {
        while($row = $articlesResult->fetch_assoc()) { 
            $id = $row['id'];
            $title = $row['title'];
            $new_title = str_replace(" ","-",$title);
            $sql = "UPDATE experiences SET `url_title`='$new_title' WHERE `id` = $id ";
            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully<br/>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }


        }
    }
    echo "<br/>--------------<br/>";

    $sql = "SELECT id,title FROM articles";
    $articlesResult = $conn->query($sql);
    $total = get_total('articles');
    //echo $total;
    if ($articlesResult->num_rows > 0) {
        while($row = $articlesResult->fetch_assoc()) { 
            $id = $row['id'];
            $title = $row['title'];
            $new_title = str_replace(" ","-",$title);
            $sql = "UPDATE articles SET `url_title`='$new_title' WHERE `id` = $id ";
            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully<br/>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }


        }
    }
    echo "<br/>--------------<br/>";


?>