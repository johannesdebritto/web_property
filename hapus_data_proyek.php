<?php
  session_start();
  $username = $_SESSION['username'];
  include "config.php";
  $db = new Database();

  foreach($db->login($username) as $x){
    $akses_id = $x['akses_id'];
    if($akses_id=='1'){
?>
<?php

$db = new Database();
if (isset($_GET['id'])) {
    $kode_rumah = $_GET['id'];
    $db->hapus_data_proyek($kode_rumah);
    header('location: proyek.php');
} else {
    header('Location: proyek.php');
}
?>
<?php
      }
      else{
        echo "Anda belum login";
        header("Location: login.php");
      }
    }
?>