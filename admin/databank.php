 <?php session_start();
include 'koneksi.php';               // Panggil koneksi ke database
include 'fungsi/cek_login.php';      // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';    // Panggil data setting
?>

<!DOCTYPE html>
<html lang="en">
<head>   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin | Data Bank</title>

  <!-- font dan css -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

 <div id="wrapper">

<!-- Sidebar -->
<?php include 'modul/sidebar.php'; ?>
<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">

        <div class="col-xl-12 col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Bank
          <a href='tambahbank.php' class='badge badge-success'>Tambah Data Bank</a> </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>     
              </div>
            </div>
         
             <!-- isi tabel data bank -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3b8686; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>No Rekening</th>
                      <th>Nama Rekening</th>
                      <th>Bank</th>
                      <th>Foto</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                  <!-- ambil data dari database -->
                  <?php
                  $sql = "SELECT * FROM tabel_bank ORDER BY no_rekening ";

                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0)
                  {
                    while ($data = mysqli_fetch_array($result))
                    {
                      echo "<tr style='font-family:verdana; text-align:center'>
                      <td>".$data['no_rekening']."</td>
                      <td>".$data['nama_rekening']."</td>
                      <td>".$data['nama_bank']."</td>
                      <td style='text-align: center'><img src='images/bank/".$data['img']."' width='50px' height='30px'></td>
                      <td>
                      <a href='editbank.php?no_rekening=$data[no_rekening]'class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>
                      <a href='#' data-href='modul/aksibank/aksihapusbank.php?no_rekening=$data[no_rekening]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-times'></i> </a>
                      </td>
                      
                      </tr>";
                          }
                          }
                          else
                          {
                            echo "Belum ada data";
                          }
                          ?>
                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                </div>
              </div>

              <!-- Modal HTML -->
              <?php include 'alerthapus.php' ?>

              <!-- Footer -->
              <?php include 'footer.php' ?>

              <script>
                    $('#confirm-delete').on('show.bs.modal', function(e) {
                        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                    });
                </script>