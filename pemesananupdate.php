<?php session_start();
include 'admin/koneksi.php';                    // Panggil koneksi ke database

if(isset($_POST['submit']))
{ 
  $id_pemesanan     = mysqli_real_escape_string($conn,$_GET['id_pemesanan']);
  $jp            = mysqli_real_escape_string($conn,$_POST['total_pax']);
  $th            = mysqli_real_escape_string($conn,$_POST['total_harga1']);
  $nt            = mysqli_real_escape_string($conn,$_POST['norek_tujuan']);

  
  // Proses update data dari form ke db

  $sql = "UPDATE tabel_detail_pemesanan SET id_pemesanan  = '$id_pemesanan',
                          jumlah_pax    = '$jp',
                          total_harga    =  '$th',
                          norek_tujuan    = '$nt'
                          WHERE id_pemesanan = '$id_pemesanan'; ";

$sql .= "UPDATE tabel_pemesanan SET status  = '1'
                          WHERE id_pemesanan = '$id_pemesanan';";


$sql .= "INSERT INTO tabel_status (id, id_pemesanan, status_pemesanan, waktu) VALUES ('','$id_pemesanan','1',now())";

  if(mysqli_multi_query($conn, $sql)) 
  {
    echo "<script>location.replace('pemesananselesai.php?id_pemesanan=$id_pemesanan')</script>";
  } 
    else 
    {
      echo "Error updating record: " . mysqli_error($conn);
    }
}
  else
  {
    echo "<script>alert('Gak boleh tembak langsung ya, pencet dulu tombol uploadnya!');history.go(-1)</script>";
  }
?>