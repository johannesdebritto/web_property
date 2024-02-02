<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // include_once necessary files
    include_once "config.php";
    $db = new Database();

    // Retrieve user information
    foreach ($db->login($username) as $x) {
        $akses_id = $x['akses_id'];

        // Check if the user has admin access
        if ($akses_id == '1') {
            // Redirect to dashboard.php for admin
            header("Location: dasboard.php");
            exit(); // Make sure to exit after redirect
        } else {
            // Redirect to login page if user doesn't have admin access
            echo "Anda tidak memiliki akses admin";
            header("Location: login.php");
            exit(); // Make sure to exit after redirect
        }
    }
} else {
    // Redirect to login page if session is not set
    echo "Anda belum login";
    header("Location: login.php");
    exit(); // Make sure to exit after redirect
}
?>
