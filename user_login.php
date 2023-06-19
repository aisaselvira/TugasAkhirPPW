<?php 
	include 'header.php';
 ?>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">

<form action="proses/login.php" method="POST">
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
							<h3>Sign in to Your Account</h3>
						</div>
						<form action="">
							<input class="form-control main" type="text" placeholder="Username" name="username_pembeli" required>
							<input class="form-control main" type="password" placeholder="Password" name="password_pembeli" required>
							<button class="btn btn-main-sm" type="submit">Sign in</button>
						</form>
							<div class="new-acount">
								<a href="contact.html">Forget your password?</a>
								<p>Don't Have an account? <a href="register.php"> SIGN UP</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

 <?php 
	include 'footer.php';
 ?>
</body>
</html>
