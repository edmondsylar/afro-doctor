<?php 
    $search = $_GET['search'];

    // do the actual search here
    $drugs = $cur->search_drug($_GET['search']);
	$services = $cur->search_service($_GET['search']);

    $_SESSION['url'] =  $_SERVER['REQUEST_URI'];

?>
<div id="results">
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h4><strong>Showing results for</strong> <?php echo $search?></h4>
					</div>
					<div class="col-md-6">
						<form method="POST" action="backend/search.php" class="search_bar_list">
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
							<label for="all">All</label>
							<input disabled type="radio" id="doctors" name="type_patient" value="doctors">
							<label disabled for="doctors">Doctors</label>
							<input  disabled type="radio" id="clinics" name="type_patient" value="clinics">
							<label disabled for="clinics">Clinics</label>
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