<?php 
      $type = 'All';
      
      include_once "includes/head.php";
      include_once "includes/header.php";
      include_once "../backend/config.php";
      $cur = new AppInit();
      $data = $cur->_admin_data();
?>

<?php
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("Location: index.php");
  }
  
?>

  <div class="container margin_120_95">
			<div class="main_title">
				<h2>Services</h2>
				<p>All recently Added Services</p>
			</div>
			<div class="row">
			<?php if (!empty($data['services'])) : ?>
          <?php foreach ($data['services'] as $key => $value) : ?>
            <?php $image = base64_encode($value['image']); ?>
            <div class="col-lg-3 col-md-6">
              <a href="details.php?id=<?php echo $value['id'];?>&type=service" class="box_cat_home">
                <i class="icon-info-4"></i>
                <!-- <img src="img/icon_cat_8.svg" width="60" height="60" alt=""> -->
                <img  width="60" height="60" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt="">
                <h3><?php echo $value['title']?></h3>
                <ul class="clearfix">
                  <li><strong>Delete</strong></li>
                  <li><strong>Edit</strong></li>
                </ul>
              </a>
            </div>
          <?php endforeach; ?>
				<?php else : ?>
					<p>No record matched your search for $_GET['search']</p>
				<?php endif; ?>

			</div>
			<!-- /row -->
    
			<div class="main_title">
				<h2>Drugs</h2>
				<p>All recently Added Drugs</p>
			</div>
			<div class="row">
			<?php if (!empty($data['drugs'])) : ?>
          <?php foreach ($data['drugs'] as $key => $value) : ?>
            <?php $image = base64_encode($value['image']); ?>
            <div class="col-lg-3 col-md-6">
              <a href="details.php?id=<?php echo $value['id'];?>&type=drug" class="box_cat_home">
                <i class="icon-info-4"></i>
                <img  width="60" height="60" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt="">
                <h3><?php echo $value['title']?></h3>
                <ul class="clearfix">
                  <li><strong>Delete</strong></li>
                  <li><strong>Edit</strong></li>
                </ul>
              </a>
            </div>
          <?php endforeach; ?>
				<?php else : ?>
					<p>No record matched your search for $_GET['search']</p>
				<?php endif; ?>

			</div>
			<!-- /row -->
		</div>

<?php include_once "includes/foot.php"; ?>
