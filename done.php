<?php
  include 'connection.php';
  session_start();
    include 'logged.php';
  $id=$_GET['doneid'];
  $status="Registered";
  $sql="UPDATE `studentRecord` SET `status` = '$status' WHERE `studentRecord`.`id`=$id";

    $result=mysqli_query($con,$sql);

    if ($result) {
      
      header('location:Rstudents.php');
    } else {
      die(mysqli_error($con));
    }

?>