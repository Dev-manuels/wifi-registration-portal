<?php
session_start();

if ($_SESSION['valid'] != true) {
    $_SESSION['message'] = "Please login!";
    header("Location:index.php");
}else{
    $_SESSION['message'] = "";
}

?>