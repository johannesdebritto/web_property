<?php
session_start();
$username = $_SESSION['username'];
include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == 2) {
        // Cek apakah formulir telah disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Tangkap data dari formulir
            $username = $_POST['username'];
            $nama_client = $_POST['nama_client'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $ulasan = $_POST['ulasan'];
            $result = $db->tambah_data_ulasan($username, $nama_client, $jenis_kelamin, $ulasan);

            if ($result) {
                // Pesan pop-up JavaScript dengan CSS styling
                echo '<div class="popup-container success">
                    <p>Ulasan berhasil ditambahkan.</p>
                </div>';
            } else {
                echo "Gagal menambahkan data.";
            }
        }
    } else {
        echo "Anda belum login";
        header('location: login.php');
    }
}

// Setelah menampilkan pesan pop-up, alihkan ke halaman ulasan_client.php setelah beberapa detik
echo '<script>
    setTimeout(function() {
        window.location.href = "ulasan_client.php";
    }, 1000); // Contoh: alihkan setelah 1 detik
</script>';
?>

<style>
    .popup-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        background-color: #fff;
    }

    .popup-container.success {
        color: green;
    }
</style>
