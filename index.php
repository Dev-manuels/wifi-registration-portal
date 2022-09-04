<!-- <?php
  include 'connection.php';

  $output="";

  if(isset($_POST['Login'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    
    if(empty($email)){
      $output .= "Email address can not be Empty";
    } else if(empty($pass)){
      $output .= "Enter valid Password";
    } else {
      $query = " SELECT * FROM admins WHERE email='$email' AND password = '$pass'";
      $res = mysqli_query($con,$query);

      if(mysqli_num_rows($res) == 1){
          header('location:dashboard.php');
      }else {
          $output .= "Enter valid user credentials";
      }

    }

  }

?>
 -->











<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
  </head>
  <body>
  <?php include 'header.php'; ?>
    

  </body>
</html>
