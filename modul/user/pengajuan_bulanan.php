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
					<h1 align="center">Form Pengajuan Anggaran Bulanan</h1>
				</div> 
				<div class="card-body">
					<div class="card" id="uhuy">
						<h4>A. Alat Tulis Kantor</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table>
					</div>

					<div class="card" id="uhuy">
						<h4>B. Kegiatan Reguler Akademik</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table>
					</div>

					<div class="card" id="uhuy">
						<h4>C. Peningkatan mutu mahasiswa dan lulusan</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table> 
					</div>

					<div class="card" id="uhuy">
						<h4>D. Peningkatan mutu dan kompetensi dosen</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table> 	
					</div>

					<div class="card" id="uhuy">
						<h4>E. Pengembangan kurikulum, pembelajaran dan suasana akademik</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table>  	
					</div>

					<div class="card" id="uhuy">
						<h4>F. Pengembangan sarana, prasarana, dan IT</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table> 
					</div>

					<div class="card" id="uhuy">
						<h4>G. Penelitian, pengabdian masyarakat, dan kerjasama</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table> 
					</div>

					<div class="card" id="uhuy">
						<h4>H. Perjalanan Dinas</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table>
					</div>

					<div class="card" id="uhuy">
						<h4>I. Lain-lain</h4>
						<table class="table table-bordered table-hover">
							<tr class="table-primary">
								<th>ID</th>
								<th>Nama</th>
								<th>Kode</th>
								<th>Vol</th>
								<th>Harga Satuan</th>
								<th>Jumlah</th>
								<th>Waktu</th>
								<th>Tahun</th>
								<th>Opsi</th>
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
					              <td><?php echo $data['kode']; ?></td>
					              <td><?php echo $data['volume']; ?></td>
					              <td>Rp. <?php echo $satuan ?></td>
					              <td>Rp. <?php echo $jumlah ?></td>
					              <td><?php echo $data['waktu']; ?></td>
					              <td><?php echo $data['tahun']; ?></td>
					              <td>
					              	<div class="checkbox-inline">
  										<label><input type="checkbox" value="">Ajukan</label>
									</div>
					              </td>
					            </tr>
            					<?php } ?>
						</table> 
					</div>

										<div class="card" id="uhuy">
						<table class="table table-bordered table-hover">
							<h4>Subtotal per Kategori</h4>
							<tr class="table-primary">
								<th>No</th>
								<th>Kategori</th>
								<th>SubTotal</th>
							</tr>

							<tr>
								<td>1</td>
								<td>Alat Tulis Kantor</td>
								<td>Rp. </td>
							</tr>
							
							<tr>
								<td>2</td>
								<td>Kegiatan Reguler Akademik</td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td>3</td>
								<td>Peningkatan mutu mahasiswa dan lulusan</td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td>4</td>
								<td>Peningkatan mutu dan kompetensi dosen</td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td>5</td>
								<td>Pengembangan kurikulum, pembelajaran dan suasana akademik </td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td>6</td>
								<td>Pengembangan sarana, prasarana, dan IT</td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td>7</td>
								<td>Penelitian, pengabdian masyarakat, dan kerjasama</td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td>8</td>
								<td>Perjalanan Dinas</td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td>9</td>
								<td>Lain-lain</td>
								<td>Rp. </td>
							</tr>

							<tr>
								<td></td>
								<td>Total</td>
								<td>Rp. </td>
							</tr>
						</table>
					</div>

					<br>
					<button type="submit" class="btn btn-primary float-right" name="upload">Ajukan</button>
				</div>
			</div>
		</div>



	</div>





	<script src="../../assets/bower_components/jQuery/dist/jquery.min.js"></script>
	<script src="../../assets/bower_components/popper.js/dist/umd/popper.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>



	<script>	
		function startCalc(){
			interval = setInterval("calc()",1);}
		function calc(){
			one = document.getElementById('volume').value;
			two = document.getElementById('satuan').value; 
			document.getElementById('jumlah').value = (one * 1) * (two * 1);}
		function stopCalc(){clearInterval(interval);}

		$('#exampleModal').on('hidden.bs.modal', function() {
	   	 	$(this).find('form').trigger('reset');
		});

	</script>

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