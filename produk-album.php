<?php 
	include 'header.php';
?>
<!-- PRODUK TERBARU -->

<div class="container">
	<h2 style="width: 100%; border-bottom: 2px solid #0000; text-align:center; font-size:28px"><b>Album</b></h2>
	<hr>

    <div class="row">
        <?php 
        $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_kategori = 'KT0001'");
        while ($row = mysqli_fetch_assoc($result)) {
			$quantity = number_format($row['stok_produk'], 0, ',', '.');
			$price = number_format($row['harga_produk'], 0, ',', '.');
        ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-img-container text-center">
                        <img src="images/<?= $row['gambar_produk']; ?>" style="width: 250px; height: 250px; object-fit: contain;">
                    </div>
                    <div class="card-body">
                        <div class="star text-center">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h3 style="text-align: center; font-size: 18px;"><?= $row['nama_produk']; ?></h3>
                        <div class="product-quantity text-center" style="font-size: 14px;">
                            <span class="quantity-label">Stock:</span>
                            <span class="quantity-value"> <?= $quantity; ?></span>
                        </div>
                        <div class="product-price text-center" style="font-size: 14px; padding-bottom: 5px;">
                            <span class="price-label">Price:</span>
                            <span class="price-value">$ <?= $price; ?></span>
                        </div>
                        <div class="product-action">
                            <form action="wishlist.php" method="POST">
                                <input type="hidden" name="product_name" value="<?= $row['nama_produk']; ?>">
                                <input type="hidden" name="product_price" value="<?= $row['harga_produk']; ?>">
								<div class="row justify-content-center">
									<?php if(isset($_SESSION['id_pembeli'])){ ?>
									<div class="col-md-6 mb-3">
										<a href="proses/add.php?produk=<?= $row['id_produk']; ?>&id_pembeli=<?= $id_cs; ?>&hal=1" class="btn btn-success btn-block px-4" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
									</div>
									<?php } else { ?>
									<div class="col-md-6 mb-3">
										<a href="wishlist.php" class="btn btn-success btn-block px-4" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang</a>
									</div>
									<?php } ?>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        <?php 
        }
        ?>
    </div>
</div>

<br><br><br><br><br><br>

<section class="feature section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 ml-auto justify-content-center">
        <!-- Feature Mockup -->
        <div class="image-content" data-aos="fade-right">
          <img class="img-fluid" src="images/best.png" alt="iphone">
        </div>
      </div>
      <div class="col-lg-6 mr-auto align-self-center">
        <div class="feature-content">
          <!-- Feature Title -->
          <h2>Best Price</h2>
          <!-- Feature Description -->
          <p class="desc">"Discover the best prices for your favorite K-Pop products here!"</p>
          <!-- Button -->
          <a href="best-price.php" class="btn btn-primary">Click Now!</a>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
	include 'footer.php';
?>
