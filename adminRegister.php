<?php
  include 'connection.php';

  $output="";

  if(isset($_POST['register'])){
    $email=$_POST['email'];
    $passc=$_POST['passc'];
    $pass=$_POST['pass'];

    $query = "SELECT * FROM admins WHERE email = '$email'";
    $res = mysqli_query($con,$query);

    if(empty($email)){
      $output .= "Email is empty";
    } else if(empty($pass)){
      $output .= "Enter Password";
    } else if(empty($passc)){
      $output .= "Confirm Password";
    }  else if(mysqli_num_rows($res) == 1){
      $output .= "Email address already exist";
    } else if($pass!==$passc){
      $output .= "Password does not match";
    } else {

      $sql="insert into `admins` (email,password) values('$email','$pass')";

      $result=mysqli_query($con,$sql);


      if ($result) {
        header('location:adminSuccess.php');
      } else {
        die(mysqli_error($con));
      }
    }

  

  }
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'links.php';?>
    <title>ADMIN-REGISTER</title>
  </head>
  <body>
  <?php include 'lheader.php';?>
    <main class="main-login">
    
      <form method="post" class="form-container">
          <div class="login-main-text">
              <h2 class="hero-text-main">Welcome to FPI Hotspot</h2>
              <h2 class="hero-text">Admin Register</h2>
          </div>
          <div style="color: red;, font-size: 2rem;"><b><?php echo $output  ?></b></div>
          <div class="form-input-container">
              <div class="form-input">
                  <label for="Email">Email:</label>
                  <input type="email" class="form-control" placeholder="Enter your Email" autocomplete="off" name="email">
              </div>

              <input type="text" name="username" style="display: none;">
              <div class="form-input">
                  <label for="Password">Password:</label>
                  <input type="password" class="form-control" placeholder="Enter your Password" autocomplete="off" name="pass">
              </div>
              <div class="form-input">
                  <label for="Confirm Password">Password:</label>
                  <input type="password" class="form-control" placeholder="Confirm Password" autocomplete="off" name="passc">
              </div>
              <div class="form-submit">
                  <input type="submit" name="register" value="Register">
              </div>
          </div>
      </form>

    </main>
    <?php include 'scripts.php'; ?>
  </body>
</html>

