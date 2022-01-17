<?php
 error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['sess_user']))
 { 
header('Location:login.php');
 }
include('./dbconfig.php');
 
//getting id of the data from url
$SID = $_GET['SID'];
 
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM Supplier WHERE SID = '$SID'");
 
// redirecting to the display page (index.php in our case)
header("Location:supplierhome.php");
?>