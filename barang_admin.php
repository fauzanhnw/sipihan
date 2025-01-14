<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
<!DOCTYPE html>
<html>

<head>
  <title>SIPIHAN V.3</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" href="style/style01.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style/resposive.css">
  <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Karma", sans-serif
    }

    .w3-bar-block .w3-bar-item {
      padding: 20px
    }
  </style>
</head>

<body>

  <!-- Sidebar (hidden by default) -->
  <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left"
    style="display:none;z-index:2;width:25%;min-width:300px" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Tutup Menu</a>
    <a href="home_admin.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fas fa-home"></i> Beranda</a>
    <a href="barang_admin.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa-solid fa-list"></i>
      Daftar Barang</a>
    <a href="pengajuan_admin.php" onclick="w3_close()" class="w3-bar-item w3-button"><i
        class="fa-solid fa-computer"></i> Daftar Pengajuan</a>
    <a href="pengembalian_admin.php" onclick="w3_close()" class="w3-bar-item w3-button"><i
        class="fa-solid fa-arrow-right-arrow-left"></i> Daftar Pengembalian</a>
    <a href="peminjaman_admin.php" onclick="w3_close()" class="w3-bar-item w3-button"><i
        class="fa-solid fa-list-check"></i> Daftar Peminjaman</a>
  </nav>

  <!-- Top menu -->
  <div class="w3-top bg-color text-white">
    <div class="bg-color w3-xlarge" style="max-width:1200px;margin:auto">
      <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
      <div class="btn-group me-3 w3-right w3-padding-16">
        <button type="button" class="btn btn-pink dropdown-toggle text-white" data-bs-toggle="dropdown"
          data-bs-display="static" aria-expanded="true">
          <i class="fa-sharp fa-solid fa-user"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="static">
          <li><button class="dropdown-item" type="button"><b>Halo,<?php echo $_SESSION['username']?></b></button></li>
          <li><a class="dropdown-item" type="button" href="ganti-pass_admin.php">Ganti Password</a></li>
          <div class="dropdown-divider"></div>
          <li><a href="index.php" class="dropdown-item" type="button" h>Logout</a></li>
        </ul>
      </div>
      <div class="w3-center w3-padding-16">
        <a class="navbar-brand ms-3">
          <img src="img/SIPIHAN F.png" height="45px" href="#"></a>
      </div>
    </div>
  </div>

  <!-- !PAGE CONTENT! -->

  <!-- Modal tambah barang-->
  <div class="modal fade" tabindex="-1" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="tambahbrg.php" method="POST" enctype="multipart/form-data" onsubmit="return showPopup()">
            <label for="inputPassword3" class="col-form-label">Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" id="inputPassword3" placeholder="">
            <label for="inputPassword3" class="col-form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="inputEmail3" placeholder="">

            <label for="inputPassword3" class="col-form-label">Lokasi</label>
            <input type="text" class="form-control" name="lokasi" id="inputPassword3" placeholder="">
            <label for="inputPassword3" class="col-form-label">Jumlah Barang</label>
            <input type="number" class="form-control" name="stok" id="inputPassword3">
            <br>
            <label for="inputPassword3" class="col-form-label">Gambar</label>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="foto" id="inputGroupFile02">
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-danger" data-bs-dismiss="modal">Kirim</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  </div>
  <!-- data barang -->
 
  <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
  <div class="mt-1 position-relative">
  <div class="position-absolute top-0 end-0">
                        <form method="post" action="" id="search-form" class="col-sm-3">
                            <input type="search" name="search" placeholder="Cari Barang"  class="form-label"   onkeyup="search()"> 
                        </form>
                        </div>
                    </div>
    <h2 class="mb-3 text-center">DAFTAR BARANG</h2>
    
    <div class="row-4 text-center ms-3">
    
      <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal">
        <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA BARANG</button>

      <?php
            if (isset($_GET['pesan'])) {
              if ($_GET['pesan'] == "berhasil") {
                echo '<div class="alert alert-success alert-dismissible fade show row-4 text-center ms-3" role="alert" id="message">';
                  echo '<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-info-fill flex-shrink-0 me-2" viewBox="0 0 16 16" style="height: 1em; width: 1em; vertical-align: -0.125em;" role="img" aria-label="Warning:">';
                    echo '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>';
                  echo '</svg>';
						echo 'Barang Berhasil Ditambahkan';
                echo '</div>';
                echo "<script>
                setTimeout(function() {
                    document.getElementById('message').style.display='none';
                }, 3000);
            </script>";
        }
      
              }
              if (isset($_GET['status'])) {
                if ($_GET['status'] == "hapus") {
                  echo '<div class="alert alert-primary alert-dismissible fade show row-4 text-center ms-3" role="alert" id="message">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-info-fill flex-shrink-0 me-2" viewBox="0 0 16 16" style="height: 1em; width: 1em; vertical-align: -0.125em;" role="img" aria-label="Warning:">';
                      echo '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>';
                    echo '</svg>';
              echo 'Barang Berhasil Di Hapus';
                  echo '</div>';
                  echo "<script>
                  setTimeout(function() {
                      document.getElementById('message').style.display='none';
                  }, 3000);
              </script>";
          }
                }
              if (isset($_GET['status'])) {
                if ($_GET['status'] == "berhasil") {
                  echo '<div class="alert alert-primary alert-dismissible fade show row-4 text-center ms-3" role="alert" id="message">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-info-fill flex-shrink-0 me-2" viewBox="0 0 16 16" style="height: 1em; width: 1em; vertical-align: -0.125em;" role="img" aria-label="Warning:">';
                      echo '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>';
                    echo '</svg>';
              echo 'Edit Barang Berhasil';
                  echo '</div>';
                  echo "<script>
                  setTimeout(function() {
                      document.getElementById('message').style.display='none';
                  }, 3000);
              </script>";
          }
        
                }
          
          ?>
      <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
                    include 'config.php';
                    $no = 1;
                                if (isset($_POST['search'])) {
                                    // Retrieve search query from form
                                    $search = mysqli_real_escape_string($db, $_POST['search']);
                                    // Modify SELECT statement to use WHERE clause
                                    $query = mysqli_query($db, "SELECT * FROM `barang` WHERE nama_barang LIKE '%$search%' ");
                    } else {
                      // If search form was not submitted, retrieve all rooms
                      $query = mysqli_query($db, "SELECT * FROM `barang`");
                    }
                    while ($form = mysqli_fetch_array($query)) {
                    
                                ?>
        <div class="col-md-3">

          <div class="card" style="width: 18rem;">
            <img src=<?php echo "'fotobarang/".$form['foto']."'" ?> class="card-img-top" alt="..."
              style="height:200px;">
            <div class="card-body">
              <h5 class="card-title">Tersedia</h5>
              <h5 class="card-text"><?php echo $form['stok'];?></h5>
              <h5 class="card-text"><?php echo $form['nama_barang'];?></h5>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#editModal<?= $no ?>">
                EDIT
              </button>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#hapusModal<?= $no ?>">
                HAPUS
              </button>
            </div>
          </div>

        </div>

        <?php $no++;
      }
      ?>
      </div>
      <?php include 'config.php';
  $no = 1;
      $sql = "SELECT * FROM barang";
      $query = mysqli_query($db, $sql);
      while ($edit = mysqli_fetch_assoc($query)) {
      ?>
      <!-- EDIT -->
      <div class="modal fade" tabindex="-1" id="editModal<?= $no ?>">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit barang</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form action="mengedit.php" method="POST" onsubmit="return showPopup()">
                <label for="inputPassword3" class="col-form-label">Nama Barang :</label>
                <input type="text" class="form-control" name="nama_barang" id="inputEmail3" placeholder=""
                  value="<?php echo $edit['nama_barang'] ?>" required>
                <label for="inputPassword3" class="col-form-label">Kode Barang :</label>
                <input type="text" class="form-control" name="kode_barang" id="inputPassword3" placeholder=""
                  value="<?php echo $edit['kode_barang'] ?>" readonly required>
                <label for="inputPassword3" class="col-form-label">Lokasi Barang :</label>
                <input type="text" class="form-control" name="lokasi" id="inputPassword3" placeholder=""
                  value="<?php echo $edit['lokasi'] ?>" required>
                <label for="inputPassword3" class="col-form-label">Stok Barang :</label>
                <input type="number" class="form-control" name="stok" id="inputPassword3"
                  value="<?php echo $edit['stok'] ?>" required>
                <br>
                <label for="inputPassword3" class="col-form-label">Gambar</label>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" name="foto" id="inputGroupFile02" required>
                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-danger" data-bs-dismiss="modal">Kirim</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- MODAL HAPUS BARANG -->
      <div class="modal fade" tabindex="-1" id="hapusModal<?= $no ?>">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus barang</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              Apakah Anda ingin menghapus <?php echo $edit['nama_barang'];?>?
            </div>
            <div class="modal-footer"><?php
            echo "<a href='hapusbrg.php?kode_barang=".$edit['kode_barang']."' class='btn btn btn-danger'>Hapus</a>";
            ?>
              <button class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
            </div>

          </div>
        </div>
      </div><?php  $no++;
        }
  
      ?>
    </div>
    <script src="script/script.js"></script>

    <script>
      function showPopup() {
        // Display the pop-up
        confirm("Apakah Data yang Di input sudah benar ?");

        // Return true to submit the form
        return true;
      }
    </script>
</body>

</html>