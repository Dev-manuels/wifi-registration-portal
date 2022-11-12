<?php
    include 'connection.php';
    session_start();
    $password = $_SESSION['password'];
    $username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'links.php';?>
  <title>Successful</title>
</head>
<body>
  <?php include 'header.php';?>
  <main>
    <div class="success-container">
    <img class="success-img" src="img/Success.png">
    <h1 class="success-main-text"><b>DO NOT RE-REGISTER AGAIN<b></h1>
    <h1 class="success-text">You will be registered soon</h1>
    <p class="success-text">NOTE: When logging in<br><?php echo "Username = $username"  ?>
    <br><?php echo "password = $password"  ?></p>
    </div>
  </main>

    <?php include 'scripts.php'; ?>
</body>
</html>