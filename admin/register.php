<?php include_once "includes/head.php" ?>

	<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login">
					<h1>Register Free</h1>
					<div class="box_form">
						<form method="POST" action="../backend/customer.php">
							<div class="form-group">
								<input type="text" name="fullname" class="form-control" required placeholder="Enter full name">
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control" required placeholder="Email address ">
              </div>

							<div class="form-group">
								<input type="text" name="phone" class="form-control" required placeholder="Enter Phone Number">
							</div>

							<div class="form-group">
								<input type="text" name="address" class="form-control" required placeholder="Enter current Address">
							</div>

							<div class="form-group">
								<input type="password" name="password" class="form-control" required placeholder="Your password">
							</div>

							<div class="form-group text-center add_top_20">
								<input class="btn_1 medium" type="submit" value="Register">
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

	<?php include_once "includes/foot.php" ;?>
