 <?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // Panggil data setting
?>

<!DOCTYPE html>
<html lang="en">

<head>   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Data Paket</title>

  
  <!-- Font dan Css -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

 <div id="wrapper">
<!-- // Sidebar -->
<?php include 'modul/sidebar.php'; ?>

<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">

    <!-- Topbar -->
<?php include 'navbar.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-12 col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Paket 
              <a href='tambahpaket.php' class='badge badge-success'>Tambah Data Paket</a> </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
              </div>
            </div>
         
             <!-- DataTales Paket -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #3b8686; color:#fff; line-height:8px">
                    <tr style="text-align:center;">
                      <th>IDPaket</th>
                      <th>Kategori</th>
                      <th>Nama Paket</th>
                      <th>Fasilitas</th>
                      <th>Disclaimer</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                      <!-- ambil data dari database -->
          <?php
            $sql = "SELECT * FROM tabel_paket a JOIN tabel_kategori b ON a.id_kategori = b.id_kategori ORDER BY a.id_paket ASC";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
              while ($data = mysqli_fetch_array($result))
              {
                echo "<tr style='font-family:verdana;  text-align:center'>
                <td>".$data['id_paket']."</td>
                <td>".$data['nama_kategori']."</td>
                <td>".$data['nama_paket']."</td>
                <td>".$data['fasilitas']."</td>
                <td>".$data['disclaimer']."</td>
                  <td>
                <a href='editpaket.php?id_paket=$data[id_paket]' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>
                  <a href='#' data-href='modul/aksipaket/aksihapuspaket.php?id_paket=$data[id_paket]' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-times'></i></a>
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