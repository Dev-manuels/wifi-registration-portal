<?php
    include 'connection.php';
    session_start();

    if ($_SESSION['valid'] != true) {
        $_SESSION['message'] = "Please login!";
        header("Location:index.php");
    }else{
        $_SESSION['message'] = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'links.php';?>
    <title>Registered Student</title>
  </head>
  <body class="main-dashboard">
  <?php include 'lheader.php';?>
    <main>
      <div class="buttons-container hack">
        <a href="dashboard.php"><button class="btn-done">Back to Dashboard</button></a>
        <a href="register.php"><button class="btn-update">Register New Student</button></a>
        <a href="sregister.php"><button class="btn-done">Register New Staff</button></a>
        <a href="Rstaffs.php"><button class="btn-update">View registered Staff</button></a>
      </div>
   
      <div class="main-text">
        <h2 class="hero-main white-text">Registered Students</h2>
      </div>
      <div class="table-container">
      <table class="table" border="1px">
        <thead class="">
          <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">MATRIC NO</th>
            <th scope="col">SURNAME</th>
            <th scope="col">OTHER NAMES</th>
            <th scope="col">PHONE NO</th>
            <th scope="col">MAC ADDRESS</th>
            <th scope="col">REGISTATION-STATUS</th>
            <th scope="col">ENTRY-DATE</th>
            <th scope="col">OPERATIONS</th>
          </tr>
        </thead>
        <tbody>
          <!-- php code to read from database and display-->
          <?php 
            $sql= "SELECT * from `studentRecord` WHERE status = 'Registered' ORDER BY `studentRecord`.`surname` ASC";
            $result = mysqli_query($con,$sql);
            
            if($result){
              while ($row=mysqli_fetch_assoc($result)) {
                $id=$row['id'];
                $matric=$row['matric'];
                $surname=$row['surname'];
                $other=$row['other'];
                $phone=$row['phone'];
                $mac=$row['mac'];
                $status=$row['status'];
                $date=$row['date'];
                
                //<th scope="row">'.$id.'</th>
                echo ' <tr>
                
                <td><b>'.$matric.'</b></td>
                <td><b>'.$surname.'</b></td>
                <td><b>'.$other.'</b></td>
                <td><b>'.$phone.'</b></td>
                <td><b>'.$mac.'</b></td>
                <td><b>'.$status.'</b></td>
                <td><b>'.$date.'</b></td>
                <td>
                <div class="btn-container">
                <a href="update.php?updateid='.$id.'"" ><button class="btn-update">EDIT</button></a>
                <a href="delete.php?deleteid='.$id.'" ><button  class="btn-delete">DELETE</button></a>
              </div>
                </td>
              </tr>' ;   
              }
            }
          ?>  
        </tbody>
      </table>
      </div>
      <div class="hack"></div>
      
    </main>
    
    <?php include 'scripts.php'; ?>
  </body>
</html>