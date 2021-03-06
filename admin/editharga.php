<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
   
$id_harga  = mysqli_real_escape_string($conn, $_GET['id_harga']);
$sql      = "SELECT * FROM tabel_harga_paket a JOIN tabel_paket b ON a.id_paket = b.id_paket JOIN tabel_hotel c ON a.id_hotel = c.id_hotel WHERE a.id_harga = '$id_harga' ORDER BY a.id_harga ASC";
$result   = mysqli_query($conn, $sql);
$data     = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Edit Harga</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
 <!-- Page Wrapper -->
 <div id="wrapper">


<!-- // Sidebar -->
<?php include 'modul/sidebar.php'; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
<?php include 'navbar.php'; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-7 col-lg-6">
          <div class="card shadow mb-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Data User </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
             
              </div>
            </div>
            <!-- Card Body -->
         
        <!-- DataTales Example -->
  <div class="card-body">
  <form action="modul/aksihargapaket/aksieditharga.php" method="post">
  <div class="form-group row">
    <label for="id" class="col-sm-3 col-form-label">Id Harga</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="id_harga" id="id_harga" value="<?php echo $data['id_harga'] ?>" readonly>
    </div>
    </div>
  
  <div class="form-group row">
    <label for="nama" class="col-sm-3 col-form-label">Nama Paket</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nama_paket" id="nama_paket" value="<?php echo $data['nama_paket'] ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-sm-3 col-form-label">Nama Hotel</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nama_paket" id="nama_paket" value="<?php echo $data['nama_hotel'] ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="min" class="col-sm-3 col-form-label ">Min Peserta</label>
    <div class="col-sm-2">
      <input type="number" class="form-control " name="min" id="min" value="<?php echo $data['min'] ?>">
    </div>
    <label for="max" class="col-sm-1.5 col-form-label ml-5">Max </label>
    <div class="col-sm-2">
      <input type="number" class="form-control" name="max" id="max" value="<?php echo $data['max'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-sm-3 col-form-label">Harga</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'] ?>">
    </div>
  </div>
  
  
  
  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="submit" class="btn btn-success float-right"></span><i class="fa fa-check"></i> Simpan</button>
    <a href="dataharga.php" class="btn btn-danger float-right mr-2"><i class="fa fa-times"></i> Batal</a>
</div>
  </div>
</form>
</div>
</div>
</div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
  <br><br><br><br><br><br><br><br>
  <!-- Footer -->

<?php include 'footer.php' ?>