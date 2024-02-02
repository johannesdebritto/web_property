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
        </head>

        <body>
            <?php
            $db = new Database();
            ?>
            <div class="container">
                <h3>Tambah Data Peminjam</h3>
                <form action="simpan_data_tipe_rumah.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Kode Rumah</td>
                            <td><input type="text" name="kode_rumah"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama_tipe"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Harga</td>
                            <td><input type="text" name="harga_rumah"></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><textarea name="deskripsi"></textarea></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><input type="file" name="foto_tipe_rumah"></textarea></td>
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