<?php
  include 'connection.php';
  session_start();
    include 'logged.php';

  $id=$_GET['updateid'];
  $output="";

  $sql="select * from `studentRecord` where id=$id";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $matric=$row['matric'];
  $surname=$row['surname'];
  $other=$row['other'];
  $phone=$row['phone'];
  $mac=$row['mac'];


  
  if(isset($_POST['submit'])){
      $mac=$_POST['mac'];

      if(empty($mac)){
        $output .= "Mac address can not empty";
      } else {

        $sql="update `studentRecord` set mac='$mac'  where id=$id";

        $result=mysqli_query($con,$sql);

        if ($result) {
          
          header('location:Rstudents.php');
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
    <title>UPDATE</title>
  </head>
  <body>
    <?php include 'header.php';?>
    <main class="main-register">
  
      <form method="post" class="form-container">
      <div class="login-main-text">
          <h2 class="hero-text-main">FPI Hotspot Registration Portal</h2>
          <h2 class="hero-text">Update Details</h2>
      </div>
      <div class="form-input-container">
        <div class="error"><b><?php echo $output  ?></b></div>
        <div class="form-input">
          <label>Matric No:</label>
          <input type="text" placeholder="Enter your Matric number" autocomplete="off" name="matric" value="<?php echo $matric;?>" readonly>
        </div>
        <div class="form-input">
          <label>Surname:</label>
          <input type="text" placeholder="Enter your Surname" autocomplete="off" name="surname" value="<?php echo $surname;?>" required readonly>
        </div>
        <div class="form-input">
          <label>Other names:</label>
          <input type="text" placeholder="Enter your Other names" autocomplete="off" name="other" value="<?php echo $other;?>" required readonly>
        </div>
        <div class="form-input">
          <label>Phone number:</label>
          <input type="number" placeholder="Enter your phone number" autocomplete="off" name="phone" value="<?php echo $phone;?>" required readonly>
        </div>
        <div class="form-input">
          <label>WIFI Mac Address:</label>
          <input type="text" placeholder="Enter your WIFI Mac address" autocomplete="off" name="mac" value="<?php echo $mac;?>" required>
        </div>
        <div class="form-submit">
          <input type="submit" value="UPDATE" name="submit">
        </div>
      </div>
      </form>
    </main>   


    <?php include 'scripts.php'; ?>
  </body>
</html>