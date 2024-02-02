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

            $cekdir = is_dir("foto_tipe_rumah");
            if (!$cekdir) {
                mkdir("foto_tipe_rumah");
                chmod("foto_tipe_rumah", 0755);
            }
            $daftar_list = array("jpg", "png", "jpeg");
            $nama_file = $_FILES['foto_tipe_rumah']['name'];
            $pecah = explode(".", $nama_file);
            $ekstensi = $pecah[1];

            if (!empty($_FILES['foto_tipe_rumah']['name'])) {
                if (in_array($ekstensi, $daftar_list)) {
                    $lokasi_foto_tipe_rumah = $_FILES["foto_tipe_rumah"]["tmp_name"];
                    $nama_foto_tipe_rumah = $_FILES["foto_tipe_rumah"]["name"];
                    $dir_foto_tipe_rumah = "foto_tipe_rumah/$nama_foto_tipe_rumah";
                    move_uploaded_file($lokasi_foto_tipe_rumah, $dir_foto_tipe_rumah);
                    $foto_tipe_rumah = $dir_foto_tipe_rumah;
                } else {
                    echo "File yang diupload harus jpg, png, atau jpeg <br>";
                    header("location: property.php");
                    exit();
                }
            } else {
                
                $foto_tipe_rumah = $x['foto']; // Ganti ini dengan kolom yang sesuai dalam database
            }
            // Panggil fungsi untuk menyimpan data yang telah diubah
            $result = $db->simpan_edit_data_tipe_rumah($kode_rumah, $nama_tipe, $harga_rumah, $deskripsi, $foto_tipe_rumah);

            if ($result) {
                echo "Data berhasil disimpan.";
                header('location: property.php');
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
