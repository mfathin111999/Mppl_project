<?php
session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo '<script language="javascript">alert("Untuk mengakses anda harus login"); document.location="../../index.php";</script>';
}
else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RKAT & LKAT UNIDA Gontor</title>
	<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../assets/css/themify-icons.css" rel="stylesheet">

	<link href="../../assets/css/style.css" rel="stylesheet">
	<link href="../../assets/css/style2.css" rel="stylesheet">

</head>
<body class="neucha" style="background: #eee">

	<nav class="navbar navbar-dark bg-dark sticky-top" >
		<button class="btn btn-secondary" id="sidebarCollapse"><span class="ti-angle-double-left"></span></button>
		<button class="btn btn-secondary" id="sidebarCollapse2"><span class="ti-angle-double-right"></span></button>
		<a href="#" class="navbar-brand text-white">RKAT & LKAT UNIDA</a>
		<div class="dropdown">
			<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="ti-settings"></span>
			</button>
			<div class="dropdown-menu dropdown-menu-right as" aria-labelledby="dropdownMenuButton">
				<div class="text-center">
					<img src="../../media/user.png" class="rounded-circle img-thumbnail" alt="User" width="100px" height="100px">
				</div><hr>
				<p align="center">
				<?php  
					echo $_SESSION['namauser'];
					
				?>
				</p>
				<br>
				<div class="text-center">
					<a href="../../config/logout.php">
						<button class="btn btn-warning"> Logout</button>
 					</a>
				</div>

			</div>
		</div>
	</nav>

	<div class="kukaku">

		<div id="sidebar" class="sidebar-sticky">
			<div class="list-group">
				<a href="index.php" class="list-group-item list-group-item-action active"><button class="btn btn-info"><span class="ti-home"></span></button>  Home</a>
				<a href="pengajuan.php" class="list-group-item list-group-item-action list-group-item-primary"><button class="btn btn-primary"><span class="ti-write"></span></button>  Form Pengajuan</a>
				<a href="revisi.php" class="list-group-item list-group-item-action list-group-item-secondary"><button class="btn btn-secondary"><span class="ti-reload"></span></button>  Revisi</a>
				<a href="pengajuan_bulanan.php" class="list-group-item list-group-item-action list-group-item-success"><button class="btn btn-success"><span class="ti-shopping-cart-full"></span></button>  Pengajuan Anggaran Bulanan</a>
				<a href="laporan.php" class="list-group-item list-group-item-action list-group-item-danger"><button class="btn btn-danger"><span class="ti-bookmark"></span></button>  Laporan KAT</a>
			</div>
		</div>
		<div id="sumput" class="sidebar-sticky">
			<div class="list-group">
				<a href="index.php" class="list-group-item list-group-item-action"><button class="btn btn-info"><span class="ti-home"></span></button></a>
				<a href="pengajuan.php" class="list-group-item list-group-item-action list-group-item-primary"><button class="btn btn-primary"><span class="ti-write"></span></button></a>
				<a href="revisi.php" class="list-group-item list-group-item-action list-group-item-secondary"><button class="btn btn-secondary"><span class="ti-reload"></span></button></a>
				<a href="pengajuan_bulanan.php" class="list-group-item list-group-item-action list-group-item-success"><button class="btn btn-success"><span class="ti-shopping-cart-full"></span></button></a>
				<a href="laporan.php" class="list-group-item list-group-item-action list-group-item-danger"><button class="btn btn-danger"><span class="ti-bookmark"></span></button></a>
			</div>
		</div>
		<div id="content">	
			<div class="card">
				<div class="card-header">
					<h1 align="center">Upload Laporan Kegiatan dan Anggaran Tahunan</h1>
				</div> 
				<div class="card-body">
					<div class="card" id="uhuy">
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>No</th>
								<th>Nama</th>
								<th>Opsi</th>
							</tr>
							<?php
             				require "../../config/db.php";
						          $sql = mysqli_query($db, "SELECT * FROM laporan WHERE id_user = '$_SESSION[id_user]' ORDER BY id_laporan ASC");
						          $no = 1;
						          $a = getdate();	
						          $j = $a['year'];
						          while($data = mysqli_fetch_assoc($sql)){						          
						    ?>
            					<tr>
					              <td><?php echo $no; $no++ ?></td>
					              <td><?php echo $data['nama_laporan']; ?></td>
					              <td>
					                <a class="btn btn-danger" title="Delete" onclick=" return confirm('apakah anda yakin akan menghapus data ini ?')"<?php echo "href=\"../../config/action.php?module=laporan&act=delete&id_user=$data[id_user]&id=$data[id_laporan]\""; ?>><i class="ti-trash"></i></a>
					              </td>
					            </tr>

            					<?php } ?>
						</table>
						<form method="POST" enctype="multipart/form-data" <?php echo "action=\"../../config/action.php?module=laporan&act=create\""; ?>>
							<div class="form-group">
								<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
								<input type="hidden" name="tahun" value="<?php echo $j; ?>">
								<input type="file" name="file">
							</div>
							<button type="submit" class="btn btn-primary float-right" name="upload">Upload</button>
						</form>
						
					</div>
				</div>

			</div>
		</div>



	</div>





	<script src="../../assets/bower_components/jQuery/dist/jquery.min.js"></script>
	<script src="../../assets/bower_components/popper.js/dist/umd/popper.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>

	<script>
		$('#sumput').hide();
		$('#sidebarCollapse2').hide();		
		$(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
				$('#sidebarCollapse').hide();
				$('#sidebarCollapse2').show();
				$('#sumput').show();
			});
		});
		$(document).ready(function(){
			$('#sidebarCollapse2').on('click',function(){
				$('#sidebar').toggleClass('active');
				$('#sidebarCollapse').show();
				$('#sidebarCollapse2').hide();
				$('#sumput').hide();

			});
		});	
	
	</script>

</body>
</html>

<?php
}
?>