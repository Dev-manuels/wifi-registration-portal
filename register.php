<?php
  include 'connection.php';

  $output="";

  if(isset($_POST['register'])){
    $matric=$_POST['matric'];
    $surname=$_POST['surname'];
    $other=$_POST['other'];
    $phone=$_POST['phone'];
    $mac=$_POST['mac'];
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
      $sql="insert into `studentRecord` (matric,surname,other,phone,mac,status) values('$matric','$surname','$other','$phone','$mac','$status')";

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
          <label>Other names:</label>
          <input type="text" placeholder="Enter your Other names" autocomplete="on" name="other" required>
        </div>
        <div class="form-input">
          <label>Phone number:</label>
          <input type="tel" placeholder="Enter your phone number" autocomplete="on" name="phone" required>
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