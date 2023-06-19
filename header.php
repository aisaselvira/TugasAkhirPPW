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

<!-- Bootstrap CSS -->
<!-- Style -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script  src="js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
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
        <li class="nav-item @@home active">
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
            <li><a class="dropdown-item active" href="user_login.php">Login</a></li>
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

<script src="plugins/bootstrap/bootstrap.min.js"></script>