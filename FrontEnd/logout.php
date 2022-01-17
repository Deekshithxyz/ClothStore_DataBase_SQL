<?php
// Starting session
session_start();
 
// Destroying session
session_destroy();

// redirect to login page
header('Location:server.php');
?>