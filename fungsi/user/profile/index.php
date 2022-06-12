<?php 
session_start();
require_once("../../../koneksi/config.php");

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../../../../index.php?pesan=gagal");
}else if($_SESSION['level']!="user"){
  header("location:../../../index.php?pesan=gagal");
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
    <link href="../../../fontawesome-free-5.15.3-web/css/all.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../css/style.css" type="text/css" />
    <title>Menu User - Menu Kamar</title>
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
    <?php
    $data=mysqli_query($koneksi,"SELECT *, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS age FROM akun WHERE username ='$_SESSION[username]'");
    while($profile= mysqli_fetch_array($data)){    
    ?>
    <!-- nav content -->
    <div class="container-fluid bg-profile">
      <div class="row text-center" style="padding-bottom: -50px">
        <div class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/Others/images/76.jpg')"></div>
        <div class="col-12-flex justify-content-center mt-5">
          <img class="rounded-circle mx-auto" src="../../../img/profile/<?= $profile['foto'];?>" alt="" style="width: 120px; height: 120px" />
        </div>
        <!-- <div class="col-12">
          <div class="text-center">
            <a class="text-dark text-decoration-none" style="font-size: 13px" href="editakun.php">edit <i class="fas fa-edit"></i></a>
          </div>
        </div> -->

        <div class="col-6 mx-auto my-2">
          <h6 class="fw-bold"><?=$profile['nama_lengkap'];?></h6>
        </div>
        <div class="card mx-auto shadow-sm" style="width: 60%; margin-bottom: -40px">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <label for="" style="font-size: 14px">Username</label>
                <h6 class="fw-bold"><?= $profile['username'];?></h6>
              </div>
              <div class="col-4">
                <label for="" style="font-size: 14px">Status</label>
                <h6 class="fw-bold"><?= $profile['level'];?></h6>
              </div>
              <div class="col-4">
                <label for="" style="font-size: 14px">Age</label>
                <h6 class="fw-bold"><?= $profile['age'];?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }

?>
    <div class="container my-5">
      <div class="card shadow py-3 mt-5">
        <div class="card-body">
          <h5 class="fw-bold text-center mb-3">Riwayat Pemesanan</h5>
          <hr />
          <table class="table table-responsive text-center">
            <thead>
              <tr>
                <th>ID Pemesanan</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Harga</th>
              </tr>
            </thead>
            <?php
          $data2=mysqli_query($koneksi,"SELECT * FROM akun INNER JOIN data_reservasi ON akun.username = data_reservasi.username  WHERE akun.username ='$_SESSION[username]'");
          while($profile2= mysqli_fetch_array($data2)){    
          ?>

            <tbody>
              <tr>
                <td><?= $profile2['id_pemesanan'];?></td>
                <td><?= date('d F Y', strtotime($profile2['checkin']));?></td>
                <td><?= date('d F Y', strtotime($profile2['checkout']));?></td>
                <td><?= rupiah($profile2['total_harga']);?></td>
              </tr>
            </tbody>

            <?php
        }
      
      ?>
          </table>
        </div>
      </div>
    </div>

    <!-- akhir content -->

    <!-- konten -->

    <!-- akhir konten -->
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
