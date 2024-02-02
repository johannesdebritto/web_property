<?php
// Start the session
session_start();

// Set session variables
$_SESSION["username"] = "nama_user";
$_SESSION["password"] = "password123";

// Output session information
echo 'Username: ' . $_SESSION["username"] . "<br>";
echo 'Password: ' . $_SESSION["password"];
?>
