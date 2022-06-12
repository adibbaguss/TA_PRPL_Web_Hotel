<?php 
require_once("../../../koneksi/config.php");
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
    <title>Menu Admin - Data Kamar</title>
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
          <a class="col-4 d-flex justify-content-center py-2 text-white text-decoration-none btn-navbaron" href="../kamar/index.php">
            <p class="text my-auto">Data Kamar</p>
          </a>
          <a class="col-4 d-flex justify-content-center py-auto text-white text-decoration-none btn-navbaroff" href="../akun/index.php">
            <p class="text my-auto">Data Akun</p>
          </a>
          <a class="col-4 d-flex justify-content-center py-auto text-white text-decoration-none btn-navbaroff" href="../reservasi/index.php">
            <p class="text my-auto">Data Reservasi</p>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-6 ms-auto d-flex">
          <a class="btn btn-lightblue ms-auto" href="inputdatakamar.php"><i class="fas fa-plus"> </i> </a>
          <!-- <a class="btn btn-outline-info ms-auto" href="inputdatakamar.php">Input data</a> -->
        </div>
        <div class="col-12">
          <div class="d-flex justify-content-end ms-auto mb-2">
            <form class="d-flex" action="index.php">
              <div class="row">
                <div class="col-4 d-grid">
                  <label for="">harga</label>
                  <select name="range_harga" class="form-control me-auto" id="">
                    <option value="random" hidden></option>
                    <option value="tertinggi">tertinggi - terendah</option>
                    <option value="terendah">terendah - tertinggi</option>
                  </select>
                </div>
                <div class="col-4 d-grid">
                  <label for="">Jenis Kasur</label>
                  <select name="kasur" class="form-control">
                    <option value="All" hidden></option>
                    <option value="Single Bed">Single Bed</option>
                    <option value="Double Bed">Double Bed</option>
                    <option value="Twin Bed">Twin Bed</option>
                  </select>
                </div>
                <div class="col-4 d-grid mt-auto">
                  <button class="btn btn-lightblue" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="col-md-12">
          <?php 
            if(isset($_GET['kasur']) && ($_GET['range_harga'])){
              $jenis_kasur= $_GET['kasur'];
              $rangeharga = $_GET['range_harga'];
                if($jenis_kasur=="All" && $rangeharga =="random"){
                  $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar");
                }else if($jenis_kasur=="All" && $rangeharga =="tertinggi"){
                  $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar ORDER BY harga DESC");
                }else if($jenis_kasur=="All" && $rangeharga =="terendah"){
                  $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar ORDER BY harga ASC");
                }else if($jenis_kasur!="All" && $rangeharga =="terendah"){
                  $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE kasur = '$jenis_kasur' ORDER BY harga ASC");
                }else if($jenis_kasur!="All" && $rangeharga =="tertinggi"){
                  $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE kasur = '$jenis_kasur' ORDER BY harga DESC");
                }
                else if($jenis_kasur!="All" && $rangeharga =="ramdom"){
                  $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE kasur = '$jenis_kasur'");
                }else{
                  $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE kasur = '$jenis_kasur'");
                }
              }else{
                $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar ");
              }
            while($d_kamar = mysqli_fetch_array($data_kamar)){
          ?>
          <!-- <script>
            function Delete() {
              if (confirm("APAKAH ANDA INGIN MENGHAPUS INI?")) {
                // window.location.assign("delete.php?kode_kamar=<?php echo $kode_kamar;?>");
              } else {
                window.location.assign("index.php?batal_hapus");
              }
            }
          </script> -->
          <div class="bg-white shadow mb-3 p-1">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img-top" src="../../../img/kamar/<?php echo $d_kamar['foto'] ?>" weidth="350px" height="200px" />
              </div>
              <div class="col-md-6">
                <div class="card-body pb-0">
                  <div class="col-12">
                    <p class="card-text mb-0" style="font-size: 13px"><?php echo "kode : ".$d_kamar['kode_kamar']; ?></p>
                  </div>
                  <h5 class="card-title my-0"><?php echo $d_kamar['judul']; ?></h5>
                  <p class="card-text pt-2 mb-0">
                    <?php echo $d_kamar['kasur']; ?>
                    <i class="fas fa-bed"></i>
                  </p>
                  <div class="row mt-0">
                    <div class="col-6">
                      <p class="card-text"><?php echo "Wifi\t\t:".$d_kamar['wifi']; ?></p>
                    </div>
                    <div class="col-6">
                      <p class="card-text"><?php echo "TV\t\t:".$d_kamar['tv']; ?></p>
                    </div>
                    <div class="col-6">
                      <p class="card-text"><?php echo "Mineral\t\t:".$d_kamar['mineral']; ?></p>
                    </div>
                    <div class="col-6">
                      <p class="card-text"><?php echo "Sarapan\t\t:".$d_kamar['sarapan']; ?></p>
                    </div>
                    <div class="col-6">
                      <p class="card-text"><?php echo "Kamar Mandi\t\t:".$d_kamar['kamar_mandi']; ?></p>
                    </div>
                    <div class="col-6">
                      <p class="card-text"><?php echo "Alat Mandi\t\t:".$d_kamar['perlengkapan_mandi']; ?></p>
                    </div>
                    <div class="col-12">
                      <p class="card-text fs-4 text-info"><?php echo rupiah($d_kamar['harga']); ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2 d-none d-md-block my-auto">
                <div class="d-grid gap-2 mb-1 mx-auto">
                  <a class="btn btn-transparantblue" href="edit.php?kode_kamar=<?= $d_kamar['kode_kamar'];?>">Edit</a>
                </div>
                <div class="d-grid gap-2 mb-1 mx-auto">
                  <a class="btn btn-transparantred" href="delete.php?kode_kamar=<?= $d_kamar['kode_kamar'];?>">Delete</a>
                  <!-- <button class="btn btn-transparantred" onclick="Delete()">Delete</button> -->
                </div>
              </div>
              <div class="col-md-2 d-md-none d-block">
                <div class="row">
                  <div class="col-6">
                    <div class="d-grid gap-2 mb-1 mx-auto">
                      <a class="btn btn-transparantblue" href="edit.php?kode_kamar=<?= $d_kamar['kode_kamar'];?>">Edit</a>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-grid gap-2 mb-1 mx-auto">
                      <a class="btn btn-transparantred" href="delete.php?kode_kamar=<?= $d_kamar['kode_kamar'];?>">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
        ?>
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
