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
        <li class="nav-item @@product">
          <a class="nav-link" href="view_produk.php">Product</a>
        </li>
        <li class="nav-item @@product">
          <a class="nav-link" href="best-product.php">Best Product</a>
        </li>
        <li class="nav-item @@contact active">
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

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">

<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Drop us a mail</h2>
			</div>
			<div class="col-12">
				<form action="">
					<div class="row">
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Name" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="email" placeholder="Your Email Address" required>
						</div>
						<!-- subject -->
						<div class="col-md-12 mb-2">
							<input class="form-control main" type="text" placeholder="Subject" required>
						</div>
						<!-- Message -->
						<div class="col-md-12 mb-2">
							<textarea class="form-control main" name="message" rows="10" placeholder="Your Message"></textarea>
						</div>
						<!-- Submit Button -->
						<div class="col-12 text-right">
							<button class="btn btn-main-md">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<h1 style="text-align:center;">Contact Us</h1>
<section class="company-fun-facts section">
	<div class="container">
		<div class="row">		
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<div class="icon">
						<i class="ti-map-alt"></i>
					</div>
					<h3>Email</h3>
					<p>Reach out to us at K-Town for any inquiries or assistance!</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<div class="icon">
						<i class="ti-mobile"></i>
					</div>
					<h3>Address</h3>
					<p>Seoul, South Korea</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<div class="icon">
						<i class="ti-mobile"></i>
					</div>
					<h3>Social Media</h3>
					<p>ktown-kwangya-hybe.com</p>
				</div>
			</div>
            <div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<div class="icon">
						<i class="ti-map-alt"></i>
					</div>
					<h3>Telp</h3>
					<p>+628727706542</p>
				</div>
			</div>
		</div>
	</div>
</section>

</body>

<?php 
include 'footer.php';
?>