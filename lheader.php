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

<nav>
      <div class="logo-container">
        <a href="https://federalpolyilaro.edu.ng"><img class="logo" src="https://federalpolyilaro.edu.ng/images/header-logo.png" alt="FPI logo" height="70px" width="180px"></a>
      </div>
      <ul class="main-nav">
          <li><a class="active" href="dashboard.php">Dashboard</a></li>
          <li><a href="search.php">Search</a></li>
          <li><a href="adminRegister.php">Register New-Admin</a></li>
          <li><form method="post"><input class="logout" type="submit" value="Logout" name="logout"></form></li>
      </ul> 
</nav>