<?php
  include 'connection.php';


  if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $sql="delete from staffRecord where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
      // echo "deleted succesfully";
      header('location:Rstaffs.php');
    }else{
      die(mysqli_error($con));
    }
  }

?>