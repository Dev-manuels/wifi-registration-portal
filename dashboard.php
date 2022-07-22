<?php 
include 'connection.php'?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD</title>
  </head>
  <body>
     <?php include 'lheader.php'; ?>
    <div class="container mt-5">
    <a class="text-dark" style="text-decoration:none;" href="aregister.php"><button class="btn btn-dark mb-2 text-light">Register Student</button></a>
    <h1 class= "text-center">Welcome to FPI hotspot records</h1>
      
    <div class="container-fluid">
    
    <table class="table table-hover">
    <thead class="thead-dark">
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
        $sql= "SELECT * from `wifiRecord`";
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
            
            <td class="text-dark"><b>'.$matric.'</b></td>
            <td class="text-dark"><b>'.$surname.'</b></td>
            <td class="text-dark"><b>'.$other.'</b></td>
            <td class="text-dark"><b>'.$phone.'</b></td>
            <td class="text-dark"><b>'.$mac.'</b></td>
            <td class="text-dark"><b>'.$status.'</b></td>
            <td class="text-dark"><b>'.$date.'</b></td>
            <td>
            <a href="update.php?updateid='.$id.'"" class="text-light"><button class="btn btn-primary">UPDATE</button></a>
            <a href="delete.php?deleteid='.$id.'" class="text-white"><button class="btn btn-danger" >DELETE</button></a>
            <a href="done.php?doneid='.$id.'" class="text-white"><button class="btn btn-success" >DONE</button></a>
            </td>
          </tr>' ;   
          }
        }
      ?>
      


    </tbody>
  </table>
    </div>
    </div>
    

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>