
<?php
  session_start();
  $username = $_SESSION['username'];
  include "config.php";
  $db = new Database();

  foreach($db->login($username) as $x){
    $akses_id = $x['akses_id'];
    if($akses_id=='2'){
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/home_admin1.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!--  -->
    <title>Cliet Page</title>
</head>

<body>
    <!-- Navbar -->
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
            <a class="nav-link active" aria-current="page" href="menu_client.php">Home</a>
        </li>
        <li class="nav-item mx-3">
            <a class="nav-link" href="service_client.php">Service</a>
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
    <!-- Hero -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/aset1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Selamat Datang di Web Kami</h5>
                   
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/aset2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bangun Rumah impian Bersama Kami</h5>
                   
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/aset3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nikmati Layanan Terbaik Kami</h5>
                   
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>

    <!-- Layanan Section -->
    <section id="layanan">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Layanan Perusahaan</h2>
                    <span class="sub-title">Layanan Terbaik dari Perusahaan Kami Yang Akan Membantu Mewujudkan Rumah Impian Anda</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 text-center">
                    <div class="card-layanan">
                    <a href="service_client.php">
                        <div class="circle-icon">
                            <img src="assets/images/rumah.png" alt="">
                        </div>
                        <h3 style="color: black;">Pembangunan Rumah</h3>
                        <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, asperiores?</p>

                    </div>
                    </a>
                   
                </div>

                <div class="col-md-4 text-center">
                
                    <div class="card-layanan">
                    <a href="ulasan_client.php">
                        <div class="circle-icon">
                            <img src="assets/images/ulasan.png" alt="">
                        </div>
                        <h3 style="color: black;">Ulasan</h3>
                        <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, asperiores?</p>

                    </div>
                </a>
                </div>

                <div class="col-md-4 text-center">
                    <a href="progres_client.php">
                    <div class="card-layanan">
                    <a href="ulasan_client.php">
                        <div class="circle-icon">
                            <img src="assets/images/progress.png" alt="">
                        </div>
                        <h3 style="color: black;">Progres</h3>
                        <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, asperiores?</p>

                    </div>

                    </a>
                    
                </div>
            </div>
        </div>
    </section>
   
    <!-- Footer -->
    <footer class="text-center mt-5">
    <p>&copy; 2023 Nama Perusahaan. Hak Cipta Dilindungi</p>
</footer>

    <script src="assets/js/bootstrap.bundle.min.js "  crossorigin="anonymous "></script>


</body>

</html>

<?php
 } else {
 echo "Anda belum login";
header("Location: login.php");
 exit();
}
}
?>