<?php

$dbServerName = "mysql";
$dbUserName = "root";
$dbPassword = "tiger";
$dbName = "wordapp";

$dbConn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
$sql = ("SET CHARACTER SET utf8"); $dbConn->query($sql);
if (!mysqli_set_charset($dbConn, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($dbConn));
    exit();
} else {
    printf("Current character set: %s\n", mysqli_character_set_name($dbConn));
}