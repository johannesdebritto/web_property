<?php
session_start();
$username = $_SESSION['username'];
include "config.php";
$db = new Database();
foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == '2') {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/home_admin1.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!--  -->
    <title>Service page</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #31304D;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/images/logo.png" alt="" width="40" height="30" class="d-inline-block align-text-top mx-2"> RumahKreatif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="menu_client.php">Home</a>
        </li>
        <li class="nav-item mx-3">
            <a class="nav-link" href="service_client.php">Service</a>
        </li>
        <li class="nav-item mx-3">
            <a class="nav-link" href="ulasan_client.php">Ulasan</a>
        </li>
        <li class="nav-item mx-3">
            <a class="nav-link active" href="progres_client.php">Progres</a>
        </li>
        <li class="nav-item mx-3">
            <a class="btn btn-primary" href="logout.php" role="button">Logout</a>
        </li>
        <li class="nav-item no-arrow">
            <a class="nav-link" href="#">
                <span class="d-none d-md-inline text-gray-600 small"><?php echo $username; ?></span>
                <img class="img-profile rounded-circle ml-2" src="<?php echo $x['foto']; ?>" alt="" width="30" height="30">
            </a>
            <!-- User Information -->
            <!-- You can add more elements here, such as a logout link or other user-related information -->
        </li>
    </ul>
</div>

        </div>
    </nav>
   
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/images1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                    <h5>Selamat Datang Di Halaman Progres</h5>
                    <p>Lihat Progres Anda di Sini</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 text-center">
        <h3>Progres Proyek mu</h3>
                           
     </div>
     <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Proyek Rumah</h1>
                </div>
                <div class="card">
                    
                    <!--/.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th> Tipe Rumah</th>
                <th>Nama Client</th>
                <th>Pembayaran</th>
                <th>Harga</th>
                <th>Mandor</th>
                 <th>Tanggal Dibuat</th>
                <th>Tanggal Selesai</th>
                 <th>Status Proyek</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($db->tampil_pembeli_pembeli($username) as $x) {
                ?>
                  <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $x['nama_tipe']; ?></td>
                                        <td><?php echo $x['nama_client']; ?></td>
                                        <td><?php echo $x['nama_bank']; ?></td>
                                        <td><?php echo 'Rp ' . number_format($x['harga_rumah'], 0, ',', '.'); ?></td>
                                        <td><?php echo $x['nama_pekerja']; ?></td>
                                        <td>
                                            <?php
                                                $tanggal_buat= $x['tanggal_buat'];
                                                $tanggal_buat1 = date("d F Y", strtotime($tanggal_buat));
                                                echo $tanggal_buat1;
                                                ?>
                                                </td>

                                                <td>
                                                <?php
                                                $tanggal_selesai = $x['tanggal_selesai'];
                                                $tanggal_selesai1 = date("d F Y", strtotime($tanggal_selesai));
                                                echo $tanggal_selesai1;
                                                ?>
                                                
                                                </td>
                                                <td>
                                                <?php
                                                $status_proyek = $x['status'];

                                                if ($status_proyek == '1') {
                                                    $tanggal_hari_ini = date('d F Y');

                                                    if (strtotime($tanggal_hari_ini) < strtotime($tanggal_selesai1)) {
                                                        echo "Proyek belum selesai";
                                                    } else {
                                                        $waktu_selesai2 = date_create($tanggal_selesai1);
                                                        $tanggal_selesai2 = date_create($tanggal_selesai1);
                                                        $diff = date_diff($waktu_selesai2, $tanggal_selesai2);
                                                        echo "proyek selesai";
                                                    }
                                                } elseif ($status_proyek == '2') {
                                                    echo "Proyek sudah selesai";
                                                }
                                                ?>
                                            </td>
                                             
                                            </tr> 
                                    <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                  <!--/.card-body -->
                  </div>
                <!--/.card -->
            </div>
            <!--/.col -->
        </div>
        <!--/.row -->
        </div>
</body>

</html>
<?php
    } else {
        echo "Anda belum login";
        header("Location: login.php");
    }
}
?>