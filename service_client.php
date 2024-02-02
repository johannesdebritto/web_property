<?php
  session_start();
  $username = $_SESSION['username'];
  include "config.php";
  $db = new Database();

  foreach($db->login($username) as $x){
    $akses_id = $x['akses_id'];
    if($akses_id=='2'){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
 
    <!--  -->
    <title>Service page</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/home_admin1.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
                    <a class="nav-link active" href="service_client.php">Service</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="ulasan_client.php">Ulasan</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="progres_client.php">Progres</a>
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
                <img src="assets/images/welcome1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                    <h5>Selamat Datang Di Halaman Layanan</h5>
                    <p>Kami Membantu Membuat Rumah Impian Anda</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 text-center">
    <h3>Pelayanan Pembangunan Rumah</h3>
    <p>Bangun Rumah Impian Anda bersama kami</p>
</div>

<div class="container mt-3">
    <h1 class="text-center">Tipe Rumah</h1>

    <div class="row">
        <?php
        foreach ($db->tampil_property() as $x) {
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <?php if (!empty($x['foto'])) { ?>
                    <img src="<?php echo $x['foto']; ?>" class="card-img-top" alt="Foto Rumah">
                <?php } else { ?>
                    <div class="text-center mt-3">
                        <font color="red">Belum ada foto</font>
                    </div>
                <?php } ?>

                <div class="card-body">
                    <h5 class="card-title"><?php echo $x['nama_tipe']; ?></h5>
                    <p class="card-text">
                        <strong>Kode Tipe Rumah:</strong> <?php echo $x['kode_rumah']; ?><br>
                        <strong>Harga:</strong> Rp <?php echo number_format($x['harga_rumah'], 0, ',', '.'); ?>
                    </p>
                    <!-- Jika ada detail rumah, ganti href dengan link detail -->
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#detailModal<?php echo $x['kode_rumah']; ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Detail
                    </a>
                  
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <div class="container mt-5">
    <h1 class="text-center">Beli Rumah Impian Anda</h1>
    <p class="text-center">Beli Rumah Impian Anda dengan kualitas Terbaik</p>
    <div class="text-center">
    <a class="btn btn-success" href="beli_rumah.php" role="button">Beli Rumah Impianmu</a>
    </div>
    </div>

  
</div>
<footer class="text-center mt-5">
    <p>&copy; 2023 Nama Perusahaan. Hak Cipta Dilindungi</p>
</footer>
<!-- modal-->
<?php foreach ($db->tampil_property() as $x) { ?>
    <div class="modal fade" id="detailModal<?php echo $x['kode_rumah']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Tipe Rumah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Kode Tipe Rumah:</strong> <?php echo $x['kode_rumah']; ?><br>
                    <strong>Nama Tipe Rumah:</strong> <?php echo $x['nama_tipe']; ?><br>
                    <strong>Harga:</strong> Rp <?php echo number_format($x['harga_rumah'], 0, ',', '.'); ?><br>
                    <strong>Deskripsi:</strong> <?php echo $x['deskripsi']; ?><br>

                    <?php if (!empty($x['foto'])) { ?>
                        <strong>Foto:</strong><br>
                        <img src="<?php echo $x['foto']; ?>" alt="" width="100" height="100"><br>
                    <?php } else { ?>
                        <font color="red">Belum ada foto</font><br>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


    

    <script src="assets/js/bootstrap.bundle.min.js "  crossorigin="anonymous "></script>
      <!-- Bootstrap core JavaScript-->
      <script src="admin_css/vendor/jquery/jquery.min.js"></script>
        <script src="admin_css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="admin_css/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="admin_css/js/sb-admin-2.min.js"></script>

        

    
       
</body>
<!-- Navbar -->

</html>

<?php
 } else {
 echo "Anda belum login";
header("Location: login.php");
 exit();
}
}
?>