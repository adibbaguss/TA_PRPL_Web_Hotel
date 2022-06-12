<?php 
session_start();
require_once("../../koneksi/config.php");

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../../index.php?pesan=gagal");
}else if($_SESSION['level']!="admin"){
  header("location:../../index.php?pesan=gagal");
}else if(empty($_GET['pesan'])){
  
}else if($_GET['pesan']=="login"){
  ?>
<script>
  alert("SELAMAT DATANG <?php echo strtoupper($_SESSION['username']).' ('.strtoupper($_SESSION['level']).')';?>");
</script>
<?php
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="../../fontawesome-free-5.15.3-web/css/all.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <title>Menu Admin - Data Kamar</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-inverse position-sticky sticky-top" style="background-color: #126e82">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="../../img/logo/logo.png" alt="" width="" height="40" />
        </a>
        <div class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fas fa-concierge-bell"></i></span>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php"><i class="fas fa-home"></i> Home</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="home.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-database"></i> Data Hotel </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item dropdown-click" href="kamar/index.php"><i class="fas fa-bed"></i> Data Kamar</a>
                </li>
                <li>
                  <a class="dropdown-item" href="akun/index.php"><i class="fas fa-user-circle"></i> Data Akun</a>
                </li>
                <li>
                  <a class="dropdown-item" href="reservasi/index.php"><i class="fas fa-table"></i> Data Reservasi</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->
    <!-- content -->
    <div class="container">
      <h3 class="fw-bold text-center mt-5">
        SELAMAT DATANG
        <?php echo strtoupper($_SESSION['username']);?>
      </h1>
      <?php
      $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar");
      $data_admin = mysqli_query($koneksi,"SELECT * FROM akun WHERE level='admin'");
      $data_user = mysqli_query($koneksi,"SELECT * FROM akun WHERE level='user'");
      $data_reservasi = mysqli_query($koneksi,"SELECT * FROM data_reservasi");
      
      $jumlah_kamar = mysqli_num_rows($data_kamar);
      $jumlah_admin = mysqli_num_rows($data_admin);
      $jumlah_user = mysqli_num_rows($data_user);
      $jumlah_reservasi = mysqli_num_rows($data_reservasi);
     
      ?>
      <div class="row d-flex mb-5">

        <?php
        $data = mysqli_query($koneksi,"SELECT SUM(total_harga) AS total FROM data_reservasi ");
        while($d_harga = mysqli_fetch_array($data)){
          ?>
          <div class="col-12 mx-auto mb-3">
            <div class="card text-center mt-5 shadow mx-3">
              <div class="bg-blue pt-1 ">
                <h6 class="card-title text-white fw-bold">JUMLAH PEMASUKAN</h6> 
              </div>
              <div class="card-body">
                <h3 class="card-subtitle" style="font-size: 60px"><?= rupiah($d_harga['total']); ?></h3>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
        <div class="col-md-4 mx-auto">
          <div class="card text-center mt-5 shadow mx-3">
            <div class="bg-blue pt-1 ">
              <h6 class="card-title text-white fw-bold">JUMLAH KAMAR</h6> 
            </div>
            <div class="card-body">
              <h1 class="card-subtitle" style="font-size: 80px"><?php echo $jumlah_kamar; ?></h1>
              <a href="kamar/index.php" class="card-link text-blue text-decoration-none">Link Kamar</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mx-auto">
          <div class="card text-center mt-5 shadow mx-3">
            <div class="bg-blue pt-1 ">
              <h6 class="card-title text-white fw-bold">JUMLAH AKUN ADMIN</h6> 
            </div>
            <div class="card-body">
              <h1 class="card-subtitle" style="font-size: 80px"><?php echo $jumlah_admin; ?></h1>
              <a href="akun/index.php" class="card-link text-blue text-decoration-none">Link Akun</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mx-auto">
          <div class="card text-center mt-5 shadow mx-3">
            <div class="bg-blue pt-1 ">
              <h6 class="card-title text-white fw-bold">JUMLAH AKUN USER</h6> 
            </div>
            <div class="card-body">
              <h1 class="card-subtitle" style="font-size: 80px"><?php echo $jumlah_user; ?></h1>
              <a href="akun/index.php" class="card-link text-blue text-decoration-none">Link Akun</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mx-auto">
          <div class="card text-center mt-5 shadow mx-3">
            <div class="bg-blue pt-1 ">
              <h6 class="card-title text-white fw-bold">JUMLAH RESERVASI</h6> 
            </div>
            <div class="card-body">
              <h1 class="card-subtitle" style="font-size: 80px"><?php echo $jumlah_reservasi; ?></h1>
              <a href="reservasi/index.php" class="card-link text-blue text-decoration-none">Link Reservasi</a>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  
    <!-- akhir content -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
