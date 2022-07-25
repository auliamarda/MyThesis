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
          <span>Data User</span></a>
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
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    
    <!-- Modal Aksi -->
  <?php
  include 'koneksi.php';
  if(isset($_POST['simpan'])){
    $id=$_POST['id_admin'];
    $nama=$_POST['nama'];
    $user=$_POST['user'];
    $pass=md5($_POST['pass']);
    $query=mysqli_query($koneksi, "INSERT INTO admin VALUES ('$id','$nama','$user','$pass')") or die(mysql_error());
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="3; URL=admin.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="2; URL=admin.php">';
      endif;             
  }elseif(isset($_POST['update'])){
    $id=$_POST['id_admin'];
    $nama=$_POST['nama'];
    $user=$_POST['user'];
    $pass=md5($_POST['pass']);
    $query=mysqli_query($koneksi,"UPDATE admin SET nama='$nama',user='$user',pass='$pass' WHERE id_admin='$id'") or die(mysql_error());
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="3; URL=admin.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="2; URL=admin.php">';
      endif;
  }elseif(isset($_POST['hapus'])){
    $id=$_POST['id_admin'];
    $query=mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id'") or die(mysql_error());
     if($query):
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di hapus!', 'success');</script>" ;
        echo '<meta http-equiv="Refresh" content="3; URL=admin.php">';
      else:
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
        echo '<meta http-equiv="Refresh" content="2; URL=admin.php">';
      endif;
  }
  ?>
  <!-- Tutup Modal Aksi -->

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
            <!-- Modal Tambah -->
            <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' data-toggle="modal" data-target="#myModal"><span aria-hidden="true"></span>Tambah Data</button>
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="form-group">
                          <?php
                          include "koneksi.php";
                          $amil1 = mysqli_query($koneksi, "SELECT count(*) AS hasil FROM admin") or die(mysql_error());
                          $no = mysqli_fetch_array($amil1);
                          $noBaru = $no['hasil'] + 1;
                          ?>
                          <label for="id_admin">Id Admin </label>
                          <input type="text" name="id_admin" class="form-control" value="<?php echo $noBaru; ?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama Admin</label>
                           <input type="text" name="nama" class="form-control" placeholder="input Nama Admin">
                        </div>
                        <div class="form-group">
                          <label for="user">Username</label>
                           <input type="text" name="user" class="form-control" placeholder="input username">
                        </div>
                        <div class="form-group">
                          <label for="pass">Password</label>
                           <input type="text" name="pass" class="form-control" placeholder="input password">
                        </div>
                        <div class="modal-footer">
                           <button type="reset" name="simpan" class="btn btn-primary">Reset</button>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="submit" name="simpan" class="btn btn-primary">Tambah Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Tutup Modal Tambah -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Admin</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <?php
                  include 'koneksi.php';
                  $no = 1;
                  $ambil = mysqli_query($koneksi, "SELECT * FROM admin");
                  while($data = mysqli_fetch_array($ambil)){
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['user'] ?></td>
                      <td><?= $data['pass'] ?></td>
                      
                      <!-- aksi modal edit -->
                      <td class="align-middle text-center">
                      <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['id_admin'];?>"><span aria-hidden="true"></span>Edit</button>
                      <div class="modal fade" id="my<?php echo $data['id_admin'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                      <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="phAnimate">
                          <label for="id_admin">Id Admin</label>
                          <input name="id_admin" class="form-control" placeholder="Input Id" value="<?php echo $data['id_admin']; ?>" readonly="">
                        </div>
                        <div class="phAnimate">
                          <label for="nama">Nama Admin</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="phAnimate">
                          <label for="user">Username</label>
                          <input type="text" name="user" class="form-control" value="<?php echo $data['user']; ?>">
                        </div>
                        <div class="phAnimate">
                          <label for="pass">Password</label>
                          <input type="text" name="pass" class="form-control" value="<?php echo $data['pass']; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="reset" class="btn btn-default" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-primary">Edit Data</button>
                        </div>
                      </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      <!--tutup modal edit -->

                      <!-- Modal Hapus -->
                      <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm' data-toggle="modal" data-target="#myy<?php echo $data['id_admin']; ?>"><span aria-hidden="true"></span>Hapus</button>
                      <div class="modal fade" id="myy<?php echo $data['id_admin'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="POST" role="form">
                          <div class="phAnimate">
                          <label for="id_admin">Id Admin</label>
                          <input name="id_admin" class="form-control" placeholder="Input Id" value="<?php echo $data['id_admin']; ?>" readonly="">
                          </div>
                          <div class="phAnimate">
                            <label for="nama">Nama Admin</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly="">
                          </div>
                          <div class="phAnimate">
                            <label for="user">Username</label>
                            <input type="text" name="user" class="form-control" value="<?php echo $data['user']; ?>" readonly="">
                          </div>
                          <div class="phAnimate">
                            <label for="pass">Password</label>
                            <input type="text" name="pass" class="form-control" value="<?php echo $data['pass']; ?>" readonly="">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class=" btn btn-primary btn-danger" name="hapus">Hapus Data</button>
                          </div>
                        </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      <!-- Tutup Modal Hapus -->
                    </tr>
                        <?php } ?>
                  </tbody>
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
