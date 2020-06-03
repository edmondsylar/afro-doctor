<?php 
	include_once "includes/head.php";
	include_once "includes/top.php";
	$fetch = $cur->checkout($_SESSION['email']);
	$pre_cart = $fetch['products'];
	
	$cart = array();
	foreach($pre_cart as $product){
		array_push($cart, $product['product']);
	}
?>


<style>
	.custom_btn{
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
								<?php if(in_array($value['title'], $cart)){?>

								<form action="backend/remove.php" method="POST" style="float: right;">
									<input type="hidden" name="product" value="<?php echo $value['title'] ?>">
									<input type="hidden" name="price" value="<?php echo $value['price'] ?>">
									<input type="submit" class="custom_btn" value="Remove"/>
								</form>
								<?php }else{?>
									<form action="backend/add.php" method="POST" style="float: right;">
									<input type="hidden" name="product" value="<?php echo $value['title'] ?>">
									<input type="hidden" name="price" value="<?php echo $value['price'] ?>">
									<input type="submit" class="custom_btn" value="Add to Cart"/>
								</form>
								<?php }?>
								<figure>
									<a href="#0"><img src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""></a>
								</figure>
								<small>Drug</small>
								 <h3><?php echo $value['title'] ?></h3>
            					<p><?php echo $value['address'] ?></p>
								<h6><?php echo $value['price'] ?></h6>
								<ul>
									<li><a href="#0" onclick="onHtmlClick('Doctors', 1)" class="btn_listing">View on Map</a></li>
									<li><a href="#0">More Details</a></li>
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
								<form action="backend/add.php" method="POST" style="float: right;">
									<input type="hidden" name="product" value="<?php echo $value['title'] ?>">
									<input type="hidden" name="price" value="<?php echo $value['price'] ?>">
									<input type="submit" value="Add to cart"/>
								</form>
								<figure>
									<a href="detail-page.html"><img src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""></a>
								</figure>
								<small>Service</small>
								 <h3><?php echo $value['title'] ?></h3>
            					<p><?php echo $value['address'] ?></p>
								<h6>View details about service</h6>
								<ul>
									<li><a href="#0" onclick="onHtmlClick('Doctors', 1)" class="btn_listing">View on Map</a></li>
									<li><a href="detail-page.html">More Details</a></li>
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
				
				<aside class="col-lg-5" id="sidebar">
					<div id="map_listing" class="normal_list">
					</div>
				</aside>
				<!-- /aside -->
				
			</div>
			<!-- /row -->
		</div>


<?php include_once "includes/footer.php"; ?>
