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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Data Material</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin_lte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="admin_lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_lte/dist/css/adminlte.min.css">
</head>
<body>

<!-- Content Wrapper. Contains page content -->
<div >
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div >
                <div >
                    <h1>Data Material</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menampilkan Data Material</h3>
                    </div>
                    <!--/.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Material</th>
                                <th>Nama Material</th>
                                <th>Satuan</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($db->tampil_material() as $x) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $x['kode_material']; ?></td>
                                    <td><?php echo $x['nama_material']; ?></td>
                                    <td><?php echo $x['keterangan_m']; ?></td>
                                    <td><?php echo $x['jumlah']; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
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
           <!--/.container-fluid -->
       </section>
       <!--/.content -->
       <!--/.content-wrapper -->
   </div>
                            <!-- jQuery -->
<script src="admin_lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
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
      }
      else{
        echo "Anda belum login";
        header("Location: login.php");
      }
    }
?>                        


