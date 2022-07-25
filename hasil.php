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
  <link href="bootstrap/pagination.css" rel="stylesheet">

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
          <span>Data Training</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datatesting.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Testing</span></a>
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
      <li class="nav-item active">
        <a class="nav-link" href="performa.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Performa</span></a>
      </li>

<!--
      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="laporan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan Naive</span></a>
      </li>
       Divider -->
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
            <div class="card-header py-3">
            <a href="export-excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fas fa-sm text-white-50"></i>Export to Excel
              </a>
              <a href="export-pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                <i class="fas fa-sm text-white-50"></i>Export to PDF
              </a>
            <a href="hitung.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-sm text-white-50"></i>
              Tambah Data
            </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table align="text-center" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">Label</th>
                    <th colspan="2">Nilai</th>
                    <th rowspan="2">Prediksi</th>
                    <th rowspan="2">Aksi</th>
                  </tr>
                  <tr>
                    <th>Lunas</th>
                    <th>Menunggak</th>
                  </tr>
                  <?php
                  include 'koneksi.php';
                  $page = (isset($_GET['page']))? $_GET['page'] : 1;
                  $limit = 12;
                  $limit_start = ($page - 1) * $limit;
                  $sql = mysqli_query($koneksi, "SELECT * FROM hasil_naive LIMIT ".$limit_start.",".$limit);
                  $no = $limit_start + 1;
                  while($data = mysqli_fetch_array($sql)){
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $data['id_hasil'] ?></td>
                      <td><?= $data['label'] ?></td>
                      <td><?= $data['hasil_lunas'] ?></td>
                      <td><?= $data['hasil_menunggak'] ?></td>
                      <?php
                      if($data['hasil_lunas'] > $data['hasil_menunggak']){
                        $label = 'lunas';
                      ?>
                      <td><button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'><span aria-hidden="true"></span><?= $label ?></button></td>
                      <?php
                      }else{
                        $label = 'menunggak';
                      ?>
                      <td><button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm'><span aria-hidden="true"></span><?= $label ?></button></td>

                      <?php } ?>
                      <td><?="<a href='hapus-hasil.php?id=".$data['id_hasil']."' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'><span>Hapus</span></a>";?>

                      <!-- Modal Detail -->
                      <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm' data-toggle="modal" data-target="#view<?php echo $data['no_hasil']; ?>"><span aria-hidden="true"></span>Detail</button>
                      <div class="modal fade" id="view<?php echo $data['no_hasil'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="POST" role="form">
                          <div class="form-group">
                            <label for="id_hasil">No Hasil                      : <?php echo $data['no_hasil'];?> </label>
                          </div>
                          <div class="form-group">
                            <label for="label">Label                            : <?php echo $data['label'];?></label>
                          </div> 
                          <div class="form-group">
                            <label for="status_ayah">Status Ayah                : <?php echo $data['status_ayah'];?></label>
                          </div> 
                          <div class="form-group">
                            <label for="pekerjaan_ayah">Jenis Kelamin           : <?php echo $data['pekerjaan_ayah'];?></label>
                          </div>
                          <div class="form-group">
                            <label for="gaji_ayah">Gaji Ayah                    : <?php echo $data['gaji_ayah'];?></label>
                          </div>
                          <div class="form-group">
                            <label for="status_ibu">Status Ibu                  : <?php echo $data['status_ibu'];?></label>
                          </div>
                          <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu            : <?php echo $data['pekerjaan_ibu'];?></label>
                          </div>
                          <div class="form-group">
                            <label for="gaji_ibu">Gaji Ibu                      : <?php echo $data['gaji_ibu'];?></label>
                          </div>
                          <div class="form-group">
                            <label for="nilai_lunas">Hasil Lunas                : <?php echo $data['hasil_lunas'];?></label>
                          </div>
                          <div class="form-group">
                            <label for="nilai_menunggak">Hasil menunggak        : <?php echo $data['hasil_menunggak'];?></label>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      <!-- Tutup Modal Detail -->
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
             </div>
             <ul class="pagination">
              <?php
              if($page == 1){
              ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
              <?php
              }else{
                $link_prev = ($page > 1)? $page - 1 : 1;
              ?>
                <li><a href="hasil.php?page=1">First</a></li>
                <li><a href="hasil.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
              <?php
              }
              ?>
              <?php
              include 'koneksi.php';
              $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM hasil_naive");
              $get_jumlah = mysqli_fetch_array($sql2);
              
              $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
              $jumlah_number = 3;
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
              
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' class="active"' : '';
              ?>
                <li<?php echo $link_active; ?>><a href="hasil.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
              }
              ?>
              <?php
              if($page == $jumlah_page){
              ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
              <?php
              }else{
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
              ?>
                <li><a href="hasil.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="hasil.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
              <?php
              }
              ?>
            </ul>
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
