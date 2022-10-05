<?php
  include 'connection.php';

  $id=$_GET['doneid'];


  $sql="select * from `staffRecord` where id=$id";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $StaffId=$row['staffid'];
  $surname=$row['surname'];
  $other=$row['other'];
  $Username=$row['username'];
  $password=$row['password'];
  $status="Registered";


  $sql="update `staffRecord` set id=$id,staffId='$StaffId',surname='$surname',other='$other',username='$Username',password='$password',status='$status'  where id=$id";

    $result=mysqli_query($con,$sql);

    if ($result) {
      
      header('location:dashboard.php');
    } else {
      die(mysqli_error($con));
    }

?>