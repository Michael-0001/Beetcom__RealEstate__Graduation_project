<?php 
session_start();
include("includes/functions/functions.php");
include('includes/functions/model.class.php');
if(!empty($_GET['id'])){
$prop_id = $_GET['id'];
$prop = new properties();
$prop_data = $prop->findby('id' ,$prop_id);




if(isset($_SESSION) && !empty($_SESSION)){
$user_id = $_SESSION['id'];



$req = new request();
$stmt_req = $conn->prepare("SELECT * FROM request WHERE prop_id = $prop_id AND user_id = $user_id") ;
        $stmt_req->execute();
        $requests=$stmt_req->fetchAll();
        $is_requested = count($requests);

}

  $images = new prop_imgs();
$img = $images->findAllby("property_id", $prop_id);




$page_title = 'BeetCom';
include("includes/template/header.php");
include("includes/template/nav.php");



// echo"<pre>";
// print_r($_SESSION);
// echo"</pre>";


?>    <div class="site-section site-section-sm prop-detail-style">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="height: 450px;">
                  
                  <div class="carousel-item active">
                    <img src="data/images/properties/<?php echo $img[0]['property_image'] ?>" class="d-block w-100 img-fluid" style="height: 100%;position: relative;top:0" alt="...">
                    </div>
                    <?php for($i=1;$i<count($img);$i++){ ?>
                  
                  <div class="carousel-item">
                    <img src="data/images/properties/<?php echo $img[$i]['property_image'] ?>" class="d-block w-100 img-fluid" style="height:auto;position: relative;top:0" ;alt="...">
                  
                  </div>
                  <?php }?>




                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              </div>
              <div class="bg-white property-body border-bottom border-left border-right">
                <div class="row mb-5">
                  <div class="col-md-6" style="margin-top: 25px;">
                    <strong class="text-success h1 mb-3 price-p"><?php echo number_format($prop_data['price'] ) . " EGP";?></strong>
                  </div>
                  <div class="col-md-6 d-flex justify-content-evenly" style="margin-top: 25px;">
                    <ul class="property-specs-wrap mb-3 mb-lg-0 ">
                    <li>
                      <span class="property-specs"><i class="fa-solid fa-bed" style="font-size: 23px;"></i></span>
                      <span class="property-specs-number d-flex justify-content-center" style="font-size: 20px;"><?php echo $prop_data['bedrooms'] ?></span>
                      
                    </li>
                    <li>
                      <span class="property-specs"><i class="fa-solid fa-bath" style="font-size: 23px;"></i></span>
                      <span class="property-specs-number d-flex justify-content-center" style="font-size: 20px;"><?php echo $prop_data['bathrooms'] ?></span>
                      
                    </li>
                    <li>
                      <span class="property-specs"><i class="fa-solid fa-arrows-left-right" style="font-size: 23px;margin-left:5px;"></i></span>
                      <span class="property-specs-number d-flex justify-content-center" style="font-size: 20px;"><?php echo $prop_data['area'] ?></span>
                      
                    </li>
                  </ul>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                    <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                    <strong class="d-block"><?php echo $prop_data['prop_type'] ?></strong>
                  </div>
                  <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                    <span class="d-inline-block text-black mb-0 caption-text">From</span>
                    <strong class="d-block"><?php echo $prop_data['dateOfAddition'] ?></strong>
                  </div>
                  <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                    <span class="d-inline-block text-black mb-0 caption-text">Price/m</span>
                    <strong class="d-block"><?php echo number_format( (intval( $prop_data['price']) /intval($prop_data['area'])  ) );  ?></strong>
                  </div>


                  <!------------------------------------------------------------------- Request Button  -->
<?php
if(isset($_SESSION) && !empty($_SESSION)){

          if($is_requested > 0){
            ?>
            <form action="includes/functions/make_request.php" method="post" class="form-contact-agent mb-3">
                          
            <div class="form-group mt-3 d-flex justify-content-center">
              <input type="hidden" name="prop_id" value="<?php echo $prop_data['id'] ?>">
              <input type="hidden" name="do" value="cancel">

              <input type="submit" id="phone" class="btn btn-primary" value="Cancel Request">
            </div>
          </form>
          <?php

          }else{?>


                            <form action="includes/functions/make_request.php" method="post" class="form-contact-agent mb-3">
                          
                            <div class="form-group mt-3 d-flex justify-content-center">
                              <input type="hidden" name="prop_id" value="<?php echo $prop_data['id'] ?>">
                              <input type="submit" id="phone" class="btn btn-primary" value="Request">
                            </div>
                          </form>
          <?php
          }
}
?>


                  <!------------------------------------------------------------------- Request Button  -->



                </div>
                <h2 class="h4 text-black text-center">More Info</h2>
                <h4 class="text-center"> <?php echo $prop_data['title'] ?>  </h4>
                <p><?php echo $prop_data['description'] ?> </p>
                <p>Location : <?php echo $prop_data['location'] ?> </p>

              
              </div>
            </div>
          </div>
        </div>
      </div>





      <?php 
include("includes/template/footer.php"); 
}else{
  header("refresh:0;index.php");
}
?>