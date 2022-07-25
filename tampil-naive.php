<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Prediksi Tunggakan BP3 menggunakan Metode Naïve Bayes</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <link href="bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Semantic here -->
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/semantic.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="utama.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Admin</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="dataset.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Dataset</span></a>
      </li>

      <div class="sidebar-heading">
        Naive Bayes
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="hitung.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Hitung Prediksi</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="hasil.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Hasil Prediksi</span></a>
      </li>

      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="laporan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan Prediksi</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <style>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <title>Page Perhitungan</title>
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" type="text/css" media="screen" href="main.css">
              <script src="main.js"></script>
              </head>table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
              }

              td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
              }

              tr:nth-child(even) {
              background-color: #dddddd;
              }
              </style>              
              <div class="table-responsive">
                <table width="100%" cellspacing="0">
                  <tr>
                    <th rowspan="2">Label</th>
                    <th colspan="2">Nilai</th>
                    <th rowspan="2">Prediksi</th>
                  </tr>
                  <tr>
                    <th>Lunas</th>
                    <th>Menunggak</th>
                  </tr>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $ambil = mysqli_query($koneksi, "SELECT * FROM hasil_naive order by id_hasil desc limit 1");
                    while($data = mysqli_fetch_array($ambil)){
                    ?>
                      <tr>
                        <td><?= $data['label'] ?></td>
                        <td><?= $data['hasil_lunas'] ?></td>
                        <td><?= $data['hasil_menunggak'] ?></td>
                      <?php
                      if($data['hasil_lunas'] >= $data['hasil_menunggak']){
                        $label = 'lunas';
                      ?>
                      <td><button type="button" class="btn btn-primary"><span aria-hidden="true"></span><?= $label ?></button></td>
                      <?php
                      }else{
                        $label = 'menunggak';
                      ?>
                      <td><button type="button" class="btn btn-danger"><span aria-hidden="true"></span><?= $label ?></button></td>

                      <?php } ?>
                      </tr>
                      <?php } ?>
                </table>
              </div>

    </div>
    </div>
    </div>
    <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
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
        <div class="modal-body">Apakah kamu yakin ingin Keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="bootstrap/js/demo/datatables-demo.js"></script>

</body>

</html>
