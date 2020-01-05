<?php
include_once "includes/dbHelper.inc.php";

$user_id = $_GET["user_id"];
$sql = "DELETE FROM user WHERE user_id=".$user_id;
$result = mysqli_query($dbConn, $sql);

?>


