<header class="header_sticky">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div id="logo">
          <a href="./home.php" title="Findoctor">AfroDoctor Admin</a> | 
          <a href="../index.php" target="_blank" title="Findoctor"> Users</a>
        </div>
      </div>
      <nav class="col-lg-9 col-6">
        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
        <div class="main-menu">
          <ul>
            <li class="submenu"><a href="home.php" class="show-submenu">Home</a></li>
            <li class="submenu"><a href="../admin/drugs.php">Add Drugs</a></li>
            <li class="submenu"><a href="../admin/services.php">Add Services</a></li>
            <li class="submenu">
              <a href="#0" class="show-submenu">Profile<i class="icon-down-open-mini"></i></a>
              <ul>
                <li><a href="../admin/home.php">User Profile</a></li>
                <li><a href="../backend/logout.php">Logout</a></li>
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
<div id="results">
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h4><strong>Administator</strong></h4>
					</div>
					<div class="col-md-6">
						<form method="POST" action="#0" class="search_bar_list">
							<input type="text" name="search" class="form-control" placeholder="Ex. Specialist, Name, Doctor...">
							<input type="submit" value="Search">
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
        </div>
	<div class="filters_listing">
			<div class="container">
				<ul class="clearfix">
					<li>
						<h6>Type</h6>
						<div class="switch-field">
							<input type="radio" id="all" name="type_patient" value="all" checked>
							<?php if($type):?>
								<label for="all"> <?php echo $type; ?> </label>
							<?php else:?>
								<label for="all">General Purpose</label>
							<?php endif; ?>
								
							<input disabled type="radio" id="doctors" name="type_patient" value="doctors">
						</div>
					</li>
					<li>
						<h6>Layout</h6>
						<div class="layout_view">
							<a href="grid-list.html"><i class="icon-th"></i></a>
							<a href="#0" class="active"><i class="icon-th-list"></i></a>
							<a href="#0"><i class="icon-map-1"></i></a>
						</div>
					</li>
				</ul>
      </div>
  <main>