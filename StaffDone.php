<?php
  include 'connection.php';
  session_start();
    include 'logged.php';

  $id=$_GET['doneid'];
  $status="Registered";
  $sql="UPDATE `staffRecord` SET `status` = '$status' WHERE `staffRecord`.`id`=$id";

    $result=mysqli_query($con,$sql);

    if ($result) {
      
      header('location:Rstaffs.php');
    } else {
      die(mysqli_error($con));
    }

?>