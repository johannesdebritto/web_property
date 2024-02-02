<?php
session_start();
$username = $_SESSION['username'];
include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == 1) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="assets/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
            
            <!-- Font Google -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

                </head>

        <body>
            <?php
            $db = new Database();
            ?>
            <div class="container">
                <h3>Tambah Data Peminjam</h3>
                <form action="simpan_data_bank.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Kode Bank</td>
                            <td><input type="text" name="kode_bank"></td>
                        </tr>
                        <tr>
                            <td>Nama Bank</td>
                            <td><input type="text" name="nama_bank"></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><input type="file" name="foto_bank"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Simpan"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </body>

        </html>
<?php
    } else {
        echo "Anda belum login";
        header('location:login.php');
    }
}
?>