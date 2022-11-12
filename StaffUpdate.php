<?php
  include 'connection.php';
  session_start();
  include 'logged.php';

  $id=$_GET['updateid'];
  $output="";

  $sql="select * from `staffRecord` where id=$id";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $StaffId=$row['staffId'];
  $surname=$row['surname'];
  $other=$row['other'];
  $username=$row['username'];
  $password=$row['password'];



  
  if(isset($_POST['submit'])){
    $staffid=$_POST['staffid'];
    $surname=$_POST['surname'];
    $other=$_POST['other'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $status="Registered";

    if(empty($staffid)){
      $output .= "Staff ID can not empty";
    } else if(empty($surname)){
      $output .= "Surname can not empty";
    } else if(empty($other)){
      $output .= "Other name can not empty";
    } else if(empty($username)){
      $output .= "username can not empty";
    }  else if(empty($password)){
      $output .= "Desired password can not empty";
    } else {
      $sql="UPDATE `staffRecord` SET username='$username',password='$password',status='$status'  WHERE id=$id";
      $result=mysqli_query($con,$sql);

      if ($result) {
        header('location:Rstaffs.php');
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
    <title>REGISTER</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main class="main-register">
      <form method="post" class="form-container">
        <div class="login-main-text">
          <h2 class="hero-text-main">FPI Hotspot Registration Portal</h2>
          <h2 class="hero-text">Staff Registration</h2>
        </div>
        <div class="form-input-container">
          <div class="error"><b><?php echo $output  ?></b></div>
          <div class="form-input">
            <label>Staff ID:</label>
            <input type="text" class="form-control" placeholder="Enter your Staff-ID" autocomplete="off" name="staffid" value="<?php echo $StaffId;?>"  readonly>
          </div>
          <div class="form-input">
            <label>Surname:</label>
            <input type="text" class="form-control" value="<?php echo $surname;?>" placeholder="Enter your Surname" autocomplete="off" name="surname" readonly>
          </div>
          <div class="form-input">
            <label>Other names:</label>
            <input type="text" class="form-control" value="<?php echo $other;?>" placeholder="Enter your Other names" autocomplete="off" name="other" readonly>
          </div>
          <div class="form-input">
            <label>username:</label>
            <input type="text" class="form-control" value="<?php echo $username;?>" placeholder="Enter username" autocomplete="off" name="username"  >
          </div>
          <div class="form-input">
            <label>Desired passowrd:</label>
            <input type="password" class="form-control" value="<?php echo $password;?>" placeholder="Enter your desired password" autocomplete="off" name="password" >
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