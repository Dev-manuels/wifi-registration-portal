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
    <title>Search</title>
  </head>
  <body class="main-dashboard">
  <?php include 'lheader.php';?>
    <main>
      <div class="buttons-container hack">
      <a href="register.php"><button class="btn-done">Register New Student</button></a>
      <a href="sregister.php"><button class="btn-update">Register New Staff</button></a>
      <a href="Rstudents.php"><button class="btn-done">View Registered Student</button></a>
      <a href="#staff"><button class="btn-update">View Pending Staff</button></a>
      <a href="Rstaffs.php"><button class="btn-done">View Registered Staff</button></a>
      </div>
   
      <form method="post" class="form-container">
        <div class="form-input-container" style="display:flex;flex-direction:column; align-items:center;">
            <div class="error"><b><?php echo $output  ?></b></div>
            <div class="form-input" style="width: 300px;">
            <input type="text" placeholder="enter Matric number to search" autocomplete="on" name="matric" required>
            </div>
            <div class="form-submit">
            <input type="submit" value="Search" name="search">
            </div>
        </div>
      </form>
      <div class="table-container">
      <table class="table" border="1px">
        <thead class="">
          <tr>
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
          <!-- php code to search the database and the record-->
          <?php 
            if (isset($_POST['search'])) {
                $matric=$_POST['matric'];
                
                $sql="SELECT * FROM `studentRecord` WHERE matric= '$matric'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);

                $id=$row['id'];
                $matric=$row['matric'];
                $surname=$row['surname'];
                $other=$row['other'];
                $phone=$row['phone'];
                $mac=$row['mac'];
                $status=$row['status'];
                $date=$row['date'];
                
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
                <a href="done.php?doneid='.$id.'" ><button class="btn-done">UPDATE STATUS</button></a>
                </div>
                    </td>
                </tr>' ;   
            }
          ?>  
        </tbody>
      </table>
      </div>
      <div class="hack"></div>
