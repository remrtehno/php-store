<?php

// Starting session
session_start();
 
 
 unset($_SESSION['auth']['login']);
 unset($_SESSION['auth']['id']);
 
// Destroying session
//session_destroy();

header("Location: index.php");

?>