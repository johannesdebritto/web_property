<?php
session_start();
$username = $_SESSION['username'];
include_once "config.php";
$database = new Database();

foreach ($database->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == 1) {
        // Cek apakah formulir telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_client = $_POST['kode_client'];
            $nama_client = $_POST['nama_client'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
            $pekerjaan = $_POST['pekerjaan'];
            
            $foto_client = '';

            if (!empty($_FILES['foto_client']['name'])) {
                $foto_client = 'foto_client/' . $_FILES['foto_client']['name'];
                move_uploaded_file($_FILES['foto_client']['tmp_name'], $foto_client);
            }// Pastikan untuk memvalidasi dan membersihkan input pengguna

            // Panggil function untuk menyimpan data client
            $result = $database->tambah_data_client($kode_client, $nama_client, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan, $foto_client);

            
                // Redirect to profile.php after successful update
                header('location: profile.php');
                exit(); // Penting untuk keluar setelah pengalihan header
          
        }
    } else {
        echo "Anda belum login";
        header('location: login.php');
    }
}
?>
