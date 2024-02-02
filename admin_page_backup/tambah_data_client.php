<?php
session_start();
$username = $_SESSION['username'];
include_once "config.php";
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
                <h3>Tambah Data Client</h3>
                <form action="simpan_data_client.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Kode Client</td>
                            <td><input type="text" name="kode_client"></td>
                        </tr>
                        <tr>
                            <td>Nama Client</td>
                            <td><input type="text" name="nama_client"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="jenis_kelamin">
                                    <option value="--"></option>
                                    <?php
                                    $no = 1;
                                    foreach ($db->tampil_data_jenis_kelamin() as $x) {
                                        echo '<option value="' . $x['kode_jk'] . '">' . $x['keterangan_jk'] . '</option>';
                                    ?>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><input type="date" name="tanggal_lahir"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><textarea name="alamat"></textarea></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td><input type="text" name="pekerjaan"></textarea></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><input type="file" name="foto_client"></textarea></td>
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