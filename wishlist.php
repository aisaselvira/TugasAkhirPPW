<?php 
include 'header.php';
if(isset($_POST['submit1'])){
	$id_wishlist = $_POST['id'];
	$qty = $_POST['qty'];

	$edit = mysqli_query($conn, "UPDATE wishlist SET qty = '$qty' where id_wishlist = '$id_wishlist'");
	if($edit){
			echo "
		<script>
		alert('wishlist BERHASIL DIPERBARUI');
		window.location = 'wishlist.php';
		</script>
		";
	}
}else if(isset($_GET['del'])){
	$id_wishlist = $_GET['id'];
	$del = mysqli_query($conn, "DELETE FROM wishlist WHERE id_wishlist = '$id_wishlist'");
	if($del){
		echo "
		<script>
		alert('1 PRODUK DIHAPUS');
		window.location = 'wishlist.php';
		</script>
		";
	}
}

?>


<div class="container" style="padding-bottom: 200px;">
	<h2 style=" width: 100%; border-bottom: 2px solid #ff8680"><b>Wishlist</b></h2>
		<table class="table table-striped">
			<?php 
			if(isset($_SESSION['user'])){
				$kode_cs = $_SESSION['kd_cs'];
			// CEK JUMLAH wishlist
				$cek = mysqli_query($conn, "SELECT * FROM wishlist WHERE kode_customer = '$kode_cs'");
				$jml = mysqli_num_rows($cek);

				if($jml > 0){
					?>	
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Image</th>
							<th scope="col">Nama</th>
							<th scope="col">Harga</th>
							<th scope="col">Qty</th>
							<th scope="col">SubTotal</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<?php 
					if(isset($_SESSION['kd_cs'])){
						$kode_cs = $_SESSION['kd_cs'];

						$result = mysqli_query($conn, "SELECT k.id_wishlist as wishlist, k.kode_produk as kd, k.nama_produk as nama, k.qty as jml, p.image as gambar, p.harga as hrg FROM wishlist k join produk p on k.kode_produk=p.kode_produk WHERE kode_customer = '$kode_cs'");
						$no = 1;
						$hasil = 0;
						while($row = mysqli_fetch_assoc($result)){
				
					?>
					<tbody>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $row['wishlist']; ?>">
						<tr>
							<th scope="row"><?= $no;  ?></th>
							<td><img src="image/produk/<?= $row['gambar']; ?>" width="100"></td>
							<td><?= $row['nama']; ?></td>
							<td>Rp.<?= number_format($row['hrg']);  ?></td>
							<td><input type="number" name="qty" class="form-control" style="text-align: center;" value="<?= $row['jml']; ?>"></td>
							<td>Rp.<?= number_format($row['hrg'] * $row['jml']);  ?></td>
							<td><button type="submit" name="submit1" class="btn btn-warning">Update</button> | <a href="wishlist.php?del=1&id=<?= $row['wishlist']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus ?')">Delete</a></td>
						</tr>
						</form>
					<?php 
							$sub = $row['hrg'] * $row['jml'];
							$hasil += $sub;
							$no++;
						}
					}
					 ?>
					 
						<tr>
							<td colspan="7" style="text-align: right; font-weight: bold;">Grand Total = Rp.<?= number_format($hasil); ?></td>
						</tr>
						<tr>
							<td colspan="7" style="text-align: right; font-weight: bold;"><a href="index.php" class="btn btn-success">Lanjutkan Belanja</a> <a href="checkout.php?kode_cs=<?= $kode_cs; ?>" class="btn btn-primary">Checkout</a></td>
						</tr>
						<?php 
					}else{
						echo "
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>Image</th>
						<th scope='col'>Nama</th>
						<th scope='col'>Harga</th>
						<th scope='col'>Qty</th>
						<th scope='col'>SubTotal</th>
						<th scope='col'>Action</th>
						</tr>
						<tr>
						<td colspan='7' class='text-center bg-warning'><h5><b>wishlist BELANJA ANDA KOSONG </b></h5></td>
						</tr>

						";
					}

				}else{
					echo "<tr>
					<td colspan='7' class='text-center bg-danger'><h5><b>SILAHKAN LOGIN TERLEBIH DAHULU SEBELUM BERBELANJA</b></h5></td>
					</tr>";
				}
				?>


			</tbody>
		</table>
	
</div>




<?php 
include 'footer.php';
?>