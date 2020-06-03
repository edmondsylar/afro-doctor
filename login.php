<?php include_once "includes/prelog.php" ?>

	<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login">
					<h1>Login</h1>
					<div class="box_form">
						<form method="POST" action="backend/login.php">
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Your email address">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Your password">
							</div>
							<a href="#0"><small>Forgot password?</small></a>
							<div class="form-group text-center add_top_20">
								<input class="btn_1 medium" type="submit" value="Login">
							</div>
						</form>
					</div>
					<p class="text-center link_bright">Do not have an account yet? <a href="register.php"><strong>Register now!</strong></a></p>
				</div>
				<!-- /login -->
			</div>
		</div>
	</main>
	<!-- /main -->

	<?php include_once "includes/footer.php" ;?>
