<?php
include('config.php');

$koneksi = new database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_rumah = $_POST['kode_rumah'];
    $kode_client = $_POST['kode_client'];
    $kode_bank = $_POST['kode_bank'];
    $harga_rumah = $_POST['harga_rumah'];
    $kode_pekerja = $_POST['kode_pekerja'];

    // Panggil fungsi tambah_pembelian
    $hasil = $koneksi->tambah_pembelian($kode_rumah, $kode_client, $kode_bank, $harga_rumah, $kode_pekerja);

    // Redirect atau sesuaikan dengan kebutuhan Anda
    
        header('location: progres_client.php');
   
 
} else {
    echo "Metode pengiriman form tidak valid.";
}
?>
