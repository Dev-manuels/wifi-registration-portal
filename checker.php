
<?php
  include 'connection.php';
  session_start();

  $output=$_SESSION['message'];
  $_SESSION['message'] = "";

  if(isset($_POST['check'])){
    $matric=$_POST['matric'];
    
    if(empty($matric)){
      $output .= "matric number can not be Empty";
    } else {
      $query = " SELECT * FROM studentRecord WHERE matric='$matric'";
      $res = mysqli_query($con,$query);

      if(mysqli_num_rows($res) == 1){
        $row=mysqli_fetch_assoc($res);
        $status=$row['status'];
        $output .= "$matric registration status is $status";
      } else {
        $output .= "$matric is not found in the Database <br> Please enter valid Info";
      }

    }

  }

?>











<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHECK STATUS</title>
  </head>
  <body>
  <?php include 'header.php'; ?>
  <main class="main-login">
  
        <form method="post" class="form-container">
            <div class="login-main-text">
                <h2 class="hero-text-main">Welcome to FPI Hotspot</h2>
                <h2 class="hero-text">Status Checker</h2>
            </div>
            <div class="error" style="color: #fff !important;"><b><?php echo $output  ?></b></div>
            <div class="form-input-container">
                <input type="text" name="username" style="display: none;">
                <div class="form-input">
                    <label for="matric NO">MATRIC NO:</label>
                    <input type="text" name="matric" placeholder="Enter your matric number">
                </div>
                <div class="form-submit">
                    <input type="submit" name="check" value="check">
                </div>
            </div>
        </form>

    </main>
    <?php include 'scripts.php'; ?>
  </body>
</html>
