<?php
  include 'connection.php';

  $output="";

  if(isset($_POST['submit'])){
    $staffID=$_POST['staffID'];
    $surname=$_POST['surname'];
    $other=$_POST['other'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $status="Pending";

    $query = " SELECT * FROM staffRecord WHERE staffid = '$staffID'";
    $res = mysqli_query($con,$query);



    if(empty($staffID)){
      $output .= "Staff ID can not empty";
    } else if(empty($surname)){
      $output .= "Surname can not empty";
    } else if(empty($other)){
      $output .= "Other name can not empty";
    } else if(empty($username)){
      $output .= "Username can not empty";
    }  else if(empty($password)){
      $output .= "Desired password can not empty";
    } else if(mysqli_num_rows($res) == 1){
      $output .= "Staff ID has already been registred, Visit the office to update your details";
    }
     else {
      $sql="insert into `staffRecord` (staffid,surname,other,username,password,status) values('$StaffID','$surname','$other','$username','$password','$status')";

      $result=mysqli_query($con,$sql);

      if ($result) {
        header('location:success.php');
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
    <title>REGISTER</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main class="main-register">
      <form method="post" class="form-container">
        <div class="login-main-text">
          <h2 class="hero-text-main">Welcome to FPI hotspot registration portal</h2>
          <h2 class="hero-text">Staff Registration</h2>
        </div>
        <div class="form-input-container">
          <div class="form-input">
            <label>Staff ID:</label>
            <input type="text" class="form-control" placeholder="Enter your Staff-ID" autocomplete="off" name="staffID" required>
          </div>
          <div class="form-input">
            <label>Surname:</label>
            <input type="text" class="form-control" placeholder="Enter your Surname" autocomplete="off" name="surname" required>
          </div>
          <div class="form-input">
            <label>Other names:</label>
            <input type="text" class="form-control" placeholder="Enter your Other names" autocomplete="off" name="other" required>
          </div>
          <div class="form-input">
            <label>Username:</label>
            <input type="text" class="form-control" placeholder="Enter username" autocomplete="off" name="username" required>
          </div>
          <div class="form-input">
            <label>Desired passowrd:</label>
            <input type="password" class="form-control" placeholder="Enter your desired password" autocomplete="off" name="password" required>
          </div>
          <div class="form-submit">
            <input type="submit" value="Register" name="submit">
          </div>
        </div>
      </form>

    </main>


    <?php include 'scripts.php'; ?>
  </body>
</html>