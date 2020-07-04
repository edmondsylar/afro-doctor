<?php
include_once "includes/head.php";
include_once "includes/top.php";

?>


<style>
	.custom_btn {
		border: none;
		border-radius: 15px;
		padding: 30;
		color: #E74E84;
		border: 2px solid #E74E84;
		background: white;
		transition: 0.5s;
	}

	.custom_btn:hover {
		background: #E74E84;
		color: white;
		font-weight: bold;

	}
</style>
<div class="container margin_60_35">
	<div class="row">
		<div class="col-lg-7">
			<?php if (!empty($drugs)) : ?>
				<?php foreach ($drugs as $key => $value) : ?>
					<?php $image = base64_encode($value['image']); ?>
					<div class="strip_list wow fadeIn">
						<?php if (in_array($value['title'], $cart)) { ?>

							<form action="backend/remove.php" method="POST" style="float: right;">
								<input type="hidden" name="product" value="<?php echo $value['title'] ?>">
								<input type="hidden" name="price" value="<?php echo $value['price'] ?>">
								<input type="submit" class="btn btn-sm btn-danger" value="Remove" />
							</form>
						<?php } else { ?>
							<form action="backend/add.php" method="POST" style="float: right;">
								<input type="hidden" name="product" value="<?php echo $value['title'] ?>">
								<input type="hidden" name="price" value="<?php echo $value['price'] ?>">
								<input type="submit" class="btn btn-sm btn-success" value="Add to Cart" />
							</form>
						<?php } ?>
						<figure>
							<a href="#0"><img src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""></a>
						</figure>
						<small>Drug</small>
						<h3><?php echo $value['title'] ?></h3>
						<p><?php echo $value['address'] ?></p>
						<h6><?php echo $value['price'] ?></h6>
						<ul>
							<li><a href="cart.php">&nbsp;</a></li> 
							<li><a href="details.php?id=<?php echo $value['id'] ?>&type=drug">More Details</a></li> 
						</ul>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<p>No record matched your search for $_GET['search']</p>
			<?php endif; ?>

			<?php if (!empty($services)) : ?>
				<?php foreach ($services as $key => $value) : ?>
					<?php $image = base64_encode($value['image']); ?>
					<div class="strip_list wow fadeIn">
						<?php if (in_array($value['title'], $cart)) { ?>

							<form action="backend/remove.php" method="POST" style="float: right;">
								<input type="hidden" name="product" value="<?php echo $value['title'] ?>">
								<input type="hidden" name="price" value="<?php echo $value['price'] ?>">
								<input type="submit" class="btn btn-sm btn-danger" value="Remove" />
							</form>
						<?php } else { ?>
							<form action="backend/add.php" method="POST" style="float: right;">
								<input type="hidden" name="product" value="<?php echo $value['title'] ?>">
								<input type="hidden" name="price" value="<?php echo $value['price'] ?>">
								<input type="submit" class="btn btn-sm btn-success" value="Add to Cart" />
							</form>
						<?php } ?>
						<figure>
							<a href="detail-page.html"><img src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""></a>
						</figure>
						<small>Service</small>
						<h3><?php echo $value['title'] ?></h3>
						<p><?php echo $value['address'] ?></p>
						<h6>View details about service</h6>
						<ul>
							<li><a href="#0" onclick="onHtmlClick('Doctors', 1)" class="btn_listing">&nbsp;</a></li>
							<li><a href="details.php?id=<?php echo $value['id'] ?>&type=service">More Details</a></li>
						</ul>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<p>No record matched your search for $_GET['search']</p>
			<?php endif; ?>

			<nav aria-label="" class="add_top_20">
				<ul class="pagination pagination-sm">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>
			<!-- /pagination -->
		</div>
		<!-- /col -->

		<aside class="col-xl-4 col-lg-4" id="sidebar">
			<!-- <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
						<iframe src="https://maps.google.com/maps?q=uganda&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div> -->
		</aside>
		<!-- /aside -->

	</div>
	<!-- /row -->
</div>


<?php include_once "includes/footer.php"; ?>