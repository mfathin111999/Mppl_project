
<?php

  
  require_once('db.php');
  
  $module = $_GET['module'];
  $act    = $_GET['act'] ;

  if ($module == 'user' AND $act == 'create'){
      $a = getdate();
      $tahun = $a['year'];
      $nama             = $_POST['nama'];
      $kode             = $_POST['kode'];
      $volume           = $_POST['volume'];
      $satuan           = $_POST['satuan'];
      $jumlah           = $_POST['jumlah'];
      $waktu            = $_POST['waktu'];
      $tahun            = $_POST['tahun'];
      $id_user          = $_POST['id_user'];

      $create  = "INSERT INTO pengajuan (nama, kode, volume, satuan, jumlah, waktu, tahun, id_user) 
                  VALUES ('$nama', '$kode', '$volume', '$satuan', '$jumlah', '$waktu', '$tahun', '$id_user')";
      
      mysqli_query($db, $create);


      header("location:../modul/user/pengajuan.php");
  }  
  elseif ($module == 'user' AND $act == 'update'){
      $id               = $_POST['id_data'];
      $nama             = $_POST['nama'];
      $kode             = $_POST['kode'];
      $volume           = $_POST['volume'];
      $satuan           = $_POST['satuan'];
      $jumlah           = $_POST['jumlah'];
      $waktu            = $_POST['waktu'];
      $update = "UPDATE pengajuan SET nama              = '$nama',
                                      kode              = '$kode',
                                      volume            = '$volume',
                                      satuan            = '$satuan',
                                      jumlah            = '$jumlah',
                                      waktu             = '$waktu',
                                      WHERE id_data     = '$id'";
      mysqli_query($db, $update); 

      header("location:../modul/user/pengajuan.php");
  }

  elseif ($module == 'pengajuan' AND $act == 'delete'){

      mysqli_query($db, "DELETE FROM pengajuan WHERE id_data = '$_GET[id]'");
      header("location:../modul/user/pengajuan.php");
  }  

  elseif ($module == 'laporan' AND $act == 'create'){

      $id_user              = $_POST['id_user'];
      $tahun                = $_POST['tahun'];


      if(isset($_POST['upload'])){
        $ekstensi_diperbolehkan = array('docx', 'xlsx', 'doc', 'xls');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];  
      
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran < 10440700){      
            move_uploaded_file($file_tmp, './../media/laporan/'.$nama);
            $sql = "INSERT INTO laporan (nama_laporan, tahun, id_user) VALUES ('$nama', '$tahun', '$id_user')";
            $query = mysqli_query($db, $sql);
            if($query){
              echo 'FILE BERHASIL DI UPLOAD';
              header("location:../modul/user/laporan.php");              
            }else{
              echo 'GAGAL MENGUPLOAD GAMBAR';
              header("location:../modul/user/laporan.php");
            }
          }else{
            echo 'UKURAN FILE TERLALU BESAR';
            header("location:../modul/user/laporan.php");
                      }
        }else{
          echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
          header("location:../modul/user/laporan.php");
        }
      }
  }  

  elseif ($module == 'laporan' AND $act == 'delete'){

      mysqli_query($db, "DELETE FROM laporan WHERE id_laporan = '$_GET[id]' AND id_user = '$_GET[id_user]'");
      header("location:../modul/user/laporan.php");
      
  }




?>