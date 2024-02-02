<?php
  session_start();
  $username = $_SESSION['username'];
  include "config.php";
  $db = new Database();

  foreach($db->login($username) as $x){
    $akses_id = $x['akses_id'];
    if($akses_id=='1'){
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Property</title>

    <!-- Custom fonts for this template-->
    <link href="admin_css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin_css/css/sb-admin-2.min.css" rel="stylesheet">
     <!-- pertabelan -->
      <!-- Font Awesome -->
      <link rel="stylesheet" href="admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">RumahKreatif</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="dasboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Layanan Admin
            </div>
            <li class="nav-item">
                <a class="nav-link" href="property.php">
                <i class="fas fa-fw fa-home"></i>
                    <span>Property</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="proyek.php">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Proyek</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="laporan.php">
                    <i class="fas fa-fw fa-file"></i>

                    <span>Laporan</span></a>
            </li>
           

           
            <li class="nav-item">
                    <a class="nav-link" href="pembayaran.php">
                    <i class="fas fa-fw fa-credit-card"></i>
                        <span>Pembayaran</span></a>
                </li>
                 <!-- Nav Item - Pages Collapse Menu -->
 <!-- Profile Dropdown -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile">
        <i class="fas fa-fw fa-user"></i>
        <span>Profile</span>
    </a>
    <div id="collapseProfile" class="collapse" aria-labelledby="headingProfile" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="profile.php">Akun</a>
            <a class="collapse-item" href="profile_client.php">Client</a>
        </div>
    </div>
</li>

<!-- Lainnya Dropdown -->
<li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLainnya" aria-expanded="true" aria-controls="collapseLainnya">
        <i class="fas fa-fw fa-cog"></i>
        <span>Lainnya</span>
    </a>
    <div id="collapseLainnya" class="collapse" aria-labelledby="headingLainnya" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="ulasan.php">Ulasan</a>
            <a class="collapse-item" href="tampilkan_data_mandor.php">Mandor</a>
        </div>
    </div>
</li>



            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo  $x['foto']; ?>" alt="" width="50" height="50">
                               
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                             

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Laporan Keuangan</h1>
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
                                    <th>Harga</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $db = new Database();
                                $no = 1;
                                $total_harga = 0;
                                foreach ($db->tampil_pembelian() as $x) {
                                    $total_harga += $x['harga_rumah']; // Tambahkan harga ke total
                                ?>
                                   <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $x['nama_tipe']; ?></td>
                                        <td><?php echo $x['nama_client']; ?></td>
                                        <td><?php echo 'Rp ' . number_format($x['harga_rumah'], 0, ',', '.'); ?></td>
                                          
                                             
                                            </tr>
                                <?php } ?>
                            </tbody>
                         
                        </table>
                       <!-- Total Pemasukan -->
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp <?php echo number_format($total_harga, 0, ',', '.'); ?>
                            </div>
                        </div>

                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!--/.col -->
        </div>
             

            </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

   <!-- Bootstrap core JavaScript-->
   <script src="admin_css/vendor/jquery/jquery.min.js"></script>
    <script src="admin_css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin_css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin_css/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin_css/vendor/chart.js/Chart.min.js"></script>

        <!-- Pertabelan -->

<script src="admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="admin_lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin_lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="admin_lte/plugins/jszip/jszip.min.js"></script>
<script src="admin_lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="admin_lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="admin_lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="admin_lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="admin_lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="admin_lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_lte/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


</body>

</html>

                            <?php
                                } else {
                                    echo "Anda belum login";
                                    header("Location: login.php");
                                }
                            }
                            ?>