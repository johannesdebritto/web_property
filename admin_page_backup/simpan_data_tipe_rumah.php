<?php
session_start();
$username = $_SESSION['username'];
include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == 1) {
        // Cek apakah formulir telah disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Tangkap data dari formulir
            $kode_rumah = $_POST['kode_rumah'];
            $nama_tipe = $_POST['nama_tipe'];
            $harga_rumah = $_POST['harga_rumah'];
            $deskripsi = $_POST['deskripsi'];


            // Panggil fungsi untuk menambahkan data baru
            $foto_tipe_rumah = "foto_tipe_rumah/" . $_FILES['foto_tipe_rumah']['name'];
            move_uploaded_file($_FILES['foto_tipe_rumah']['tmp_name'], $foto_tipe_rumah);

            $result = $db->tambah_data_tipe_rumah($kode_rumah, $nama_tipe, $harga_rumah,$deskripsi, $foto_tipe_rumah);

            if ($result) {
                echo "Data berhasil ditambahkan.";
                header('location: property.php'); // Alihkan ke property.php setelah berhasil disimpan
                exit(); // Pastikan tidak ada output tambahan sebelum redirect
            } else {
                echo "Gagal menambahkan data.";
            }
        }
    } else {
        echo "Anda belum login";
        header('location: login.php');
    }
}
?>

