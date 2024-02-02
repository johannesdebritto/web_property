
<?php
include('config.php');
$db = new Database();
if (isset($_GET['id'])) {
    $kode_rumah = $_GET['id'];
    $db->hapus_data_property($kode_rumah);
    header('location: property.php');
} else {
    header('Location: property.php');
}
?>
