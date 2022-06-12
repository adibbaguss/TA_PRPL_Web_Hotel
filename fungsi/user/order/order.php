<?php 
session_start();
require_once("../../../koneksi/config.php");

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../../../../index.php?pesan=gagal");
}else if($_SESSION['level']!="user"){
  header("location:../../../index.php?pesan=gagal");
}
  $kode_kamar = $_GET['kode_kamar'];
  $data = mysqli_query($koneksi,"SELECT * FROM kamar WHERE kode_kamar='$kode_kamar'");
  while($d_kamar = mysqli_fetch_array($data)){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="../../../fontawesome-free-5.15.3-web/css/all.css" type="text/css" rel="stylesheet" />
    <link href="../../../css/style.css" type="text/css" rel="stylesheet" />
    <title>Pesan Kamar</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-inverse position-sticky sticky-top" style="background-color: #126e82">
      <div class="container">
        <a class="navbar-brand" href="../index.php">
          <img src="../../../img/logo/logo.png" alt="" width="" height="40" />
        </a>
        <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fas fa-concierge-bell"></i></span>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../profile/index.php"><i class="fas fa-user"></i> Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href=" https://api.whatsapp.com/send?phone=6285201117231&text=Saya%20menghubungi%20anda%20melalui%20contact%20yang%20tersedia%20di%20Paradise%20hotel"
                ><i class="fas fa-phone-alt"></i> Contact</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- card kamar -->
    <div class="container mt-5 mx-auto mb-5">
      <div class="card mb-3 shadow rounded-3 p-2">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img-top" src="../../../img/kamar/<?php echo $d_kamar['foto'] ?>" weidth="350px" height="200px" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $d_kamar['judul']; ?></h5>
              <p class="card-text mb-0"><?php echo $d_kamar['kasur']; ?></p>
              <div class="row mt-0">
                <div class="col-sm-6">
                  <p class="card-text"><?php echo "Wifi\t\t:".$d_kamar['wifi']; ?></p>
                </div>
                <div class="col-sm-6">
                  <p class="card-text"><?php echo "TV\t\t:".$d_kamar['tv']; ?></p>
                </div>
                <div class="col-sm-6">
                  <p class="card-text"><?php echo "Mineral\t\t:".$d_kamar['mineral']; ?></p>
                </div>
                <div class="col-sm-6">
                  <p class="card-text"><?php echo "Sarapan\t\t:".$d_kamar['sarapan']; ?></p>
                </div>
                <div class="col-sm-6">
                  <p class="card-text"><?php echo "Kamar Mandi\t\t:".$d_kamar['kamar_mandi']; ?></p>
                </div>
                <div class="col-sm-6">
                  <p class="card-text"><?php echo "Alat Mandi\t\t:".$d_kamar['perlengkapan_mandi']; ?></p>
                </div>
              </div>
              <h5 class="card-text fw-bold text-blue"><?php echo rupiah($d_kamar['harga'])."/malam"; ?></h5>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir card kamar -->

      <form action="ordernow.php" method="POST">
        <div class="row mt-0">
          <div class="col-md-12">
            <div class="mb-3">
              <?php
              $dataakun = mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$_SESSION[username]'");
              while($akun = mysqli_fetch_array($dataakun)){
              ?>
              <input type="text" name="username" value="<?=$akun['username'];?>" class="form-control" required hidden />
              <input type="text" name="nama_lengkap" value="<?=$akun['nama_lengkap'];?>" class="form-control" required hidden />
              <input type="text" name="password" value="<?=$akun['password'];?>" class="form-control" required hidden />
              <input type="text" name="tempat_lahir" value="<?=$akun['tempat_lahir'];?>" class="form-control" required hidden />
              <input type="text" name="level" value="<?=$akun['level'];?>" class="form-control" required hidden />
              <input type="number" name="telp" value="<?=$akun['telp'];?>" class="form-control" required hidden />
              <?php
              }
              ?>
              <input type="text" name="kode_kamar" class="form-control" value="<?php echo $d_kamar['kode_kamar']; ?>" hidden />
              <input type="text" name="harga_malam" class="form-control" value="<?php echo $d_kamar['harga']; ?>" hidden />
            </div>
          </div>
          <div class="col-6 mx-auto">
            <div class="mb-3 mx-3 text-center">
              <label class="form-label fw-bold">Check in</label>
              <input type="date" name="checkin" class="form-control" required />
            </div>
          </div>
          <div class="col-6 mx-auto">
            <div class="mb-3 mx-3 text-center">
              <label class="form-label fw-bold">Check Out</label>
              <input type="date" name="checkout" class="form-control" required />
            </div>
          </div>
          <div class="row mx-auto">
            <div class="col-6 d-grid">
              <a class="btn btn-lightblue mt-5 px-4 py-3 d-md-block d-none" href="index.php?batal-pemesanan-kode_kamar=<?=$d_kamar['kode_kamar'];?>" role="button">Kembali</a>
            </div>
            <div class="col-6 d-grid">
              <button class="btn btn-fillblue mt-5 px-4 py-3 d-md-block d-none" name="submit" type="submit">Booking</button>
            </div>
          </div>

          <div class="row mx-auto px-0 shadow fixed-bottom">
            <div class="col-6 d-grid">
              <a class="btn btn-lightblue mt-5 px-4 py-2 d-md-none d-block" href="index.php?batal-pemesanan-kode_kamar=<?=$d_kamar['kode_kamar'];?>" role="button">Kembali</a>
            </div>
            <div class="col-6 d-grid">
              <button class="btn btn-fillblue mt-5 px-4 py-2 d-md-none d-block" name="submit" type="submit">Booking</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- akhir container -->
    <?php 
        }
	 ?>
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
