<?php 
	include 'header.php';
 ?>
<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">

<form action="proses/register.php" method="POST">
<section class="user-login section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block">
					<!-- Image -->
					<div class="image align-self-center"><img class="img-fluid" src="images/login.png"></div>
					<!-- Content -->
					<div class="content text-center">
						<div class="logo">
							<a href="index.php"><img src="images/ktown.png" alt=""></a>
						</div>
						<div class="title-text">
							<h3>Sign Up to To Your Account</h3>
						</div>
						<form action="#">
							<!-- Username -->

							<input class="form-control main" type="text" placeholder="Nama" name="nama_pembeli" required>
							<input class="form-control main" type="text" placeholder="Email" name="email_pembeli" required>
							<input class="form-control main" type="text" placeholder="Username" name="username_pembeli" required>
							<!-- Password -->
							<input class="form-control main" type="text" placeholder="No Telp" name="no_telp_pembeli" required>
							<input class="form-control main" type="password" placeholder="Password" name="password_pembeli" required>
							<input class="form-control main" type="password" placeholder="Konfirmasi Password" name="konfirmasi" required>
							<!-- Submit Button -->
							<button type="submit" class="btn btn-main-sm">SIGN UP</a></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>


</html>

 <?php 
	include 'footer.php';
 ?>