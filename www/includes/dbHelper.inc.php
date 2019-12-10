<?php

$dbServerName = "mysql";
$dbUserName = "root";
$dbPassword = "tiger";
$dbName = "wordapp";

$dbConn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
if (!mysqli_set_charset($link, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
    exit();
} else {
    printf("Current character set: %s\n", mysqli_character_set_name($link));
}