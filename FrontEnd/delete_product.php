<?php
 error_reporting(E_ALL);
 session_start();
 if(!isset($_SESSION['sess_user']))
 { 
header('Location:login.php');
 }

include('./dbconfig.php');
 
//getting id of the data from url
$PID = $_GET['PID'];
 
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM Product WHERE PID=$PID");
 
//redirecting to the display page (index.php in our case)
header("Location:customerhome.php");
?>