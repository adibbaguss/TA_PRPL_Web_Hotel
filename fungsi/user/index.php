<?php 
session_start();
require_once("../../koneksi/config.php");

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../../index.php?pesan=gagal");
}else if($_SESSION['level']!="user"){
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
    <title>User - Menu Kamar</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-inverse position-sticky sticky-top" style="background-color: #126e82">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="../../img/logo/logo.png" alt="" width="" height="40" />
        </a>
        <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fas fa-concierge-bell"></i></span>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="profile/index.php"><i class="fas fa-user"></i> Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href=" https://api.whatsapp.com/send?phone=6285201117231&text=Saya%20menghubungi%20anda%20melalui%20contact%20yang%20tersedia%20di%20Paradise%20hotel"
                ><i class="fas fa-phone-alt"></i> Contact</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- nav tab -->
    <div class="container mb-2">
      <div class="d-flex mt-3 justify-content-end ms-auto">
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
            <div class="col-4 d-grid mt-4">
              <button class="btn btn-lightblue p-1" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- akhir nav tab -->

    <!-- konten -->
    <div class="container">
      <div class="row">
        <div class="col-md-2 mt-4 d-none d-md-block position-sticky">
          <img src="../../img/user/start-img.jpg" class="rounded" width="100%" alt="..." />
        </div>
        <div class="col-md-10 mx-auto">
          <!-- data kama -->

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
          <!-- content web -->
          <div class="shadow my-4 p-2 r-5 d-none d-md-block">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img-top" src="../../img/kamar/<?php echo $d_kamar['foto'] ?>" weidth="350px" height="200px" />
              </div>
              <div class="col-md-6">
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
                  <h5 class="card-text mb-0" style="color: #51c4d3"><?php echo rupiah($d_kamar['harga']); ?></h5>
                </div>
              </div>
              <div class="col-md-2 my-auto">
                <div class="d-grid gap-2 mx-auto">
                  <a class="mx-auto" style="font-size: 100px" href="order/order.php?kode_kamar=<?=$d_kamar['kode_kamar'];?>"><i class="fas fa-caret-right text-blue"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- akhir content web -->
          <!-- content mobile -->
          <div class="mb-4 shadow p-0 d-md-none d-block">
            <a href="order/order.php?kode_kamar=<?=$d_kamar['kode_kamar'];?>" class="text-decoration-none text-dark">
              <div class="card">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img" src="../../img/kamar/<?php echo $d_kamar['foto'] ?>" weidth="350px" height="200px" />
                    <div class="card-img-overlay text-white">
                      <h4 class="card-title mb-0"><?php echo $d_kamar['judul']; ?></h4>
                      <p class="card-text mb-0">
                        <?php echo $d_kamar['kasur']; ?>
                        <i class="fas fa-bed ps-1"></i>
                      </p>
                      <div class="row mt-5">
                        <div class="col-12 text-center d-flex justify-content-end mt-5">
                          <h6 class="card-text bg-warning p-1"><?php echo rupiah($d_kamar['harga'])."/malam"; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <div class="row mx-auto">
              <div class="col-md-6 d-md-none d-block">
                <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo  $d_kamar['kode_kamar']; ?>" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <div class="text-center">
                    <button class="btn btn-lightblue fw-bold fs-6">fasilitas</button>
                  </div>
                </div>

                <div class="collapse navbar-collapse mt-3" id="<?php echo  $d_kamar['kode_kamar']; ?>">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white">
                    <div class="row mt-0 ms-4 text-dark" style="font-size: 14px">
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
                    </div>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- akhir content mobile -->
          <?php
          }                 
          ?>

          <!-- akhir data kamar -->
        </div>
      </div>
    </div>
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
