<?php
include 'admin/koneksi.php';
include 'admin/fungsi/base_url.php';

if(isset($_POST['submit']))
{  
  $id         = mysqli_real_escape_string($conn,$_POST['id_pelanggan']);
  $nama       = mysqli_real_escape_string($conn,$_POST['nama']);
  $alamat     = mysqli_real_escape_string($conn,$_POST['alamat']);
  $email      = mysqli_real_escape_string($conn,$_POST['email']);
  $no_hp      = mysqli_real_escape_string($conn,$_POST['no_hp']);
  $username   = mysqli_real_escape_string($conn,$_POST['username']);
  $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "SELECT * FROM pelanggan WHERE email = '$email' AND status = 'aktif' ";
  $cekdata  = mysqli_query($conn, $sql);
          if(empty($nama))
          {
            echo "<script>alert('Nama harus diisi!');history.go(-1)</script>";
          }
          elseif(empty($username))
          {
            echo "<script>alert('Username harus diisi!');history.go(-1)</script>";
          }
          elseif(empty($email))
          {
            echo "<script>alert('email harus diisi!');history.go(-1)</script>";
          }
          elseif(empty($password))
          {
            echo "<script>alert('password harus diisi!');history.go(-1)</script>";
          }
          elseif(empty($no_hp))
          {
            echo "<script>alert('no hp harus diisi!');history.go(-1)</script>";
          }
          elseif(mysqli_num_rows($cekdata) > 0)
          {
            // Alert/ pemberitahuan email yang dipakai telah ada/ tidak
            echo "<script>alert('username/email telah terpakai, silahkan gunakan  yang lain!');history.go(-1)</script>";
          }
            else
            {     
               
              // Proses insert data
              $create = "INSERT INTO pelanggan ( id_pelanggan,
                                                nama,
                                                alamat,
                                                email,
                                                no_hp,
                                                username,
                                                password,
                                                status) 
                                        VALUES ('$id',
                                                '$nama',
                                                '$alamat',
                                                '$email',
                                                '$no_hp',
                                                '$username',
                                                '$password',
                                                'aktif')";

              if (mysqli_query($conn, $create)) 
              {
                echo "<script>alert('Registrasi berhasil, Silahkan login!');location.replace('login.php')</script>";
              } 
              else 
              {
                echo "Error updating record: " . mysqli_error($conn);
              }
            }
        }
        ?>