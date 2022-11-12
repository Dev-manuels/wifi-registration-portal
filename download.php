<?php
// Database Connection
include 'connection.php';
session_start();
include 'logged.php';

if (isset($_POST['download'])) {
    $table=$_POST['table'];
    // get Users
    
    if ($table == "staff") {
        $query = "SELECT username,password FROM staffRecord WHERE status = 'Pending'";
        
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
    
        $users = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }
    
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=staff.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Username', 'Password'));
    
    
        if (count($users) > 0) {
            foreach ($users as $row) {
                fputcsv($output, $row);
            }
        }
    
    } else if($table == "student"){
        $query = "SELECT matric,other,mac FROM studentRecord WHERE status = 'Pending'";
        
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
    
        $users = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }
    
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=student.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Matric No', 'Other name','Mac address'));
    
    
        if (count($users) > 0) {
            foreach ($users as $row) {
                fputcsv($output, $row);
            }
        }
    }
}
?>