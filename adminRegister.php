<?php
  include 'connection.php';

  $output="";

  if(isset($_POST['Register'])){
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
    <title>ADMIN-REGISTER</title>
  </head>
  <body>
  <?php include 'header.php'; ?>
    <div class="Container mt-5">
      <div class="col-md-12">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6 shadow-sm">
            <div class="container-fluid">
              <h1 class= "text-center">Welcome to FPI hotspot admin registration portal</h1>
              <h2 class= "text-center">REGISTER</h2>
              <div class="text-center text-danger"><?php echo $output  ?></div>
              <form method="post">
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" placeholder="Enter your Email" autocomplete="off" name="email">
                </div>
                <div class="form-group">
                  <label>Password:</label>
                  <input type="password" class="form-control" placeholder="Enter your Password" autocomplete="off" name="pass">
                </div>
                <div class="form-group">
                  <label>Confirm Password:</label>
                  <input type="password" class="form-control" placeholder="Confirm Password" autocomplete="off" name="passc">
                </div>
                <button type="submit" class="btn btn-primary mb-2" name="Register">Register</button>
              </form>
            </div>
          </div>

        </div>
      </div> 
    </div>




    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>

