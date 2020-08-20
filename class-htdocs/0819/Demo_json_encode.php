<?php 

header("content-type:text/html; charset=utf-8");

// 0. 請先建立 Class 資料庫 （執行 class.sql）

// 1. 連接資料庫伺服器
$link = mysqli_connect("localhost", "root", "root") or die(mysqli_error());

mysqli_query($link,"set names utf8");
mysqli_select_db($link,"class");

// 2. 執行 SQL 敘述
$commandText = "select * from students";
$result = mysqli_query($link,$commandText);

// $row = mysql_fetch_assoc($result);
// $row = mysql_fetch_row($result);
// $row = mysql_fetch_array($result);

$row = mysqli_fetch_assoc($result);

$json = json_encode($row);

echo $json;
// var_dump($row);

?>