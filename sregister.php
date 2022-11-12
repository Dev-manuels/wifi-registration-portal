<?php
  include 'connection.php';
  session_start();

  $output="";

  if(isset($_POST['submit'])){
    $staffid=$_POST['staffid'];
    $surname=$_POST['surname'];
    $other=$_POST['other'];
    $username= $surname;
    $password=$_POST['password'];
    $status="Pending";

    $query = " SELECT * FROM staffRecord WHERE staffid = '$staffid'";
    $res = mysqli_query($con,$query);
    


    if(empty($staffid)){
      $output .= "Staff ID can not empty";
    } else if(empty($surname)){
      $output .= "Surname can not empty";
    } else if(empty($other)){
      $output .= "Other name can not empty";
    } else if(empty($password)){
      $output .= "Desired password can not empty";
    } else if(mysqli_num_rows($res) == 1){
      $output .= "Staff ID has already been registred, Visit the office to update your details";
    }
     else {
      $query = " SELECT * FROM staffRecord WHERE surname='$surname' ";
      $res = mysqli_query($con,$query);
      if (mysqli_num_rows($res) >= 1) {
        $surfix = mysqli_num_rows($res);
        $username = "$username$surfix";
      } else {
        $username =$surname;
      }
      
      $sql="insert into `staffRecord` (staffid,surname,other,username,password,status) values('$staffid','$surname','$other','$username','$password','$status')";

      $result=mysqli_query($con,$sql);

      if ($result && $_SESSION['valid'] != true) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location:success.php');
      } else if ($_SESSION['valid']) {
        header('location:dashboard.php');
      } else {
        die(mysqli_error($con));
      }
    }
  }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'links.php';?>
    <title>STAFF REGISTER</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main class="main-register">
      <form method="post" class="form-container">
        <div class="login-main-text">
          <h2 class="hero-text-main">Welcome To FPI WIFI Registration Portal</h2>
          <h2 class="hero-text">Staff Registration</h2>
        </div>
        <div class="form-input-container">
          <div class="error"><b><?php echo $output  ?></b></div>
          <div class="form-input">
            <label>Staff ID:</label>
            <input type="text" class="form-control" placeholder="Enter your Staff-ID" autocomplete="off" name="staffid" >
          </div>
          <div class="form-input">
            <label>Surname:</label>
            <input type="text" class="form-control" placeholder="Enter your Surname" autocomplete="off" name="surname" >
          </div>
          <div class="form-input">
            <label>Other names:</label>
            <input type="text" class="form-control" placeholder="Enter your Other names" autocomplete="off" name="other" >
          </div>
          <div class="form-input">
            <label>Desired passowrd:</label>
            <input type="password" class="form-control" placeholder="Enter your desired password" autocomplete="off" name="password" >
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