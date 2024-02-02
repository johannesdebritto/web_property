<?php
include "config.php";
$db = new Database();

if (isset($_GET['id'])) {
    $username = $_GET['id'];
    $result = $db->hapus_data_ulasan($username);
    header('location: ulasan.php');
} else {
    header('Location: ulasan.php');
}
?>

   