
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peminjam</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/home_admin1.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    include 'config.php';
    $db = new Database();
    if (isset($_GET['id'])) {
        $kode_client = $_GET['id'];
        $data_client = $db->kode_client($kode_client);
    } else {
        echo "aaaa";
        header('Location: profile.php');
    }
    ?>
    <h3>Edit Data Peminjam</h3>
    <form action="simpan_edit_data_client.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="kode_client" value="<?php echo $data_client[0]['kode_client']; ?>" />
        <table>
            <tr>
                <td>Kode Peminjam</td>
                <td><input type="text" name="kode_client" value="<?php echo $data_client[0]['kode_client']; ?>" disabled></td>
                
                <td>Nama Peminjam</td>
                <td><input type="text" name="nama_client" value="<?php echo $data_client[0]['nama_client']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin">
                        <option value="--"></option>
                        <?php
                        $no = 1;
                        $kode_jenis_kelamin = $data_client[0]['jenis_kelamin'];
                        foreach ($db->tampil_data_jenis_kelamin() as $x) {
                            echo "<option value='" . $x['kode_jk'] . "'";
                            if ($x['kode_jk'] == $kode_jenis_kelamin) {
                                echo " selected='selected'";
                            }
                            echo ">" . $x['keterangan_jk'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir" value="<?php echo $data_client[0]['tanggal_lahir']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" cols="30" rows="10"><?php echo $data_client[0]['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><input type="text" name="pekerjaan" value="<?php echo $data_client[0]['pekerjaan']; ?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <?php
                if (empty($data_client[0]['foto'])) {
                ?>
                    <td>
                        <font color="red">Belum ada foto</font><br>
                        <input type="file" name="foto_client">
                    </td>
                <?php } else { ?>
                    <td>
                        <img src="<?php echo $data_client[0]['foto']; ?>" alt="" width="50" height="50"><br>
                        <input type="file" name="foto_client">
                    </td>
                <?php } ?>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
    <script src="assets/js/bootstrap.bundle.min.js "  crossorigin="anonymous "></script>

    
       
</body>

</html>

