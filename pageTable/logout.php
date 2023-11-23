<?php
session_start(); // Start the session

// Unset a specific session variable
unset($_SESSION['username']);

// Destroy the session if needed (optional, if no other session data is required)
// session_destroy();

// Redirect to the home page or any other desired location
header("Location: ../index.php");
exit;
?>
