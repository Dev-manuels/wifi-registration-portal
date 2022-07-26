<?php
  include 'connection.php';

  $id=$_GET['updateid'];
  $output="";

  $sql="select * from `wifiRecord` where id=$id";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $matric=$row['matric'];
  $surname=$row['surname'];
  $other=$row['other'];
  $phone=$row['phone'];
  $mac=$row['mac'];


  
  if(isset($_POST['submit'])){
      $matric=$_POST['matric'];
      $surname=$_POST['surname'];
      $other=$_POST['other'];
      $phone=$_POST['phone'];
      $mac=$_POST['mac'];

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
      } else {

        $sql="update `wifiRecord` set id=$id,matric='$matric',surname='$surname',other='$other',phone='$phone',mac='$mac'  where id=$id";

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
    <title>UPDATE</title>
  </head>
  <body>
    <?php include 'lheader.php'; ?>
    <div class="Container mt-5">
        <div class="col-md-12">
          <div class="row d-flex justify-content-center">
            <div class="col-md-6 shadow-sm">
              <div class="container-fluid">
                <h1 class= "text-center">Welcome to FPI hotspot registration portal</h1>
                <h2 class= "text-center">REGISTER</h2>
                <div class="text-center text-danger"><?php echo $output  ?></div>
                <br>
                <form method="post">
                  <div class="form-group">
                    <label>Matric No:</label>
                    <input type="text" class="form-control" placeholder="Enter your Matric number" autocomplete="off" name="matric" value=<?php echo $matric;?> readonly >
                  </div>
                  <div class="form-group">
                    <label>Surname:</label>
                    <input type="text" class="form-control" placeholder="Enter your Surname" autocomplete="off"  name="surname" value=<?php echo $surname;?> >
                  </div>
                  <div class="form-group">
                    <label>Other names:</label>
                    <input type="text" class="form-control" placeholder="Enter your Other names" autocomplete="off" name="other" value=<?php echo $other;?> >
                  </div>
                  <div class="form-group">
                    <label>Phone number:</label>
                    <input type="number" class="form-control" placeholder="Enter your phone number" autocomplete="off"  name="phone" value=<?php echo $phone;?>>
                  </div>
                  <div class="form-group">
                    <label>WIFI Mac Address:</label>
                    <input type="text" class="form-control" placeholder="Enter your WIFI Mac address" autocomplete="off"  name="mac" value=<?php echo $mac;?>>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3 mb-2" name="submit">Update</button>
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

