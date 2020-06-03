<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    
	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<h3><a href="index.php" title="Dokta">Dokta</a>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					<ul id="top_access">
						<!-- <li><a href="login.html">Home</a></li>
						<li><a href="register-doctor.html">Cart</a></li> -->
					</ul>
					<div class="main-menu">
						<ul>
							<li class="submenu"><a href="index.php" class="show-submenu">Home</a></li>
							<li class="submenu">
								<a href="#0" class="show-submenu"> <i class="icon-cart"></i> Cart <?php echo $type; ?> <i class="icon-down-open-mini"></i></a>
								<ul>
									<li><a href="cart.php">View Cart</a></li>
									<li><a href="backend/empty_cart.php">Empty Cart</a></li>
								</ul>
                            </li>
                            
							<li class="submenu">
								<a href="#0" class="show-submenu"> Profile<i class="icon-down-open-mini"></i></a>
								<ul>
									<li><a href="#0">Settings </a></li>
									<li><a href="backend/logout.php">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->
	
	<main>