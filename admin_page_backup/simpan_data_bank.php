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
            $kode_bank = $_POST['kode_bank'];
            $nama_bank = $_POST['nama_bank'];
           


            // Panggil fungsi untuk menambahkan data baru
            $foto_bank = "foto_bank/" . $_FILES['foto_bank']['name'];
            move_uploaded_file($_FILES['foto_bank']['tmp_name'], $foto_bank);

            $result = $db->tambah_data_bank($kode_bank, $nama_bank, $foto_bank);

            if ($result) {
                echo "Data berhasil ditambahkan.";
                header('location: pembayaran.php'); // Alihkan ke property.php setelah berhasil disimpan
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

