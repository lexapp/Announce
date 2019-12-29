<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Announce // LHS</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/83a6e55483.js" crossorigin="anonymous"></script>
<script src="main.js"></script>
  </head>
  <body>
    <body class="fullscreen">
  <div class="container">
  <div id="header">
          <h1 class="title">News</h1>
        </div>
    <div class="margins">
      <div id="myCont">
    <a href="login.php">Admin Login</a>
    <br><br>
<?php

$host=""; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name=""; // Database name
$tbl_name=""; // Table name

$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
$result=mysql_query($sql);

while($rows=mysql_fetch_array($result)){
  $links = $rows['links'];
  $linksArray = explode(',', $links);
  if ($links == ""){
    unset($linksArray);
  }
?>
<div class="newsBox">
      <h2><?php echo $rows['title'] ?></h2>
      <h4><?php echo $rows['date'] ?></h4>
      <p><?php echo $rows['news'] ?></p>
      <?php
      if (!empty($linksArray)){
        ?>
      <span><i>Links associated with this post:</i>
      <? } ?>
      <?php
      foreach($linksArray as $link) {
        ?><a href="<? echo $link ?>">Here</a></span>
        <?
    }
    ?>
      <div class = "del">
      <span><a href='delete.php?id="<?php echo $rows['id'] ?>"'>Delete</a>&nbsp&nbsp<a href='update_news.php?id="<?php echo $rows['id'] ?>"'>Update</a>
      <br>
      </div>
  </div>
<br>
<?php
}
mysql_close();
?>
    <!-- FOOTER HERE -->
    <br>
    <div class="icon-bar">
  <a href="/index.html"><i class="fa fa-home"></i></a> 
  <a class="active" href="/news.php"><i class="fa fa-newspaper"></i></a>
  <a href="/settings.php"><i class="fa fa-cogs"></i></a>  
</div>
<script>
  $('.del').hide()
  var isAdmi = localStorage.getItem('isAdmin')
  if (isAdmi == 1){
    $('.del').show();
  }
  </script>