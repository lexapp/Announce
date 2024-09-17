<?php

$host=""; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name=""; // Database name
$tbl_name=""; // Table name

// Connect to server and select database.
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$topic = $_POST['title'];
$detail = $_POST['news'];
$datetime = date("m/d/y H:i");
$link = $_POST['links'];

$sql="INSERT INTO $tbl_name(date, title, news, links)VALUES('$datetime', '$topic', '$detail', '$link')";
$result=mysql_query($sql);


if($result){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enter News</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
<body class="fullscreen">
  <div class="container">
    <div class="margins">
        <h1 class="title">Success!</h1>
        <p>The news has been recorded and posted.</p>
        <a href="/news.php">Click to go back</a>
        <?php
    }
    else {
    echo "ERROR";
    }
    mysql_close();
