<?php 
include '../koneksi/koneksi.php';
$id_pembeli = $_POST['id'];
$nama_pembeli = $_POST['nama_pembeli'];
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$alamat = $_POST['almt'];
$kopos = $_POST['kopos'];
$tanggal = date('yy-m-d');


$kode = mysqli_query($conn, "SELECT invoice from detail_pesanan order by invoice desc");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['id_detal_pesanan6'], 3, 4);
$add = (int) $num + 1;
if(strlen($add) == 1){
	$format = "INV000".$add;
}else if(strlen($add) == 2){
	$format = "INV00".$add;
}
else if(strlen($add) == 3){
	$format = "INV0".$add;
}else{
	$format = "INV".$add;
}

$keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$id_pembeli'");

while($row = mysqli_fetch_assoc($keranjang)){
	$kd_produk = $row['kode_produk'];
	$nama_produk = $row['nama_produk'];
	$qty = $row['qty'];
	$harga = $row['harga'];
	$status = "Pesanan Baru";

	$order = mysqli_query($conn, "INSERT INTO produksi VALUES('','$format','$id_pembeli','$kd_produk','$nama_produk','$qty','$harga','$status','$tanggal','$prov','$kota','$alamat','$kopos','0','0','0')");


}
	$del_keranjang = mysqli_query($conn,"DELETE FROM keranjang WHERE kode_customer = '$id_pembeli'");

	if($del_keranjang){
		header("location:../selesai.php");
	}



?>