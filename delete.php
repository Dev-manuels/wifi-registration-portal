<?php
  include 'connection.php';


  if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $sql="delete from studentRecord where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
      // echo "deleted succesfully";
      header('location:Rstudents.php');
    }else{
      die(mysqli_error($con));
    }
  }

?>