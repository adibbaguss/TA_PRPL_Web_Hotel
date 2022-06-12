<?php 
session_start();
require_once("../../../koneksi/config.php");

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../../../../index.php?pesan=gagal");
}else if($_SESSION['level']!="admin"){
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
    <title>Menu Admin - Data Akun</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-inverse position-sticky sticky-top" style="background-color: #126e82">
      <div class="container">
        <a class="navbar-brand" href="../index.php">
          <img src="../../../img/logo/logo.png" alt="" width="" height="40" />
        </a>
        <div class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fas fa-concierge-bell"></i></span>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php"><i class="fas fa-home"></i> Home</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="home.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-database"></i> Data Hotel </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item dropdown-click" href="../kamar/index.php"><i class="fas fa-bed"></i> Data Kamar</a>
                </li>
                <li>
                  <a class="dropdown-item" href="../akun/index.php"><i class="fas fa-user-circle"></i> Data Akun</a>
                </li>
                <li>
                  <a class="dropdown-item" href="../reservasi/index.php"><i class="fas fa-table"></i> Data Reservasi</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- content -->
    <div class="container mt-4">
      <div class="mb-4 d-none d-md-block">
        <div class="row">
          <a class="col-4 d-flex justify-content-center py-2 text-white text-decoration-none btn-navbaroff" href="../kamar/index.php">
            <p class="text my-auto">Data Kamar</p>
          </a>
          <a class="col-4 d-flex justify-content-center py-auto text-white text-decoration-none btn-navbaron" href="../akun/index.php">
            <p class="text my-auto">Data Akun</p>
          </a>
          <a class="col-4 d-flex justify-content-center py-auto text-white text-decoration-none btn-navbaroff" href="../reservasi/index.php">
            <p class="text my-auto">Data Reservasi</p>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-2">
          <div class="d-flex justify-content-end ms-auto">
            <form class="d-flex" action="index.php">
              <div class="row">
                <div class="col-8 d-grid">
                  <input class="form-control me-2" name="cari" type="search" placeholder="cari username" aria-label="Search" />
                </div>
                <div class="col-4 d-grid mt-auto">
                  <button class="btn btn-lightblue" type="submit"><i class="fas fa-search"></i></button>
                  <!-- <button class="btn text-white" style="background-color: #51c4d3" type="submit">Search</button> -->
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- table pc version -->
        <div class="col-md-12 d-none d-md-block">
          <table class="table text-center">
            <thead class="table-th text-light">
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>level</th>
                <th colspan="2">Opsi</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <?php 
                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $sql_get = "SELECT * FROM akun WHERE username like '%".$cari."%'";
                    
                  }else{
                    $sql_get = "SELECT * FROM akun";
                  }
                    $query_trans = mysqli_query($koneksi,$sql_get);
                    $results = [];

                    while ($row = mysqli_fetch_assoc($query_trans)) {
                      $results[] = $row;
                    } 
                    
                    $no= 1;
                    foreach($results as $result) :
                    ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $result['username'];?></td>
                <td><?= $result['email'];?></td>
                <td><?= $result['level'];?></td>
                <td>
                  <a href="info.php?username=<?= $result['username'];?>" class="text-decoration-none text-grey fs-4"><i class="fas fa-info-circle"></i></a>
                </td>

                <td>
                  <?php
                  if($_SESSION['username']!= $result['username']){
                    ?>
                  <a href="delete.php?username=<?= $result['username'];?>" class="text-decoration-none text-red fs-4"><i class="fas fa-trash"></i></a>
                  <?php
                  }
                  else{
                    ?>
                  <a href="#" class="text-decoration-none text-dark fs-4"><i class="fas fa-exclamation-circle"></i></a>
                  <?php
                  }
                ?>
                </td>
              </tr>
              <?php 
                      $no++;
                      endforeach;          
                    ?>
            </tbody>
          </table>
        </div>
        <!-- end table pc version -->
        <!-- table mobile version -->
        <div class="col-md-12 d-md-none d-block">
          <table class="table text-center" style="font-size: 12px">
            <thead class="table text-light" style="background-color: #126e82">
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>level</th>
                <th colspan="2">Opsi</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <?php 
                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $sql_get = "SELECT * FROM akun WHERE username like '%".$cari."%'";
                    
                  }else{
                    $sql_get = "SELECT * FROM akun";
                  }
                    $query_trans = mysqli_query($koneksi,$sql_get);
                    $results = [];

                    while ($row = mysqli_fetch_assoc($query_trans)) {
                      $results[] = $row;
                    } 
                    
                    $no= 1;
                    foreach($results as $result) :
                    ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $result['username'];?></td>
                <td><?= $result['email'];?></td>
                <td><?= $result['level'];?></td>
                <!-- <td><button type="button" class="btn btn-outline-primary w-100" style="font-size: 12px;">Ceck</button></td> -->
                <td>
                  <a href="info.php?username=<?= $result['username'];?>" class="text-decoration-none text-grey fs-6"><i class="fas fa-info-circle"></i></a>
                </td>
                <td>
                  <?php
                  if($_SESSION['username']!= $result['username']){
                    ?>
                  <a href="delete.php?username=<?= $result['username'];?>" class="text-decoration-none text-red fs-6"><i class="fas fa-trash"></i></a>
                  <?php
                  }
                  else{
                    ?>
                  <a href="#" class="text-decoration-none text-dark fs-6"><i class="fas fa-exclamation-circle"></i></a>
                  <?php
                  }
                ?>
                </td>
                <!-- <td><button type="button" class="btn btn-outline-danger w-100" style="font-size: 12px;">Hapus</button></td> -->
              </tr>
              <?php 
                      $no++;
                      endforeach;          
                    ?>
            </tbody>
          </table>
        </div>
        <!-- end table mobile version -->
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
