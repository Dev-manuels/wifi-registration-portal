<!-- <?php
  include 'connection.php';

  $output="";

  if(isset($_POST['Login'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    
    if(empty($email)){
      $output .= "Email address can not be Empty";
    } else if(empty($pass)){
      $output .= "Enter valid Password";
    } else {
      $query = " SELECT * FROM admins WHERE email='$email' AND password = '$pass'";
      $res = mysqli_query($con,$query);

      if(mysqli_num_rows($res) == 1){
          header('location:dashboard.php');
      }else {
          $output .= "Enter valid user credentials";
      }

    }

  }

?>
 -->











<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="Container mt-5">
      <div class="col-md-12">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6 shadow-sm">
            <div class="container-fluid">
              <h1 class= "text-center">WELCOME TO FPI HOTSPOT LOGIN PORTAL</h1>
              <h2 class= "text-center">ADMIN LOGIN</h2>
              <div class="text-center text-danger"><?php echo $output  ?></div>
              <form method="post">
                <div class="form-group">
                  <label>Email address:</label>
                  <input class="form-control" type="email" name="email" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                  <label>Password:</label>
                  <input type="password" class="form-control" name="pass" placeholder="Enter your password">
                </div>
                <button name="Login" class="btn btn-success mb-2">Login</button>
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
