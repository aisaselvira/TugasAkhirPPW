<?php 
session_start();
include '../koneksi/koneksi.php';

$username = $_POST['username_pembeli'];
$password = $_POST['password_pembeli'];

$cek = mysqli_query($conn, "SELECT * FROM pembeli where username_pembeli = '$username'");
$jml = mysqli_num_rows($cek);
$row = mysqli_fetch_assoc($cek);

if(count($row)>0){
	(password_verify($password, $row['password_pembeli']));
		$_SESSION['username_pembeli'] = $row['nama_pembeli'];
		$_SESSION['id_pembeli'] = $row['id_pembeli'];
		header('location:../index.php');
}else{
	echo "
	<script>
	alert('USERNAME/PASSWORD SALAH');
	window.location = '../user_login.php';
	</script>
	";
	die;
}

?>
