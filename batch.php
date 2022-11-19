<?php
    include 'connection.php';
    session_start();
    include 'logged.php';
    $output = " ";
    if(isset($_POST['del'])){
        $year=$_POST['year'];
        
        if(empty($year)){
          $output .= "Please select a year to delete";
        } else {
          
          $query1 = " SELECT * FROM `studentRecord` WHERE matric LIKE '%$year%'";
          $test = mysqli_query($con,$query1);
          
            if(mysqli_num_rows($test) > 0){
                $query = " DELETE FROM `studentRecord` WHERE matric LIKE '%$year%'";
                $res = mysqli_query($con,$query);
                if($res){
                    $output .= "Deleted Successfully";
                } else {
                    $output .= "Please Contact my Creator (Dev-Manuels)";
                }
            
            } else {
                $output .= "No record found to delete for that year";
            }
          }
    
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'links.php';?>
    <title>Batch Delete</title>
  </head>
  <body class="main-dashboard">
  <?php include 'header.php';?>
    <main>
      <div class="buttons-container hack">
      <a href="dashboard.php"><button class="btn-done">Back to Dashboard</button></a>
      <a href="Rstudents.php"><button class="btn-done">View Registered Student</button></a>
      <a href="Rstaffs.php"><button class="btn-done">View Registered Staff</button></a>
      <a href="export.php"><button class="btn-update">Download as CSV</button></a>
      </div>
   
      <form method="post" class="form-container">
        <div class="form-input-container" style="display:flex;flex-direction:column; align-items:center;">
            <div class="error"><b><?php echo $output  ?></b></div>
            <div class="form-input" style="width: 300px;">
            <label for="Record to download">Select student session to delete</label>
            <select name="year" >
                <option value="/20/">2020</option>
                <option value="/21/">2021</option>
                <option value="/22/">2022</option>
                <option value="/23/">2023</option>
                <option value="/24/">2024</option>
            </select>
            </div>
            <div class="form-submit">
            <input type="submit" value="Delete" name="del"> 
            </div>
        </div>
      </form>
    </main>
  </body>
</html>