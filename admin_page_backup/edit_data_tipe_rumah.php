

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peminjam</title>
</head>

<body>
    <?php
    include 'config.php';
    $db = new Database();
    if (isset($_GET['id'])) {
        $kode_rumah = $_GET['id'];
        $tipe_rumah = $db->kode_rumah($kode_rumah);
    } else {
        echo "aaaa";
        header('Location: property.php');
    }
    ?>
    <h3>Edit Tipe Rumah</h3>
    <form action="simpan_edit_data_tipe_rumah.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="kode_rumah" value="<?php echo $tipe_rumah[0]['kode_rumah']; ?>" />
        <table>
            <tr>
                <td>Kode Peminjam</td>
                <td><input type="text" name="kode_rumah" value="<?php echo $tipe_rumah[0]['kode_rumah']; ?>" disabled></td>
                <br>
                <td>Nama Tipe Rumah</td>
                <td><input type="text" name="nama_tipe" value="<?php echo $tipe_rumah[0]['nama_tipe']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><textarea name="harga_rumah" cols="30" rows="10"><?php echo $tipe_rumah[0]['harga_rumah']; ?></textarea></td>
            </tr>
            <tr>
            <td>Deskripsi</td>
                <td><textarea name="deskripsi" cols="30" rows="10"><?php echo $tipe_rumah[0]['deskripsi']; ?></textarea></td>
            </tr>
            <tr>
                <td>Foto</td>
                <?php
                if (empty($tipe_rumah[0]['foto'])) {
                ?>
                    <td>
                        <font color="red">Belum ada foto</font><br>
                        <input type="file" name="foto_tipe_rumah">
                    </td>
                <?php } else { ?>
                    <td>
                        <img src="<?php echo $tipe_rumah[0]['foto']; ?>" alt="" width="50" height="50"><br>
                        <input type="file" name="foto_tipe_rumah">
                    </td>
                <?php } ?>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>

</html>

