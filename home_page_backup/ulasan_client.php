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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/ulasan.css">
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
            <a class="nav-link active" href="ulasan_client.php">Ulasan</a>
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
                <img src="assets/images/image3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                    <h5>Selamat Datang Di Halaman Ulasan</h5>
                    <p>Berikan Ulasan Anda Untuk Kemajuan Pelayanan Kami</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 text-center">
         <h3>Ulasan</h3>
             <p>Berikan Ulasan Anda</p>
    </div>

    <div class="form-container">
        <form action="simpan_ulasan_client.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="nama_client">Nama Client</label>
            <input type="text" id="nama_client" name="nama_client">

            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="--"></option>
                <?php
                $no = 1;
                foreach ($db->tampil_data_jenis_kelamin() as $x) {
                    echo '<option value="' . $x['kode_jk'] . '">' . $x['keterangan_jk'] . '</option>';
                }
                ?>
            </select>

            <label for="ulasan">Ulasan</label>
            <textarea id="ulasan" name="ulasan"></textarea>

            <input type="submit" value="Simpan">
        </form>
    </div>

    <footer class="text-center mt-5">
    <p>&copy; 2023 Nama Perusahaan. Hak Cipta Dilindungi</p>
</footer>

    
 
    <script src="assets/js/bootstrap.bundle.min.js "  crossorigin="anonymous "></script>
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