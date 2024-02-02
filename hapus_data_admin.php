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
    $id = $_GET['id'];
    $db->hapus_data_admin($id);
    header('location: profile.php');
} else {
    header('Location: profile.php');
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