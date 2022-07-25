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
     Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>


    <?php


    ?>
    <!-- Modal Aksi -->
    <?php
    include 'koneksi.php';
    if (isset($_POST['simpan'])) {
      //$no=$_POST['no_testing'];
      $no = $_POST['no_train'];
      $no_reg = $_POST['no_reg'];
      $status_ayah = $_POST['status_ayah'];
      $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
      $gaji_ayah = $_POST['gaji_ayah'];
      $status_ibu = $_POST['status_ibu'];
      $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
      $gaji_ibu = $_POST['gaji_ibu'];
      $label = $_POST['label_act'];

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
      $query = mysqli_query($koneksi, "INSERT INTO data_testing VALUES ('$no_reg','$status_ayah','$pekerjaan_ayah','$gaji_ayah','$status_ibu','$pekerjaan_ibu','$gaji_ibu','$label','$labelp','$bobot','$cm')") or die(mysqli_error($koneksi));
      if ($query) :
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>";
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      else :
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      endif;
    } elseif (isset($_POST['update'])) {
      $no = $_POST['no_testing'];
      $no_reg = $_POST['no_reg'];
      $status_ayah = $_POST['status_ayah'];
      $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
      $gaji_ayah = $_POST['gaji_ayah'];
      $status_ibu = $_POST['status_ibu'];
      $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
      $gaji_ibu = $_POST['gaji_ibu'];
      $label = $_POST['label_act'];

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
      $query = mysqli_query($koneksi, "UPDATE data_testing SET no_reg='$no_reg', status_ayah='$status_ayah',pekerjaan_ayah='$pekerjaan_ayah',gaji_ayah='$gaji_ayah',status_ibu='$status_ibu',pekerjaan_ibu='$pekerjaan_ibu',gaji_ibu='$gaji_ibu',label_act='$label', label_prediksi = '$labelp', bobot = '$bobot', cm = '$cm'  WHERE no_testing='$no'") or die(mysqli_error($koneksi));
      if ($query) :
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>";
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      else :
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      endif;
    } elseif (isset($_POST['hapus'])) {
      $no = $_POST['no_testing'];
      $query = mysqli_query($koneksi, "DELETE FROM data_testing WHERE no_testing='$no'") or die(mysqli_error($koneksi));
      if ($query) :
        echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di hapus!', 'success');</script>";
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      else :
        echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
        echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
      endif;
    }

    //insert excel
    require_once('vendor/php-excel-reader/excel_reader2.php');
    require_once('vendor/SpreadsheetReader.php');

    if (isset($_POST["import"])) {

      $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

      if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        for ($i = 0; $i < $sheetCount; $i++) {

          $Reader->ChangeSheet($i);

          foreach ($Reader as $Row) {

            $no_reg = "";
            if (isset($Row[0])) {
              $no_reg = mysqli_real_escape_string($koneksi, $Row[0]);
            }

            $status_ayah = "";
            if (isset($Row[1])) {
              $status_ayah = mysqli_real_escape_string($koneksi, $Row[1]);
            }
            $pekerjaan_ayah = "";
            if (isset($Row[2])) {
              $pekerjaan_ayah = mysqli_real_escape_string($koneksi, $Row[2]);
            }

            $gaji_ayah = "";
            if (isset($Row[3])) {
              $gaji_ayah = mysqli_real_escape_string($koneksi, $Row[3]);
            }
            $status_ibu = "";
            if (isset($Row[4])) {
              $status_ibu = mysqli_real_escape_string($koneksi, $Row[4]);
            }

            $pekerjaan_ibu = "";
            if (isset($Row[5])) {
              $pekerjaan_ibu = mysqli_real_escape_string($koneksi, $Row[5]);
            }

            $gaji_ibu = "";
            if (isset($Row[6])) {
              $gaji_ibu = mysqli_real_escape_string($koneksi, $Row[6]);
            }

            $label = "";
            if (isset($Row[7])) {
              $label = mysqli_real_escape_string($koneksi, $Row[7]);
            }

            if (!empty($no_reg) || !empty($status_ayah) || !empty($pekerjaan_ayah) || !empty($gaji_ayah) || !empty($status_ibu) || !empty($pekerjaan_ibu) || !empty($gaji_ibu) || !empty($label)) {


              $sql = "INSERT INTO data_train (no_reg, status_ayah, pekerjaan_ayah, gaji_ayah, status_ibu, pekerjaan_ibu, gaji_ibu, label) VALUES
                 ('" . $no_reg . "','" . $status_ayah . "','" . $pekerjaan_ayah . "','" . $gaji_ayah . "','" . $status_ibu . "','" . $pekerjaan_ibu . "','" . $gaji_ibu . "','" . $label . "')";
              if (!$koneksi->query($sql)) {
                echo $koneksi->error;
                die();
              }
              //  header("location:datatesting.php");
            } else {
              $type = "error";
              $message = "Invalid File Type. Upload Excel File.";
            }

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
            $cm = "";
            if ($label == "LUNAS" && $labelp == "lunas") {
              $cm = "TP";
            } elseif ($label == "LUNAS" && $labelp == "menunggak") {
              $cm = "FN";
            } elseif ($label == "MENUNGGAK" && $labelp == "lunas") {
              $cm = "FP";
            } elseif ($label == "MENUNGGAK" && $labelp == "menunggak") {
              $cm = "TN";
            }

            if (!empty($status_ayah) || !empty($pekerjaan_ayah) || !empty($gaji_ayah) || !empty($status_ibu) || !empty($pekerjaan_ibu) || !empty($gaji_ibu) || !empty($label)) {


              $sql = "INSERT INTO data_testing (no_reg, status_ayah, pekerjaan_ayah, gaji_ayah, status_ibu, pekerjaan_ibu, gaji_ibu, label_act, label_prediksi, bobot, cm) VALUES
                   ('" . $no_reg . "','" . $status_ayah . "','" . $pekerjaan_ayah . "','" . $gaji_ayah . "','" . $status_ibu . "','" . $pekerjaan_ibu . "','" . $gaji_ibu . "','" . $label . "','" . $labelp . "','" . $bobot . "', '" . $cm . "')";
              if (!$koneksi->query($sql)) {
                echo $koneksi->error;
                die();
              }
              //  header("location:datatesting.php");
            }
          }
        }
      } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
      }
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
              <!-- Modal Export Excel -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Import dari Excel</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Pilih Excel</h6>
                  <p class="card-text">
                    Kolom A = No.
                    Kolom B = No. Reg
                    Kolom C = Status Ayah
                    Kolom D = Pekerjaan Ayah
                    Kolom E = Gaji Ayah
                    Kolom F = Status Ibu
                    Kolom G = Pekerjaan Ibu
                    Kolom H = Gaji Ibu
                    Kolom I = Label </p>
                  <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <input type="file" name="file" id="file" accept=".xls">
                    <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                  </form>
                  <div id="response" class="<?php if (!empty($type)) {
                                              echo $type . " display-block";
                                            } ?>"><?php if (!empty($message)) {
                                                                                                              echo $message;
                                                                                                            } ?></div>


                </div>
              </div>
              <!-- Modal Tambah -->
              <br>
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
                          $amil1 = mysqli_query($koneksi, "SELECT count(*) AS hasil FROM data_testing") or die(mysqli_error($koneksi));
                          $no = mysqli_fetch_array($amil1);
                          $noBaru = $no['hasil'] + 1;
                          ?>
                          <!--label for="no_testing">No Train</label>
                          <input type="text" name="no_testing" class="form-control" value="<?php echo $noBaru; ?>" readonly="">
                        -->
                        </div>

                        <div class="form-group">
                          <label for="no_reg">No Reg</label>
                          <input type="text" name="no_reg" id="no_reg" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="status_ayah">Status Ayah</label>
                          <select class="form-control" name="status_ayah">
                            <option value="hidup">Hidup</option>
                            <option value="meninggal">Meninggal</option>

                          </select>
                        </div>

                        <div class="form-group">
                          <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                          <select class="form-control" name="pekerjaan_ayah">
                            <option value="administrator">Administrator</option>
                            <option value="akuntan">Akuntan</option>
                            <option value="buruh">Buruh</option>
                            <option value="camat">Camat</option>
                            <option value="dosen">Dosen</option>
                            <option value="guru">Guru (pengajar)</option>
                            <option value="insinyur">Insinyur</option>
                            <option value="karyawan">Karyawan</option>
                            <option value="konsultan">Konsultan</option>
                            <option value="lain_lain">Lain-lain</option>
                            <option value="lurah">Lurah/Kades</option>
                            <option value="manajer">Manajer</option>
                            <option value="masinis">Masinis</option>
                            <option value="Nahkoda">Nahkoda</option>
                            <option value="nelayan">Nelayan</option>
                            <option value="pedagang">Pedagang</option>
                            <option value="pegawai_negeri">Pegawai Negeri (PNS)</option>
                            <option value="pegawai_swasta">Pegawai Swasta</option>
                            <option value="Pekerja_sosial">Pekerja Sosial</option>
                            <option value="pelaut">Pelaut</option>
                            <option value="pendeta">Pendeta</option>
                            <option value="pengacara">Pengacara</option>
                            <option value="pengusaha">Pengusaha</option>
                            <option value="pensiun">Pensiun</option>
                            <option value="petani">Petani</option>
                            <option value="polisi">Polisi</option>
                            <option value="politikus">Politikus</option>
                            <option value="satpam">Satpam</option>
                            <option value="sopir">Sopir</option>
                            <option value="tidak_bekerja">Tidak Bekerja</option>
                            <option value="tni">TNI</option>
                            <option value="tukang_jahit">Tukang Jahit</option>
                            <option value="tukang_kayu">Tukang Kayu</option>
                            <option value="tukang_las">Tukang Las</option>
                            <option value="tukang_listrik">Tukang Listrik</option>
                            <option value="wartawan">Wartawan</option>
                            <option value="wiraswasta">Wiraswasta</option>
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
                            <option value="hidup">Hidup</option>
                            <option value="meninggal">Meninggal</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="pekerjaan_ibu">Status Ibu</label>
                          <select class="form-control" name="pekerjaan_ibu">
                            <option value="administrator">Administrator</option>
                            <option value="apoteker">Apoteker</option>
                            <option value="bidan">Bidan</option>
                            <option value="buruh">Buruh</option>
                            <option value="dosen">Dosen</option>
                            <option value="guru">Guru (Pengajar)</option>
                            <option value="irt">Ibu Rumah Tangga</option>
                            <option value="karyawan">Karyawan</option>
                            <option value="koki">Koki (Juru Masak)</option>
                            <option value="lain_lain">Lain-lain</option>
                            <option value="manajer">Manajer</option>
                            <option value="pedagang">Pedagang</option>
                            <option value="pegawai_negeri">Pegawai Negeri (PNS)</option>
                            <option value="pegawai_swasta">Pegawai Swasta</option>
                            <option value="pengusaha">Pengusaha</option>
                            <option value="pensiun">Pensiun</option>
                            <option value="perawat">Perawat</option>
                            <option value="petani">Petani</option>
                            <option value="tidak_bekerja">Tidak Bekerja</option>
                            <option value="tni">TNI</option>
                            <option value="tukang_jahit">Tukang Jahit</option>
                            <option value="wiraswasta">Wiraswasta</option>
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

                        <div class="form-group">
                          <label for="label_act">Label</label>
                          <select class="form-control" name="label_act">
                            <option value="lunas">Lunas</option>
                            <option value="menunggak">Menunggak</option>
                          </select>
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
                  <tr>
                    <th>NO</th>
                    <th>No. Reg</th>
                    <th>Status Ayah</th>
                    <th>Pekerjaan Ayah</th>
                    <th>gaji Ayah</th>
                    <th>Status Ibu</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Gaji Ibu</th>
                    <th>Label Sebenarnya</th>
                    <th>Label Prediksi </th>
                    <th>Aksi</th>
                  </tr>
                  <?php
                  include 'koneksi.php';
                  $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                  $nomer = 1;
                  $limit = 12;
                  $limit_start = ($page - 1) * $limit;
                  $sql = mysqli_query($koneksi, "SELECT * FROM data_testing LIMIT " . $limit_start . "," . $limit);
                  $no = $limit_start + 1;
                  while ($data = mysqli_fetch_array($sql)) {
                  ?>
                    <tbody>
                      <tr>
                        <td><?= $nomer++ ?></td>
                        <td><?= $data['no_reg'] ?></td>
                        <td><?= $data['status_ayah'] ?></td>
                        <td><?= $data['pekerjaan_ayah'] ?></td>
                        <td><?= htmlspecialchars($data['gaji_ayah']) ?></td>
                        <td><?= $data['status_ibu'] ?></td>
                        <td><?= $data['pekerjaan_ibu'] ?></td>
                        <td><?= htmlspecialchars($data['gaji_ibu']) ?></td>
                        <td><?= $data['label_act'] ?></td>
                        <td><?= $data['label_prediksi'] ?></td>
                        <!-- <td><?= "<a href='hapus_testing.php?id=" . $data['no_testing'] . "' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'><span>Hapus</span></a>"; ?>  -->
                        <!-- aksi modal edit -->
                        <td class="align-middle text-center">
                          <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['no_testing']; ?>"><span aria-hidden="true"></span>Edit</button>
                          <div class="modal fade" id="my<?php echo $data['no_testing']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <div class="modal-body">
                                  <form action="" method="POST" role="form">
                                    <div class="phAnimate">
                                      <label for="no_testing">No Testing</label>
                                      <input name="no_testing" class="form-control" placeholder="Input Id" value="<?php echo $data['no_testing']; ?>" readonly="">
                                    </div>

                                    <div class="phAnimate">
                                      <label for="no_reg">No. Reg</label>
                                      <input type="text" name="no_reg" id="no_reg" class="form-control">
                                    </div>

                                    <div class="phAnimate">
                                      <label for="status_ayah">Status Ayah</label>
                                      <select class="form-control" name="status_ayah" value="<?php echo $data['status_ayah']; ?>">
                                        <option value="hidup">Hidup</option>
                                        <option value="meninggal">Meninggal</option>
                                      </select>
                                    </div>

                                    <div class="phAnimate">
                                      <label for="Pekerjaan_ayah">Pekerjaan Ayah</label>
                                      <select class="form-control" name="pekerjaan_ayah" value="<?php echo $data['pekerjaan_ayah']; ?>">
                                        <option value="administrator">Administrator</option>
                                        <option value="akuntan">Akuntan</option>
                                        <option value="buruh">Buruh</option>
                                        <option value="camat">Camat</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="guru">Guru (pengajar)</option>
                                        <option value="insinyur">Insinyur</option>
                                        <option value="karyawan">Karyawan</option>
                                        <option value="konsultan">Konsultan</option>
                                        <option value="lain_lain">Lain-lain</option>
                                        <option value="lurah">Lurah/Kades</option>
                                        <option value="manajer">Manajer</option>
                                        <option value="masinis">Masinis</option>
                                        <option value="Nahkoda">Nahkoda</option>
                                        <option value="nelayan">Nelayan</option>
                                        <option value="pedagang">Pedagang</option>
                                        <option value="pegawai_negeri">Pegawai Negeri (PNS)</option>
                                        <option value="pegawai_swasta">Pegawai Swasta</option>
                                        <option value="Pekerja_sosial">Pekerja Sosial</option>
                                        <option value="pelaut">Pelaut</option>
                                        <option value="pendeta">Pendeta</option>
                                        <option value="pengacara">Pengacara</option>
                                        <option value="pengusaha">Pengusaha</option>
                                        <option value="pensiun">Pensiun</option>
                                        <option value="petani">Petani</option>
                                        <option value="polisi">Polisi</option>
                                        <option value="politikus">Politikus</option>
                                        <option value="satpam">Satpam</option>
                                        <option value="sopir">Sopir</option>
                                        <option value="tidak_bekerja">Tidak Bekerja</option>
                                        <option value="tni">TNI</option>
                                        <option value="tukang_jahit">Tukang Jahit</option>
                                        <option value="tukang_kayu">Tukang Kayu</option>
                                        <option value="tukang_las">Tukang Las</option>
                                        <option value="tukang_listrik">Tukang Listrik</option>
                                        <option value="wartawan">Wartawan</option>
                                        <option value="wiraswasta">Wiraswasta</option>
                                      </select>
                                    </div>

                                    <div class="phAnimate">
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

                                    <div class="phAnimate">
                                      <label for="status_ibu">Status Ibu</label>
                                      <select class="form-control" name="status_ibu" value="<?php echo $data['status_ibu']; ?>">
                                        <option value="hidup">Hidup</option>
                                        <option value="meninggal">Meninggal</option>
                                      </select>
                                    </div>

                                    <div class="phAnimate">
                                      <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                      <select class="form-control" name="pekerjaan_ibu" value="<?php echo $data['pekerjaan_ibu']; ?>">
                                        <option value="administrator">Administrator</option>
                                        <option value="apoteker">Apoteker</option>
                                        <option value="bidan">Bidan</option>
                                        <option value="buruh">Buruh</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="guru">Guru (Pengajar)</option>
                                        <option value="irt">Ibu Rumah Tangga</option>
                                        <option value="karyawan">Karyawan</option>
                                        <option value="koki">Koki (Juru Masak)</option>
                                        <option value="lain_lain">Lain-lain</option>
                                        <option value="manajer">Manajer</option>
                                        <option value="pedagang">Pedagang</option>
                                        <option value="pegawai_negeri">Pegawai Negeri (PNS)</option>
                                        <option value="pegawai_swasta">Pegawai Swasta</option>
                                        <option value="pengusaha">Pengusaha</option>
                                        <option value="pensiun">Pensiun</option>
                                        <option value="perawat">Perawat</option>
                                        <option value="petani">Petani</option>
                                        <option value="tidak_bekerja">Tidak Bekerja</option>
                                        <option value="tni">TNI</option>
                                        <option value="tukang_jahit">Tukang Jahit</option>
                                        <option value="wiraswasta">Wiraswasta</option>
                                      </select>
                                    </div>

                                    <div class="phAnimate">
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


                                    <div class="phAnimate">
                                      <label for="label_act">Label</label>
                                      <select class="form-control" name="label_act">
                                        <option value="lunas">Lunas</option>
                                        <option value="menunggak">Menunggak</option>
                                      </select>
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

                          <!--Modal Hapus -->
                          <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm' data-toggle="modal" data-target="#myy<?php echo $data['no_testing']; ?>"><span aria-hidden="true"></span>Hapus</button>
                          <div class="modal fade" id="myy<?php echo $data['no_testing']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                  <form action="" method="POST" role="form">
                                    <div class="phAnimate">
                                      <label for="no_testing">No Testing</label>
                                      <input name="no_testing" class="form-control" value="<?php echo $data['no_testing']; ?>" readonly="">
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
              <hr>
              <ul class="pagination">
                <?php
                if ($page == 1) {
                ?>
                  <li class="disabled"><a href="#">First</a></li>
                  <li class="disabled"><a href="#">&laquo;</a></li>
                <?php
                } else {
                  $link_prev = ($page > 1) ? $page - 1 : 1;
                ?>
                  <li><a href="datatesting.php?page=1">First</a></li>
                  <li><a href="datatesting.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                <?php
                }
                ?>
                <?php
                include 'koneksi.php';
                $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM data_testing");
                $get_jumlah = mysqli_fetch_array($sql2);

                $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
                $jumlah_number = 3;
                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;

                for ($i = $start_number; $i <= $end_number; $i++) {
                  $link_active = ($page == $i) ? ' class="active"' : '';
                ?>
                  <li<?php echo $link_active; ?>><a href="datatesting.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                  ?>
                  <?php
                  if ($page == $jumlah_page) {
                  ?>
                    <li class="disabled"><a href="#">&raquo;</a></li>
                    <li class="disabled"><a href="#">Last</a></li>
                  <?php
                  } else {
                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                  ?>
                    <li><a href="datatesting.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                    <li><a href="datatesting.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
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