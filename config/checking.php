<?php  
require_once "db.php";

$email = $_POST['email'];
$password = $_POST['password'];
$pass_enkripsi = md5($password);

$injeksi_password = mysqli_real_escape_string($db,$pass_enkripsi);

if (!ctype_alnum($injeksi_password)) {
	echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
	$query 	= "SELECT * FROM user WHERE email='$email' AND password='$pass_enkripsi';";
	$login  = mysqli_query($db,$query);
	$ketemu = mysqli_num_rows($login);
	$r      = mysqli_fetch_array($login);

	if ($ketemu > 0 ) {

		session_start();

		$_SESSION['namauser']		= $r['username'];
		$_SESSION['instansi']		= $r['nama_instansi'];
		$_SESSION['passuser']		= $r['password'];
		$_SESSION['namalengkap']	= $r['nama_lengkap'];
		$_SESSION['email']			= $r['email'];
		$_SESSION['level']			= $r['level'];
		$_SESSION['id_user']		= $r['id_user'];

		if ($_SESSION['level'] == 'admin') {
			header("location:../modul/admin/index.php");
		}
		else{
			header("location:../modul/user/index.php");
		}
		
	}
	else{
		echo '<script language="javascript">alert("Login Gagal ! Username & Password Salah"); document.location="../index.php";</script>';
	}
}
?>