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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <?php include_once "menu_admin.html"; ?>
</body>

</html>
<?php
        } else {
            // Redirect to login page if user doesn't have admin access
            echo "Anda belum login";
            header("Location: login.php");
        }
    }
} else {
    // Redirect to login page if session is not set
    echo "Anda belum login";
    header("Location: login.php");
}
?>