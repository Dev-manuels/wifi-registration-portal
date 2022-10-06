<html lang="en">
<head>
  <?php include 'links.php';?>
  <title></title>
</head>
<body>
  <?php
      include 'connection.php';
      session_start();
          
      if ($_SESSION['valid'] != true) {
        echo '
        <nav>
          <div class="logo-container">
            <a href="https://federalpolyilaro.edu.ng"><img class="logo" src="https://federalpolyilaro.edu.ng/images/header-logo.png" alt="FPI logo" height="70px" width="180px"></a>
          </div>
          <ul class="main-nav">
              <li><a class="active" href="index.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
          </ul> 
        </nav>';
      }else{
        include 'lheader.php';
      }

  ?>

  

</body>
</html>