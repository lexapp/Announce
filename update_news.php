<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enter News</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=1" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/83a6e55483.js" crossorigin="anonymous"></script>
  </head>
<body class="fullscreen">
  <div class="container">
    <div class="margins">
      <div id = admin>
        <h1 class="title">Update News</h1>
        <br>

<?php
$id = $_GET['id'];
$host=""; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name=""; // Database name
$tbl_name=""; // Table name

// Connect to server and select database.
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM news WHERE id=$id";
$result=mysql_query($sql);

while($rows=mysql_fetch_array($result)){
?>
        <form method="post" action="/upnews.php">
                News ID **DO NOT EDIT**<br>
                <input type="text" name="id" value="<?php echo $rows['id'] ?>"><br><br>
                Title of News:<br>
                <input type="text" name="title" value="<?php echo $rows['title'] ?>"><br><br>
                Content of News:<br>
                <textarea name="news" cols="35" rows="5"><?php echo $rows['news'] ?></textarea><br><br>
                Links Associated with This News:<br>
                <textarea name="links" cols="35" rows="5"><?php echo $rows['links'] ?></textarea><br><br>
                <input type="submit" value="Update">
        </form>
<?php } ?>