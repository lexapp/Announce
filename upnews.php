<?php

$id = $_POST['id'];
$topic = $_POST['title'];
$news = $_POST['news'];
$link = $_POST['links'];

$host=""; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name=""; // Database name
$tbl_name=""; // Table name

// Connect to server and select database.
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="UPDATE news SET title='$topic', news='$news', links='$link' WHERE id=$id";
$result=mysql_query($sql);

if($result){
    header('Location: news.php');
}

?>