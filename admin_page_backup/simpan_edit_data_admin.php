<?php
session_start();
include 'config.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
  

    $foto_admin = "foto_admin/" . $_FILES['foto_admin']['name'];
    move_uploaded_file($_FILES['foto_admin']['tmp_name'], $foto_admin);

    $result = $db->simpan_edit_data_admin($id,  $foto_admin);

    if ($result) {
        echo "Data admin berhasil disimpan.";
        header('Location: profile.php');
        exit();
    } else {
        echo "Gagal menyimpan data admin.";
    }
} else {
    echo "Invalid request";
    header('Location: property.php');
}
?>
