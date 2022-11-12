<?php
    include 'connection.php';
    session_start();
    include 'logged.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'links.php';?>
    <title>Download CSV</title>
  </head>
  <body class="main-dashboard">
  <?php include 'header.php';?>
    <main>
      <div class="buttons-container hack">
      <a href="dashboard.php"><button class="btn-done">Back to Dashboard</button></a>
      <a href="Rstudents.php"><button class="btn-done">View Registered Student</button></a>
      <a href="Rstaffs.php"><button class="btn-done">View Registered Staff</button></a>
      </div>
   
      <form method="post" action="download.php" class="form-container">
        <div class="form-input-container" style="display:flex;flex-direction:column; align-items:center;">
            <div class="error"><b><?php echo $output  ?></b></div>
            <div class="form-input" style="width: 300px;">
            <label for="Record to download">Select the record to downoad</label>
            <select name="table" >
                <option value="staff">Pending Staff details</option>
                <option value="student">Pending Student details</option>
            </select>
            </div>
            <div class="form-submit">
            <input type="submit" value="Download" name="download">
            </div>
        </div>
      </form>
    </main>
  </body>
</html>