<?php
//print_r($_GET);
//echo $_GET["userId"]
require_once "./connect.php";
$sql="DELETE FROM user WHERE `user`.`id`= $_GET[userId]";
$conn->query($sql);

if($conn->affected_rows == 0){
  $deleteUser = 0;
}else{
  $deleteUser = $_GET["userId"];
}


header("location:../1_db_table.php?deleteUser=$deleteUser");
