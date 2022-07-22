<?php
  include 'connection.php';

  $output="";

  if(isset($_POST['submit'])){
    $matric=$_POST['matric'];
    $surname=$_POST['surname'];
    $other=$_POST['other'];
    $phone=$_POST['phone'];
    $mac=$_POST['mac'];
    $status="Pending";

    $query = " SELECT * FROM wifiRecord WHERE matric = '$matric'";
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
    } else {
      $sql="insert into `wifiRecord` (matric,surname,other,phone,mac,status) values('$matric','$surname','$other','$phone','$mac','$status')";

      $result=mysqli_query($con,$sql);

      if ($result) {
        header('location:dashboard.php');
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
    <?php include 'lheader.php'; ?>
    <div class="Container mt-5 mx-3">
      <div class="col-md-12">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6 shadow-sm">
            <h1 class= "text-center">Welcome to FPI hotspot registration portal</h1>
            <h2 class= "text-center">REGISTER</h2>
            <div class="text-center text-dark"><b><?php echo $output  ?></b></div>
            <form method="post">
              <div class="form-group">
                <label>Matric No:</label>
                <input type="text" class="form-control" placeholder="Enter your Matric number" autocomplete="off" name="matric">
              </div>
              <div class="form-group">
                <label>Surname:</label>
                <input type="text" class="form-control" placeholder="Enter your Surname" autocomplete="off" name="surname">
              </div>
              <div class="form-group">
                <label>Other names:</label>
                <input type="text" class="form-control" placeholder="Enter your Other names" autocomplete="off" name="other">
              </div>
              <div class="form-group">
                <label>Phone number:</label>
                <input type="text" class="form-control" placeholder="Enter your phone number" autocomplete="off" name="phone">
              </div>
              <div class="form-group">
                <label>WIFI Mac Address:</label>
                <input type="text" class="form-control" placeholder="Enter your WIFI Mac address" autocomplete="off" name="mac">
              </div>
              <button type="submit" class="btn btn-success mt-1 mb-1" name="submit">Submit</button>
            </form>
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