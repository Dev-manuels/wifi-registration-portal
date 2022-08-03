<?php
  include 'connection.php';

  $id=$_GET['doneid'];


  $sql="select * from `studentRecord` where id=$id";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $matric=$row['matric'];
  $surname=$row['surname'];
  $other=$row['other'];
  $phone=$row['phone'];
  $mac=$row['mac'];
  $status="Registered";


  $sql="update `studentRecord` set id=$id,matric='$matric',surname='$surname',other='$other',phone='$phone',mac='$mac',status='$status'  where id=$id";

    $result=mysqli_query($con,$sql);

    if ($result) {
      
      header('location:dashboard.php');
    } else {
      die(mysqli_error($con));
    }

?>