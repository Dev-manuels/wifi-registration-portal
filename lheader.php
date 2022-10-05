<?php
  include 'connection.php';
  session_start();
  $_SESSION['message'] = "";

  if(isset($_POST['logout'])){
    unset($_SESSION['valid']);
    unset($_SESSION['username']);
    session_destroy();
    header('location:index.php');
  }

?>

<nav class="dash-nav">
      <div class="logo-container">
        <a href="https://federalpolyilaro.edu.ng"><img class="logo" src="img/logo.png" alt="FPI logo" height="71px" width="180px"></a>
      </div>
      <ul class="main-nav login-links">
          <li><a class="active white-text" href="dashboard.php">Dashboard</a></li>
          <li><a class="white-text" href="adminRegister.php">Register New-Admin</a></li>
          <li><a class="white-text" href=""><form method="post"><input class="logout" type="submit" value="Logout" name="logout"></form></a></li>
      </ul> 
</nav>