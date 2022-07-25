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
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
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
              <div class="table-responsive">
                </br>
                </br>
                <!-- Style custom -->
                <style>
                  /* <meta charset="utf-8"><meta http-equiv="X-UA-Compatible"content="IE=edge"><title>Page Perhitungan</title><meta name="viewport"content="width=device-width, initial-scale=1"><link rel="stylesheet"type="text/css"media="screen"href="main.css">
                  <script src="main.js"></script></head> */
                  table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                  }

                  td,
                  th {
                    border: 1px solid #dddddd;
                    text-align: center;
                    padding: 8px;
                  }

                  tr:nth-child(even) {
                    background-color: #dddddd;
                  }
                </style>
                <?php
                include 'koneksi.php';
                if (isset($_POST['simpan'])) {
                  $no = $_POST['no_hasil'];
                  $status_ayah = $_POST['status_ayah'];
                  $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
                  $gaji_ayah = $_POST['gaji_ayah'];
                  $status_ibu = $_POST['status_ibu'];
                  $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
                  $gaji_ibu = $_POST['gaji_ibu'];

                  //naive_bayes

                  $total_lunas = $koneksi->query("SELECT * FROM data_train WHERE label='lunas'")->num_rows;
                  $total_menunggak = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak'")->num_rows;
                  $totalData = $koneksi->query("SELECT * FROM data_train")->num_rows;

                  // status ayah

                  //lunas

                  $total_sal = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and status_ayah = '$status_ayah'")->num_rows;

                  //menunggak

                  $total_sam = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and status_ayah = '$status_ayah'")->num_rows;



                  // pekerjaan ayah

                  //lunas

                  $total_pal = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and pekerjaan_ayah = '$pekerjaan_ayah'")->num_rows;

                  //menunggak

                  $total_pam = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and pekerjaan_ayah = '$pekerjaan_ayah'")->num_rows;




                  // gaji ayah

                  //lunas

                  $total_gal = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and gaji_ayah = '$gaji_ayah'")->num_rows;

                  //menunggak

                  $total_gam = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and gaji_ayah = '$gaji_ayah'")->num_rows;





                  // status ibu

                  //lunas

                  $total_sil = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and status_ibu = '$status_ibu'")->num_rows;

                  //menunggak

                  $total_sim = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and status_ibu = '$status_ibu'")->num_rows;



                  // pekerjaan ibu

                  //lunas

                  $total_pil = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and pekerjaan_ibu = '$pekerjaan_ibu'")->num_rows;

                  //menunggak

                  $total_pim = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and pekerjaan_ibu = '$pekerjaan_ibu'")->num_rows;





                  // gaji ibu

                  //lunas

                  $total_gil = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and gaji_ibu = '$gaji_ibu'")->num_rows;

                  //menunggak

                  $total_gim = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and gaji_ibu = '$gaji_ibu'")->num_rows;

                  //PROBABILITY + laplace

                  //status ayah

                  $PROB_sal  = (($total_sal  + 1) / ($total_lunas  + 2));
                  $PROB_sam  = (($total_sam  + 1) / ($total_menunggak  + 2));

                  //pekerjaan ayah

                  $PROB_pal  = (($total_pal  + 1) / ($total_lunas  + 37));
                  $PROB_pam = (($total_pam  + 1) / ($total_menunggak  + 37));

                  //gaji ayah

                  $PROB_gal  = (($total_gal  + 1) / ($total_lunas  + 6));
                  $PROB_gam  = (($total_gam  + 1) / ($total_menunggak  + 6));

                  //status ibu

                  $PROB_sil  = (($total_sil  + 1) / ($total_lunas  + 2));
                  $PROB_sim  = (($total_sim  + 1) / ($total_menunggak  + 2));

                  //pekerjaan ibu

                  $PROB_pil  = (($total_pil  + 1) / ($total_lunas  + 22));
                  $PROB_pim  = (($total_pim  + 1) / ($total_menunggak  + 22));

                  //gaji ibu

                  $PROB_gil  = (($total_gil  + 1) / ($total_lunas + 6));
                  $PROB_gim  = (($total_gim  + 1) / ($total_menunggak + 6));


                  //prediksi

                  $lunas1 = $PROB_sal * $PROB_pal * $PROB_gal  * $PROB_sil  * $PROB_pil   * $PROB_gil;

                  $lunas = number_format((float) $lunas1 * ($total_lunas / $totalData), 5, '.', '');


                  $menunggak1 = $PROB_sam   * $PROB_pam  * $PROB_gam  * $PROB_sim  * $PROB_pim   * $PROB_gim;

                  $menunggak = number_format((float) $menunggak1 * ($total_menunggak / $totalData), 5, '.', '');

                  //membandingkan

                  if ($lunas >= $menunggak) {
                    $labelp = "lunas";
                    $bobot = $lunas;
                  } else {
                    $labelp = "menunggak";
                    $bobot = $menunggak;
                  }

                  //confusion matrix

                  if ($label == "lunas" && $labelp == "lunas") {
                    $cm = "TP";
                  } elseif ($label == "lunas" && $labelp == "menunggak") {
                    $cm = "FN";
                  } elseif ($label == "menunggak" && $labelp == "lunas") {
                    $cm = "FP";
                  } elseif ($label == "menunggak" && $labelp == "menunggak") {
                    $cm = "TN";
                  }
                  //INSERT
                  $query = mysqli_query($koneksi, "INSERT INTO hasil_naive VALUES ('$status_ayah','$pekerjaan_ayah','$gaji_ayah','$status_ibu','$pekerjaan_ibu','$gaji_ibu','$lunas','$menunggak')") or die(mysqli_error($koneksi));
                  if ($query) :
                    echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>";
                    echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
                  else :
                    echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
                    echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
                  endif;
                } ?>
                <table>
                  <form action="proses-naive.php" method="post">
                    <div class="form-group">
                      <div class="form-group">
                        <label for="status_ayah">Status Ayah</label>
                        <select class="form-control" name="status_ayah">
                          <option>hidup</option>
                          <option>meninggal</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <select class="form-control" name="pekerjaan_ayah">
                          <option>Administrator</option>
                          <option>Akuntan</option>
                          <option>Buruh</option>
                          <option>Camat</option>
                          <option>Dosen</option>
                          <option>Guru (pengajar)</option>
                          <option>Insinyur</option>
                          <option>Karyawan</option>
                          <option>Konsultan</option>
                          <option>Lain-lain</option>
                          <option>Lurah/Kades</option>
                          <option>Manajer</option>
                          <option>Masinis (Juru Mesin)</option>
                          <option>Nahkoda</option>
                          <option>Nelayan</option>
                          <option>Pedagang</option>
                          <option>Pegawai Negeri (PNS)</option>
                          <option>Pegawai Swasta</option>
                          <option>Pekerja Sosial</option>
                          <option>Pelaut</option>
                          <option>Pendeta</option>
                          <option>Pengacara</option>
                          <option>Pengusaha</option>
                          <option>PENSIUN</option>
                          <option>Petani</option>
                          <option>Polisi</option>
                          <option>Politikus</option>
                          <option>Satpam</option>
                          <option>Sopir</option>
                          <option>TIDAK BEKERJA</option>
                          <option>TNI</option>
                          <option>Tukang Jahit</option>
                          <option>Tukang Kayu</option>
                          <option>Tukang Las</option>
                          <option>Tukang Listrik</option>
                          <option>Wartawan</option>
                          <option>Wiraswasta (Usaha Sendiri)</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="gaji_ayah">Gaji Ayah</label>
                        <select class="form-control" name="gaji_ayah">
                          <option value="<Rp.500.000">&lt;Rp.500.000</option>
                          <option value=">Rp.12.000.001">&gt;Rp.12.000.001</option>
                          <option value="Rp.1.000.001,- sampai Rp.3.500.000,-">Rp.1.000.001,- sampai Rp.3.500.000,-</option>
                          <option value="Rp.3.500.001,- sampai Rp.7.000.000,-">Rp.3.500.001,- sampai Rp.7.000.000,-</option>
                          <option value="Rp.500.001,- sampai Rp.1.000.000,-">Rp.500.001,- sampai Rp.1.000.000,-</option>
                          <option value="Rp.7.000.001,- sampai Rp.12.000.000,-">Rp.7.000.001,- sampai Rp.12.000.000,-</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="status_ibu">Status Ibu</label>
                        <select class="form-control" name="status_ibu">
                          <option>hidup</option>
                          <option>meninggal</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <select class="form-control" name="pekerjaan_ibu">
                          <option>Administrator</option>
                          <option>Apoteker</option>
                          <option>Bidan</option>
                          <option>Buruh</option>
                          <option>Dosen</option>
                          <option>Guru (Pengajar)</option>
                          <option>Ibu Rumah Tangga</option>
                          <option>Karyawan</option>
                          <option>Koki (Juru Masak)</option>
                          <option>Lain-lain</option>
                          <option>Manajer</option>
                          <option>Pedagang</option>
                          <option>Pegawai Negeri (PNS)</option>
                          <option>Pegawai Swasta</option>
                          <option>Pengusaha</option>
                          <option>PENSIUN</option>
                          <option>Perawat</option>
                          <option>Petani</option>
                          <option>TIDAK BEKERJA</option>
                          <option>TNI</option>
                          <option>Tukang Jahit</option>
                          <option>Wiraswasta (Usaha Sendiri)</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="gaji_ibu">Gaji Ibu</label>
                        <select class="form-control" name="gaji_ibu">
                          <option value="<Rp.500.000">&lt;Rp.500.000</option>
                          <option value=">Rp.12.000.001">&gt;Rp.12.000.001</option>
                          <option value="Rp.1.000.001,- sampai Rp.3.500.000,-">Rp.1.000.001,- sampai Rp.3.500.000,-</option>
                          <option value="Rp.3.500.001,- sampai Rp.7.000.000,-">Rp.3.500.001,- sampai Rp.7.000.000,-</option>
                          <option value="Rp.500.001,- sampai Rp.1.000.000,-">Rp.500.001,- sampai Rp.1.000.000,-</option>
                          <option value="Rp.7.000.001,- sampai Rp.12.000.000,-">Rp.7.000.001,- sampai Rp.12.000.000,-</option>
                        </select>
                      </div>


                      <div class="modal-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Proses</button>
                      </div>
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