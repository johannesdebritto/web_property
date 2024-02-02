<?php
session_start();
$username = $_SESSION['username'];
include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == '2') {
        header("Location: menu_client.php");
        exit();
    } else {
        echo "Anda belum login";
        header("Location: login.php");
    }
}
?>
