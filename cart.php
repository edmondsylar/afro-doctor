<?php include_once "includes/head.php";
	//include_once "includes/top.php";
?>
<?php
	$cart = $cur->checkout($_SESSION['email']);
	$price = $cart['total'];
	$products = $cart['products'];

	if(isset($_GET['quantity'])){
		$q = $_GET['quantity'];
		$p = $_GET['product'];
		$pr = $_GET['price'];

		// print_r($q . $p . $pr . $_SESSION['email']);
		$cur->_compute($p, $pr, $q, $_SESSION['email']);
	}
?>

<div class="container margin_120_95">

	<?php if(!empty($products)): ?>
		<?php foreach($products as $product): ?>
			<div class="strip_list wow fadeIn shadow-sm" style="padding-left: 10px;">
				<div class="">
			<div class="row">
				<div class="col-sm">
					<a href="detail-page.html" style="float: left; margin: 10px;"><img src="https://media.istockphoto.com/vectors/medical-pills-icon-medicine-icon-health-tablet-drug-sign-vector-id958428044?k=6&m=958428044&s=170667a&w=0&h=FRSHjmMEaDybn90QnnKXmGJd8LjU4mVrJAdho5GPMPA=" width="75px" height="75px" alt=""></a>
					<span style="margin-left: 100px">
						<small><?php echo $product['product'] ?></small>
						<a href="backend/_remove.php?product=<?php echo $product['product']?>" >
							<i class="icon-trash"></i>
						</a>
					</span>
				</div>
				<div class="col-sm">
					<form action="cart.php">

					Quantity
					<input type="number" value="<?php echo $product['quantity']; ?>" name="quantity" class="form-control" width="50%;">
					<input type="hidden" name="product" value="<?php echo $product['product']; ?>">
					<input type="hidden" name="price" value="<?php echo $product['price']; ?>">
				</div>
				<div class="col-sm">
					<span>
						 <h6>Unit Price</h6>
						 <?php echo $product['price']; ?> shs <br>
					</span>
				</div>
				<div class="col-sm">
					<span>
						<h6>Total</h6>
						<?php echo $product['total'] ?> shs <br>
						<input type="submit" class="btn btn-dark" value="Update">
						</form>
					</span>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
<?php endif; ?>
<?php if($products->num_rows == 0): ?>
	<div class="strip_list wow fadeIn shadow-sm" style="padding-left: 10px;">
			<div class="containder center">
				Your cart is empty
			</div>
	</div>
<?php endif; ?>

	<div class="float-md-right" style="text-align: right;">
		<span>Total: &nbsp; </span><strong><?php echo $cart['total'];?> shs</strong><br>
		<small>Local Deliveries not included yet <br> Shipping and custom fees not included either </small>
			<form method="post" style="margin:0px" action="https://payments.yo.co.ug/webexpress/">
				<input type="submit" class="btn btn-warning" name="submit" value="Make Payment" />
				<input type="hidden" name="bid" value="219" />
				<input type="hidden" name="currency" value="UGX" />
				<input type="hidden" name="amount" id='api_amount' value="<?php echo $cart['total']?>" />
				<input type="hidden" name="narrative" value="Purchasing medicine and or services" />
				<input type="hidden" name="reference" value="Medicine Purchase" />
				<input type="hidden" name="provider_reference_text" value="Payment For drugs" />
				<input type="hidden" name="account" value="100712303477" />
				<input type="hidden" name="return" value="https://hsvug.com/services/pickups.php?order=823490234asjas" />
				<input type="hidden" name="prefilled_payer_email_address" value="" />
				<input type="hidden" name="prefilled_payer_mobile_payment_msisdn" value="" />
				<input type="hidden" name="prefilled_payer_names" value="" />
				<input type="hidden" name="abort_payment_url" value="" />
			</form>
	</div>
	<br>
</div>
<?php include_once "includes/footer.php"?>
