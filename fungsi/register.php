<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal_ekstensi"){
      ?>
<script>
  alert("ekstensi foto tidak sesuai");
</script>
<?php
		}else if($_GET['pesan'] == "gagal_ukuran"){
      ?>
<script>
  alert("maksimal ukuran foto 1 MB");
</script>
<?php
		}
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
    <link href="../css/style.css" type="text/css" rel="stylesheet" />
    <title>Register</title>
  </head>
  <body>
    <!-- form input data kamar -->
    <div class="container mt-5">
      <div class="row mx-auto">
        <div class="col-md-10 mx-auto" style="width: 370px">
          <form action="tambahakun.php" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center py-2 px-3 bg-white border border-1 shadow">
              <div class="col-12">
                <div class="d-flex justify-content-center mb-3 mt-2">
                  <img src="../img/logo/logo1.png" alt="" width="50%" />
                </div>
                <hr class="bg-dark" />
              </div>
              <div class="col-12">
                <div class="mb-2">
                  <label for="username" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" required />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-2">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" required />
                </div>
              </div>
              <div class="col-6">
                <div class="mb-2">
                  <label for="tempat" class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" required />
                </div>
              </div>
              <div class="col-6">
                <div class="mb-2">
                  <label for="tanggal" class="form-label">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control" required />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-2">
                  <label for="telp" class="form-label">No. Handphone</label>
                  <input type="number" name="telp" class="form-control" required />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-2">
                  <label for="telp" class="form-label">E-mail</label>
                  <input type="text" name="email" class="form-control" required />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-2">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" required />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-2">
                  <label for="telp" class="form-label">Foto Profile <i class="text-danger" style="font-size: 9px">(gambar 1x1)</i></label>
                  <input type="file" class="form-control" name="foto" required />
                </div>
              </div>
              <div class="col-xxl-6 mt-3">
                <div class="d-grid gap-2 mx-2 mb-2">
                  <button type="submit" name="submit" class="btn btn-darkblue">Sign In</button>
                </div>
              </div>
            </div>
            <input type="text" name="level" value="user" class="form-control" hidden />
          </form>
          <div class="row mb-5 mt-3 border border-1 shadow">
            <div class="col-md-12 bg-white my-2 py-2">
              <div class="text text-center fs-6">Have an account? <a class="text-decoration-none fw-bold" style="color: #126e82" href="../index.php"> Log In</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir form input data kamar -->

    <!-- footer -->
    <!-- footer -->
    <div class="row mt-4 mb-0">
      <div class="col-md-12">
        <div class="text text-center">© 2021 Adib Bagus Sudiyono</div>
      </div>
    </div>
    <!-- akhir footer -->
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
