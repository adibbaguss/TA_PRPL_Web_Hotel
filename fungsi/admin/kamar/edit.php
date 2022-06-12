<?php 
require_once('../../../koneksi/config.php');

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
    <link rel="stylesheet" href="../../../css/style.css" type="text/css" />
    <title>Menu Admin - Edit Kamar</title>
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
    <!-- form input data kamar -->
    <div class="container my-4">
      <!-- <div class="row mt-4 mx-auto" style="max-width: none; min-width: none">
        <div class="col-12">
          <div class="d-flex justify-content-center mb-3 mt-2">
            <img src="../../../img/logo/logo1.png" alt="" width="50%" />
          </div>
        </div>
      </div> -->
      <div class="row mx-auto bg-white mb-5" style="max-width: 500px; min-width: none">
        <div class="col-12 text-center mx-auto" style="background: rgb(81, 196, 211);
  background: linear-gradient(139deg, rgba(81, 196, 211, 1) 0%, rgba(33, 146, 161, 1) 100%);max-width: 400px; min-width: none">
          <h3 class="text" style="background-color: #ffffff; color: #126e82">EDIT DATA KAMAR</h3>
        </div>

        <div class="col-12 mt-4 shadow">
          <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12 mb-3">
                <div class="card-img-top d-flex justify-content-center">
                  <img src="../../../img/kamar/<?php echo $d_kamar['foto'] ?>" style="max-width: 480px; min-width: 300px" />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Kode Kamar <i style="font-size:8px; color:red;">(read only)</i> </label>
                  <input type="text" class="form-control" value="<?=$d_kamar['kode_kamar']; ?>" name="kode_kamar" readonly />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Judul</label>
                  <input type="text" class="form-control" value="<?=$d_kamar['judul']; ?>" name="judul" required />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Jenis Kasur</label>
                  <select class="form-select" name="kasur">
                    <option value="<?=$d_kamar['kasur']; ?>" hidden><?=$d_kamar['kasur']; ?></option>
                    <option value="Single Bed">Single Bed</option>
                    <option value="Twin Bed">Twin Bed</option>
                    <option value="Double Bed">Double Bed</option>
                  </select>
                </div>
              </div>

              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">Wifi</label>
                  <select class="form-select" name="wifi">
                    <option value="<?=$d_kamar['wifi']; ?>" hidden><?=$d_kamar['wifi']; ?></option>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">TV</label>
                  <select class="form-select" name="tv">
                    <option value="<?=$d_kamar['tv']; ?>" hidden><?=$d_kamar['tv']; ?></option>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">Air Mineral</label>
                  <select class="form-select" name="mineral">
                    <option value="<?=$d_kamar['mineral']; ?>" hidden><?=$d_kamar['mineral']; ?></option>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">Sarapan</label>
                  <select class="form-select" name="sarapan">
                    <option value="<?=$d_kamar['sarapan']; ?>" hidden><?=$d_kamar['sarapan']; ?></option>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">Kamar Mandi</label>
                  <select class="form-select" name="kamar_mandi">
                    <option value="<?=$d_kamar['kamar_mandi']; ?>" hidden><?=$d_kamar['kamar_mandi']; ?></option>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">Perlengkapan Mandi</label>
                  <select class="form-select" name="perlengkapan_mandi">
                    <option value="<?=$d_kamar['perlengkapan_mandi']; ?>" hidden><?=$d_kamar['perlengkapan_mandi']; ?></option>
                    <option value="Tidak">Tidak</option>
                    <option value="Ya">Ya</option>
                  </select>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Harga</label>
                  <input type="text" value="<?=$d_kamar['harga']; ?>" class="form-control" name="harga" required />
                </div>
              </div>
              <!-- <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Uploud Foto</label>
                  <input type="file" value="<?=$d_kamar['foto']; ?>" class="form-control" name="foto" />
                </div>
              </div> -->
              <div class="col-6">
                <div class="mb-3 d-grid">
                  <a class="btn btn-transparantred " type="button" href="index.php">back</a>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3 d-grid">
                  <button class="btn btn-transparantblue" type="submit" name="submit">save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    <!-- akhir form input data kamar -->
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
