<?php 
include 'connection.php'?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'links.php';?>
    <title>DASHBOARD</title>
  </head>
  <body>
  <?php include 'lheader.php';?>
    <main>
      <div class="buttons-container">
      <a href="register.php"><button>Register Student</button></a>
      <a href="sregister.php"><button>Register Staff</button></a>
      <a href="register.php"><button>View Registered Student</button></a>
      <a href="sregister.php"><button>View registered Staff</button></a>
      </div>
   
      <div class="main-text">
        <h2 class="hero-main">Welcome to FPI hotspot records</h2>
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
          $sql= "SELECT * from `studentRecord`";
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
              <a href="update.php?updateid='.$id.'"" ><button>UPDATE</button></a>
              <a href="delete.php?deleteid='.$id.'" ><button>DELETE</button></a>
              <a href="done.php?doneid='.$id.'" ><button>DONE</button></a>
              </td>
            </tr>' ;   
            }
          }
        ?>
      </div>
    </main>
    
    <?php include 'scripts.php'; ?>
  </body>
</html>