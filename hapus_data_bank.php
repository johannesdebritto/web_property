
<?php
include('config.php');
$db = new Database();
if (isset($_GET['id'])) {
    $kode_bank = $_GET['id'];
    $db->hapus_data_bank($kode_bank);
    header('location: pembayaran.php');
} else {
    header('Location: pembayaran.php');
}
?>
