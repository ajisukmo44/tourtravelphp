<?php session_start();
include '../koneksi.php';              // Panggil koneksi ke database
include '../fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include '../fungsi/cek_session.php';      // Panggil data setting
   
$id_paket  = mysqli_real_escape_string($conn, $_GET['id_paket']);
$sql      = "SELECT * FROM paket_wisata WHERE id_paket = '$id_paket' ";
$result   = mysqli_query($conn, $sql);
$data     = mysqli_fetch_array($result);
$img = $data['img'];  




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Edit paket</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
 <!-- Page Wrapper -->
 <div id="wrapper">


<!-- // Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
<?php include '../navbar.php'; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
    

      <!-- Content Row -->

      <!-- Content Row -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-8">
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
            <form action="aksipaket/aksieditpaket.php" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="id" class="col-sm-2 col-form-label">Id Paket</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="id_paket" id="id_paket"value="<?php echo $data['id_paket'] ?>" readonly >
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_paket" class="col-sm-2 col-form-label">Nama Paket</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_paket" name="nama_paket"  value="<?php echo $data['nama_paket'] ?>" require>
    </div>
  </div>
   

  <div class="form-group row">
    <label for="destinasi" class="col-sm-2 col-form-label">Destinasi</label>
    <div class="col-sm-10">
      <input type="destinasi" class="form-control" id="destinasi"  name="destinasi" value="<?php echo $data['destinasi'] ?>">   </div>
  </div>

  <div class="form-group row">
    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
    <div class="col-sm-10">
      <input type="kategori" class="form-control" id="kategori"  name="kategori" value="<?php echo $data['kategori'] ?>" readonly>   </div>
  </div>
  
  <div class="form-group row">
    <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
    <div class="col-sm-10">
      <input type="fasilitas" class="form-control" id="fasilitas"  name="fasilitas"  value="<?php echo $data['fasilitas'] ?>">   </div>
  </div>


  <div class="form-group row">
  <label for="gambar" class="col-sm-2 col-form-label">Gambar Sebelumnya</label>
    <img style="margin-left:10px; margin-right:45px; margin-bottom:15px;" src="../images/paket/<?php echo $img ?> " width="20%" height="20%" /><br> 
     </div>

     
    <div class="form-group row">
    <label for="gambar" class="col-sm-2 col-form-label">Gambar Baru</label>
    <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')"/> 
            <img id="preview" src="" alt="" width="25%"/>
    </div>
  
  
  <div class="form-group row">
    <div class="col-sm-12">
    <button type="submit" name="simpan" class="btn btn-success float-right"></span><i class="fa fa-check"></i> Simpan</button>
    <button type="reset" class="btn btn-danger float-right mr-2"><i class="fa fa-times"></i> Batal</button>
</div>
  </div>




</form>
</div>
</div>
</div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->

<?php include '../footer.php' ?>