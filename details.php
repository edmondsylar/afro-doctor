<?php
include_once "includes/head.php";
$details = $cur->_details_product($_GET['id'], $_GET['type']);
$type = $_GET['type'];
?>
<div id="breadcrumb">
  <div class="container">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li onClick="back()" style="cursor: pointer;"><a>search</a></li>
      <li>Details</li>
    </ul>
  </div>
</div>

<?php if (!empty($details)) : ?>
  <?php foreach ($details as $key => $value) : ?>
    <?php $image = base64_encode($value['image']); ?>

    <div class="container margin_60">
      <div class="row">
        <div class="col-xl-8 col-lg-8">
          <nav id="secondary_nav">
            <div class="container">
              <ul class="clearfix">
                <li><a href="#section_1" class="active">General <?php echo $_GET['type'] ?> info</a></li>
                <li></a></li>
                <li></li>
              </ul>
            </div>
          </nav>
          <div id="section_1">
            <div class="box_general_3">
              <div class="profile">
                <div class="row">
                  <div class="col-lg-5 col-md-4">
                    <figure>
                      <img src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" class="img-fluid">
                    </figure>
                  </div>
                  <div class="col-lg-7 col-md-8">
                    <h1><?php echo $value['title']; ?></h1>

                    <ul class="contacts">
                      <li>
                        <h6>Address</h6>
                        <?php echo $value['address']; ?>

                      </li>
                      <li>
                        <h6>Phone</h6>
                        None Listed
                      </li>
                    </ul>
                    <?php if ($type == 'drug') : ?>
                      <ul class="">
                        <li class="btn btn-sm">
                          <strong> shs | <?php echo $value['price']; ?></strong>
                        </li>
                        <li>
                           <?php if(in_array($value['title'], $cart)){?>
                              <form action="backend/remove.php" method="POST" style="float: right;">
                                <input type="hidden" name="product" value="<?php echo $value['title'] ?>">
                                <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
                                <input type="submit" class="btn btn-sm btn-dark" value="Remove"/>
                              </form>
                              <?php }else{?>
                                <form action="backend/add.php" method="POST" style="float: right;">
                                <input type="hidden" name="product" value="<?php echo $value['title'] ?>">
                                <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
                                <input type="submit" class="btn btn-sm btn-dark" value="Add to Cart"/>
                              </form>
                            <?php }?>
                        </li>
                      </ul>
                    <?php endif; ?>

                    
                    <?php if ($type == 'service') : ?>
                      <ul class="">
                        <li>
                           <?php if(in_array($value['title'], $cart)){?>
                              <form action="backend/remove.php" method="POST" style="float: right;">
                                <input type="hidden" name="product" value="<?php echo $value['title'] ?>">
                                <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
                                <input type="submit" class="btn btn-sm btn-dark" value="Remove"/>
                              </form>
                              <?php }else{?>
                                <form action="backend/add.php" method="POST" style="float: right;">
                                <input type="hidden" name="product" value="<?php echo $value['title'] ?>">
                                <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
                                <input type="submit" class="btn btn-sm btn-dark" value="Add to Cart"/>
                              </form>
                            <?php }?>
                        </li>
                      </ul>
                    <?php endif; ?>


                  </div>
                </div>
              </div>

              <hr>
              <!-- /profile -->
              <div class="indent_title_in">
                <i class="pe-7s-user"></i>
                <h3>Professional statement</h3>
                <p>General <?php echo $_GET['type'] ?> Description</p>
              </div>
              <div class="wrapper_indent">
                <p>
                  <?php echo $value['description']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <aside class="col-xl-4 col-lg-4" id="sidebar">
          <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://maps.google.com/maps?q=<?php echo $value['address']; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </aside>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<?php include_once "includes/footer.php"; ?>

<script>
    function back(){
        window.history.back();
    }
</script>