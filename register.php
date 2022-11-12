<?php
  include 'connection.php';
  session_start();
  $output="";

  if(isset($_POST['register'])){
    $matric=trim(strtolower($_POST['matric']));
    $surname=trim(strtolower($_POST['surname']));
    $other=trim(strtolower($_POST['other']));
    $phone=$_POST['phone'];
    $mac=trim($_POST['mac']);
    $status="Pending";

    $query = " SELECT * FROM studentRecord WHERE matric = '$matric'";
    $res = mysqli_query($con,$query);



    if(empty($matric)){
      $output .= "Matric number can not empty";
    } else if(empty($surname)){
      $output .= "Surname can not empty";
    } else if(empty($other)){
      $output .= "Other name can not empty";
    } else if(empty($phone)){
      $output .= "Phone number can not empty";
    }  else if(empty($mac)){
      $output .= "Mac address can not empty";
    } else if(mysqli_num_rows($res) == 1){
      $output .= "Matric number has already been registred, Visit the office to update your details";
    }
     else {
      $sql="insert into `studentRecord` (matric,surname,other,phone,mac,status) 
      values('$matric','$surname','$other','$phone','$mac','$status')";

      $result=mysqli_query($con,$sql);

      if ($result && $_SESSION['valid'] != true) {
        $_SESSION['username'] = $matric;
        $_SESSION['password'] = $other;
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
    <title>STUDENT REGISTER</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main class="main-register">
  
      <form method="post" class="form-container">
      <div class="login-main-text">
          <h2 class="hero-text-main">Welcome To FPI WIFI Registration Portal</h2>
          <h2 class="hero-text">Student Registration</h2>
      </div>
      <div class="form-input-container">
        <div class="error"><b><?php echo $output  ?></b></div>
        <div class="form-input">
          <label>Matric No:</label>
          <input type="text" placeholder="Enter your Matric number" autocomplete="on" name="matric" required>
        </div>
        <div class="form-input">
          <label>Surname:</label>
          <input type="text" placeholder="Enter your Surname" autocomplete="on" name="surname" required>
        </div>
        <div class="form-input">
          <label>Middle name:</label>
          <input type="text" placeholder="Enter your Middle name" autocomplete="on" name="other" required>
        </div>
        <div class="form-input">
          <label>Phone number:</label>
          <input type="number" placeholder="Enter your phone number" autocomplete="on" name="phone" required>
        </div>
        <div class="form-input">
          <label>WIFI Mac Address:</label>
          <input type="text" placeholder="Enter your WIFI Mac address" autocomplete="on" name="mac" required>
        </div>
        <div class="form-submit">
          <input type="submit" value="Register" name="register">
        </div>
      </div>
      </form>
    </main>

    <?php include 'scripts.php'; ?>
  </body>
</html>