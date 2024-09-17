<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/83a6e55483.js" crossorigin="anonymous"></script>
<script src="main.js"></script>
<script>
    if (localStorage.getItem('isAdmin') != 1){
    localStorage.setItem("isAdmin", 0);
    } else{
        window.location.replace("https://lhsannounce.xyz/enterNews.html");
    }
</script>
  </head>
  <body>
    <body class="fullscreen">
  <div class="container">
    <div class="margins">
    <h1 class="title">Login</h1>
    <form method="post" action="login.php">
        Password:<br>
        <input name="pass" type="password">
        <input type="submit" name="Submit">
        <br><br>
        <a href="news.php">Go back to news</a>
        <?php
$host=""; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name=""; // Database name
$tbl_name=""; // Table name

$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name";
$result = mysql_query($sql);

while($rows=mysql_fetch_array($result)){
$password = $rows['pass'];
}
$er = $_POST['pass'];

if ($er == $password){
    ?>
    <script type="text/javascript"> 
    localStorage.setItem("isAdmin", 1); 
    location.reload();
</script> 
<?php
}