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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
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
        <li class="nav-item @@about active">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item @@product">
          <a class="nav-link" href="view_produk.php">Product</a>
        </li>
        <li class="nav-item @@product">
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

<div class="scroll-top-to">
  <i class="ti-angle-up"></i>
</div>


<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>About</h1>
				<!-- Page Description -->
				<p>With the K-Town Kwangya Hybe app, K-pop fans can enjoy a more comprehensive and efficient shopping experience</p>
				<hr>
			</div>
		</div>
	</div>
</section>

<section class="section career-featured pt-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<!-- written-content -->
					<div class="content">
						<!-- Career heading -->
						<h2>What is K-TOWN?</h2>
						<!-- Career Description -->
						<p>K-Town Kwangya Hybe is a K-pop store that provides various K-pop products to meet the needs of enthusiastic fans. In the era of rapid K-pop popularity worldwide, K-Town Kwangya Hybe is here as a solution to make it easier for fans to access and purchase a wide range of K-pop items.</p>
					</div>
					<!-- Promo Video -->
					<div class="video">
						<!-- Video Thumb -->
						<video controls style="width:600px;">
							<source src="assets/video/smtown.mp4" type="video/webm" />
						</video>
						<!-- Video Button -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="gallery">
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			<div class="col-md-4">
				<div class="image">
					<img data-fancybox="gallery" href="images/smtown2.jpg" class="img-fluid" src="images/smtown2.jpg" alt="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="image">
					<img data-fancybox="gallery" href="images/smtown5.jpg" class="img-fluid" src="images/smtown5.jpg" alt="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="image">
					<img data-fancybox="gallery" href="images/smtown3.jpg" class="img-fluid" src="images/smtown3.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="company-fun-facts section">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2>K-TOWN KWANGYA HYBE</h2>
			</div>
		</div>
		<div class="row">		
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-timer"></i>
					<h3>--1--</h3>
					<p>One of the key features of K-Town Kwangya Hybe is the album release notifications.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-filter"></i>
					<h3>--2--</h3>
					<p>K-Town Kwangya Hybe also offers exclusive special offers to app users.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-game"></i>
					<h3>--3--</h3>
					<p>K-Town Kwangya Hybe serves as a hub for interaction within the K-pop fan community.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-hummer"></i>
					<h3>--4--</h3>
					<p>K-Town Kwangya Hybe sees the exciting business potential in the rapidly growing K-pop industry</p>
				</div>
			</div>
		</div>
	</div>
</section>

 <?php 
	include 'footer.php';
 ?>