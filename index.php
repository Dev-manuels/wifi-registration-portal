<!-- 
<?php
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
  <main class="main">
  
        <form method="post" class="form-container">
            <div class="login-main-text">
                <h2 class="hero-text-main">Welcome to FPI Hotspot</h2>
                <h2 class="hero-text">Login Portal</h2>
            </div>
            <div style="color: red;, font-size: 2rem;"><b><?php echo $output  ?></b></div>
            <div class="form-input-container">
                <div class="form-input">
                    <label for="Email">Email:</label>
                    <input type="email" name="email" placeholder="Enter your Email">
                </div>

                <input type="text" name="username" style="display: none;">
                <div class="form-input">
                    <label for="Password">Password:</label>
                    <input type="password" name="pass" placeholder="Enter your password">
                </div>
                <div class="form-submit">
                    <input type="submit" name="Login" value="Login">
                </div>
            </div>
        </form>

    </main>

  </body>
</html>
