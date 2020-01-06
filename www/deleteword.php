<?php
include_once "includes/dbHelper.inc.php";

$word_id = $_GET["word_id"];
$sql = "DELETE FROM stat WHERE word_id=".$word_id;
$result = mysqli_query($dbConn, $sql);
$sql = "DELETE FROM word WHERE word_id=".$word_id;
$result = mysqli_query($dbConn, $sql);

?>


