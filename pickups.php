<?php
  include "includes/head.php";
  $locs = $cur->pickups();
 ?>


<div class="container-fluid full-height" style="margin-top: -4%;">
    <div class="row row-height">
      <div class="col-lg-5 content-left" style="height: 100%;">
        <form>
          <div class="search_bar_wrapper">
            <div class="search_bar_list">
              <input type="text" class="form-control" placeholder="Ex. kampala">
              <input type="submit" value="Search">
            </div>
          </div>
          <div class="filters_listing map_listing">
            <ul class="clearfix">
              <li>
                <h6>Type</h6>
                <div class="switch-field">
                  <input type="radio" id="all" name="type_patient" value="all" checked>
                  <label for="all">All</label>
                  <input type="radio" id="doctors" name="type_patient" value="doctors">
                  <label for="doctors">Doctors</label>
                  <input type="radio" id="clinics" name="type_patient" value="clinics">
                  <label for="clinics">Clinics</label>
                </div>
              </li>
              <li>
                <h6>Layout</h6>
                <div class="layout_view">
                  <a href="grid-list.html"><i class="icon-th"></i></a>
                  <a href="list.html"><i class="icon-th-list"></i></a>
                  <a href="#0" class="active"><i class="icon-map-1"></i></a>
                </div>
              </li>
              <li>
                <h6>Sort by</h6>

              </li>
            </ul>
          </div>
          <!-- /filters -->
        </form>


        <?php if (!empty($locs)): ?>
          <?php foreach ($locs as $key => $value): ?>
            <?php $image = base64_encode($value['image']); ?>
            <div class="strip_list">
              <a href="#0" class="wish_bt"></a>
              <figure>
                <a href="detail-page.html"><img src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""></a>
              </figure>
              <small><?php echo $value['number'] ?></small>
              <h3><?php echo $value['location'] ?></h3>
              <p><?php echo $value['directions'] ?></p>


              <ul>

                <li><a href="#0">AfroDoctor</a></li>
                <li><a href="pickups.php?location=<?php echo $value['location'];?>">view On Map</a></li>
              </ul>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

        <!-- <p class="text-center add_top_30"><a href="#0"><strong>Load more</strong></a></p> -->
      </div>
      <!-- /content-left-->

      <div class="col-lg-7 map-right">
        <div id="map_listing"></div>
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
          <iframe src="https://maps.google.com/maps?q=<?php if (isset($_GET['location'])) {
            echo $_GET['location'];
          } else {echo 'uganda';}?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- map-->
      </div>
      <!-- /map-right-->

    </div>
    <!-- /row-->
  </div>

<?php include_once "includes/footer.php"; ?>
