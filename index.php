<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link href="fontawesome-free-5.15.3-web/css/all.css" type="text/css" rel="stylesheet" />
    <title>Paradise Hotel</title>
  </head>
  <body>
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
      ?>
    <script>
      alert("ANDA GAGAL LOGIN");
    </script>
    <?php
		}else if($_GET['pesan'] == "logout"){
      ?>
    <script>
      alert("ANDA BERHASIL LOGOUT");
    </script>
    <?php
		}else if($_GET['pesan'] == "belum_login"){
      ?>
    <script>
      alert("ANDA BELUM LOGIN");
    </script>
    <?php
		}else if($_GET['pesan'] == "berhasil_registrasi"){
      ?>
    <script>
      alert("ANDA BERHASIL REGISTRASI");
    </script>
    <?php
		}
	}
?>

    <div class="container mt-5">
      <div class="row d-flex justify-content-center mx-3">
        <!-- <div class="col-sm-12 d-flex justify-content-center">
          <img src="img/logo/logo1.png" alt="" width="30%" />
        </div> -->
        <!-- corasel -->
        <div class="col-md-8 mb-3 d-none d-md-block" style="max-width: 640px; min-width: auto">
          <div id="carouselExampleInterval" class="carousel slide border border-1 shadow p-3" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="100">
                <img src="img/login/1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="img/login/2.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="img/login/3.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="img/login/4.jpg" class="d-block w-100" alt="..." />
              </div>
            </div>
            <div class="text text-center">
              <div class="fs-5 fst-italic">-your comfort is our priority-</div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <!-- akhir corasel -->
        <!-- form -->
        <div class="col-md-4" style="width: 350px">
          <div class="card mb-3 border-1 p-2 shadow mx-auto">
            <div class="card-body mt-0">
              <form action="fungsi/cek_login.php" method="POST">
                <div class="d-flex justify-content-center mb-5 mt-0">
                  <img src="img/logo/logo1.png" alt="" width="60%" />
                </div>

                <div class="mb-3">
                  <input type="text" placeholder="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                </div>
                <div class="mb-3">
                  <input type="password" placeholder="password" name="password" class="form-control" id="exampleInputPassword1" />
                </div>

                <div class="d-grid gap-2 mt-4 mx-1">
                  <button type="submit" class="btn btn-darkblue">Log In</button>
                </div>
              </form>
            </div>
          </div>
          <div class="border border-1 p-3 mb-3 shadow">
            <div class="text text-center fs-6">Don't have an account? <a class="text-decoration-none fw-bold" style="color: #126e82" href="fungsi/register.php?"> Sign Up</a></div>
          </div>
        </div>
        <!--akhir form  -->
      </div>
      <!-- akhir row -->
    </div>
    <!-- akhir container -->

    <div class="container mt-4">
      <div class="text-white mt-1 pb-3 pt-2 mx-4">
        <div class="row text-center mb-3">
          <div class="col-12" style="color: #126e82">
            <h3>Facilities</h3>
          </div>
        </div>
        <div class="row mx-auto mt-4" style="font-size: x-large">
          <div class="d-flex text-center" style="color: #126e82">
            <div class="col-3">
              <i class="fas fa-wifi"></i>
              <p class="d-none d-md-block">Free Wifi</p>
            </div>
            <div class="col-3">
              <i class="fas fa-bath"></i>
              <p class="d-none d-md-block">Clean Bathroom</p>
            </div>
            <div class="col-3">
              <i class="fas fa-tv"></i>
              <p class="d-none d-md-block">TV Satelite</p>
            </div>
            <div class="col-3">
              <i class="fas fa-swimming-pool"></i>
              <p class="d-none d-md-block">Swimming Pool</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content -->

    <!-- akhir content -->
    <!-- footer -->
    <div class="row mt-5 position-bottom">
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
