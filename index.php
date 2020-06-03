<?php 
	include_once "includes/head.php";
?>
		<div class="hero_home version_1">
			<div class="content">
				<h3>Search here</h3>
				<p>
					Search for a drug or service.
				</p>
				<form method="post" action="backend/search.php">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" name="search" class=" search-query" placeholder="Ex. Name, Specialization ....">
							<input type="submit" class="btn_search" value="Search">
						</div>
						<ul>
							<li>
								<input type="radio" id="all" name="radio_search" value="all" checked>
								<label for="all">All</label>
							</li>
							<li>
								<input type="radio" id="doctor" name="radio_search" value="doctor">
								<label for="doctor">Doctor</label>
							</li>
							<li>
								<input type="radio" id="clinic" name="radio_search" value="clinic">
								<label for="clinic">Services</label>
							</li>
						</ul>
					</div>
				</form>
			</div>
		</div>
<?php include_once "includes/footer.php"; ?>