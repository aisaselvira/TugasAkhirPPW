<?php 
session_start();
include 'koneksi/koneksi.php';
if(isset($_SESSION['id_pembeli'])){

	$id_pembeli = $_SESSION['id_pembeli'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>K-POP STORE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link href="css/styles.css" rel="stylesheet">

</head>

<body class="show-on-scroll">

<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0 sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.html"><img src="images/ktown.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="ti-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @@home">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item @@about">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item @@about">
          <a class="nav-link" href="view_produk.php">Product</a>
        </li>
        <li class="nav-item @@product active">
          <a class="nav-link" href="best-product.php">Best Product</a>
        </li>
        <li class="nav-item @@contact">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

        <?php 
          if(isset($_SESSION['id_pembeli'])){
            $id_cs = $_SESSION['id_pembeli'];
            $cek = mysqli_query($conn, "SELECT id_produk from wishlist where id_pembeli = '$id_pembeli' ");
            $value = mysqli_num_rows($cek);
        ?>
        <li class="nav-item @@wishlist">
          <a class="nav-link" href="wishlist.php">
            Wishlist
            <b>[ <?= $value ?> ]</b>
          </a>
        </li>
        <?php 
          } else {
            echo "<li class='nav-item @@wishlist'><a class='nav-link' href='wishlist.php'>Wishlist <b>[0]</b></a></li>";
          }

          if(!isset($_SESSION['user'])){
        ?>
        <li class="nav-item dropdown @@pages">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="glyphicon glyphicon-user"></i> Akun <span><i class="ti-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user_login.php">Login</a></li>
            <li><a class="dropdown-item" href="register.php">Register</a></li>
          </ul>
        </li>
        <?php 
          } else {
        ?>
        <li class="nav-item px-2 py-2 dropdown">
          <a href="#" class="nav-link text-uppercase text-dark" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="proses/logout.php">Log Out</a></li>
          </ul>
        </li>
        <?php 
          }
        ?>
      </ul>
	</div>
  </div>
</nav>

<section class="section investors">
	<div class="container">
    <img src="images/tw.png" style="justify-content:center; width: 100%;"><br><br><br>
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Best Product</h2>
					<p>Discover the Best K-pop Merchandise - Elevate Your Style with Our Top Picks!</p>
                    <hr>
                </div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/bts1.webp" alt="investor">
					</div>
					<!-- Company -->
					<h3>BTS - Album</h3>
					<!--  -->
					<p>$81</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/lg2.webp" alt="investor">
					</div>
					<!-- Company -->
					<h3>BLACKPINK - Lighstick</h3>
					<!--  -->
					<p>$50</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/pc6.png" alt="investor">
					</div>
					<!-- Company -->
					<h3>Jisoo - Photocard</h3>
					<!--  -->
					<p>$32</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/proof.png" alt="investor">
					</div>
					<!-- Company -->
					<h3>BTS - Album Proof</h3>
					<!--  -->
					<p>$441</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/pc8.png" alt="investor">
					</div>
					<!-- Company -->
					<h3>Enhypen - Photocard</h3>
					<!--  -->
					<p>$56</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/txt.png" alt="investor">
					</div>
					<!-- Company -->
					<h3>TXT - Album</h3>
					<!--  -->
					<p>$38</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/lg5.webp" alt="investor">
					</div>
					<!-- Company -->
					<h3>Seventeen - Lighstick</h3>
					<!--  -->
					<p>$22</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-sm-6">
				<div class="block text-center">
					<!-- Investor Image -->
					<div class="image shadow hover-zoom">
						<img class="img-fluid" src="images/keyrings.png" alt="investor">
					</div>
					<!-- Company -->
					<h3>Keyrings - BTS</h3>
					<!--  -->
					<p>$3</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
include 'footer.php';
?>