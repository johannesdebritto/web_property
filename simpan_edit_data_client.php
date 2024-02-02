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
            $kode_client = $_POST['kode_client'];
            $nama_client = $_POST['nama_client'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
            $pekerjaan = $_POST['pekerjaan'];
            $cekdir = is_dir("foto_client");
            if (!$cekdir) {
                mkdir("foto_client");
                chmod("foto_client", 0755);
            }
            $daftar_list = array("jpg", "png", "jpeg");
            $nama_file = $_FILES['foto_client']['name'];
            $pecah = explode(".", $nama_file);
            $ekstensi = $pecah[1];

            if (!empty($_FILES['foto_client']['name'])) {
                if (in_array($ekstensi, $daftar_list)) {
                    $lokasi_foto_client = $_FILES["foto_client"]["tmp_name"];
                    $nama_foto_client = $_FILES["foto_client"]["name"];
                    $dir_foto_client = "foto_client/$nama_foto_client";
                    move_uploaded_file($lokasi_foto_client, $dir_foto_client);
                    $foto_client = $dir_foto_client;
                } else {
                    echo "File yang diupload harus jpg, png, atau jpeg <br>";
                    header("location: property.php");
                    exit();
                }
            } else {
                
                $foto_client = $x['foto']; // Ganti ini dengan kolom yang sesuai dalam database
            }
            // Panggil fungsi untuk menyimpan data yang telah diubah
            $result = $db->simpan_edit_data_client($kode_client, $nama_client, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan, $foto_client);

            if ($result) {
                echo "Data berhasil disimpan.";
                header('location: profile.php');
                exit();
            } else {
                echo "Gagal menyimpan data.";
            }
        }
    } else {
        echo "Anda belum login";
        header('location: login.php');
    }
}
?>
