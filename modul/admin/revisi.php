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
				<a href="index.php" class="list-group-item list-group-item-action"><button class="btn btn-info"><span class="ti-home"></span></button>  Home</a>
				<a href="revisi.php" class="list-group-item list-group-item-action list-group-item-secondary"><button class="btn btn-secondary"><span class="ti-reload"></span></button>  Revisi</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-success"><button class="btn btn-success"><span class="ti-shopping-cart-full"></span></button>  Anggaran Bulanan</a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-danger"><button class="btn btn-danger"><span class="ti-printer"></span></button>  Print</a>
			</div>
		</div>
		<div id="sumput" class="sidebar-sticky">
			<div class="list-group">
				<a href="index.php" class="list-group-item list-group-item-action"><button class="btn btn-info"><span class="ti-home"></span></button></a>
				<a href="revisi.php" class="list-group-item list-group-item-action list-group-item-secondary"><button class="btn btn-secondary"><span class="ti-reload"></span></button></a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-success"><button class="btn btn-success"><span class="ti-shopping-cart-full"></span></button></a>
				<a href="#" class="list-group-item list-group-item-action list-group-item-danger"><button class="btn btn-danger"><span class="ti-printer"></span></button></a>
			</div>
		</div>
		<div id="content">	
			<div class="card">
				<div class="card-header">
					<h1 align="center">Form Revisi Pengajuan RKAT</h1>
				</div> 
				<div class="card-body">
					<div class="card" id="uhuy">

						<div class="row">
							<div class="col-md-6">
								<div class="btn-group" role="group">
		    						<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      						RKAT UNIDA Gontor Tahun :
		    						</button>
								    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
								      <a class="dropdown-item" href="#">2019</a>
								      <a class="dropdown-item" href="#">2018</a>
								      <a class="dropdown-item" href="#">2017</a>
								      <a class="dropdown-item" href="#">2016</a>
								      <a class="dropdown-item" href="#">2015</a>
								      <a class="dropdown-item" href="#">2014</a>
								      <a class="dropdown-item" href="#">2013</a>
								      <a class="dropdown-item" href="#">2012</a>
								      <a class="dropdown-item" href="#">2011</a>
								      <a class="dropdown-item" href="#">2010</a>
								      <a class="dropdown-item" href="#">2009</a>
								    </div>
								</div>
							</div>

							<div class="col-md-6">
								<h4></h4>
								
							</div>
						</div>

						<br>
						<h4>RKAT UNIDA Gontor Tahun : (database)</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>No</th>
								<th>Instansi</th>
								<th>Revisi</th>
							</tr>

							<?php
             				require "../../config/db.php";
						          $sql = mysqli_query($db, "SELECT * FROM pengajuan WHERE id_user = '$_SESSION[id_user]' ORDER BY id_data ASC");
						          $no = 1;
						          $a = getdate();	
						          $j = $a['year'];
						          while($data = mysqli_fetch_assoc($sql)){
						          	 $jumlah=number_format($data['jumlah'],0,",",".");
						          	 $satuan=number_format($data['satuan'],0,",",".");
						          
						    ?>
							<tr>
					            <td><?php echo $data['id_data']; ?></td>
					            <td><?php echo $data['nama']; ?></td>
								<td>
									<a class="btn btn-alert" title="Lihat" data-target="#exampleModal?id=<?php echo $data['id_data']; ?>"><i class="ti-view"></i></a>
					                <a class="btn btn-warning" title="Edit" data-target="#exampleModal?id=<?php echo $data['id_data']; ?>"><i class="ti-pencil"></i></a>
					                <a class="btn btn-danger" title="Delete" onclick=" return confirm('apakah anda yakin akan menghapus data ini ?')"<?php echo "href=\"../../config/action.php?module=pengajuan&act=delete&id=$data[id_data]\""; ?>><i class="ti-trash"></i></a>
					            </td>
							</tr>
							<?php } ?>
						</table>

					</div>
				</div>

			</div>
		</div>



	</div>





	<script src="../../assets/bower_components/jQuery/dist/jquery.min.js"></script>
	<script src="../../assets/bower_components/popper.js/dist/umd/popper.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>

	<script>
		$('#sidebarCollapse2').hide();
		$('#sumput').hide();
		$(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
				$('#sidebarCollapse').hide();
				$('#sidebarCollapse2').show();
				$('#sumput').show();
			});
			$('#sidebarCollapse2').on('click',function(){
				$('#sidebar').toggleClass('active');
				$('#sidebarCollapse2').hide();
				$('#sumput').hide();
				$('#sidebarCollapse').show();
			});
		});  
	</script>

</body>
</html>

<?php
}
?>