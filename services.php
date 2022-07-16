<?php 
include('includes/functions/model.class.php');
$prop = new properties();
$data = $prop->all();

$interst = new interests();
if( isset( $_POST['liked'] ) ){
  $prop_id = $_POST['prop_id'];
  $interst->enterFav($prop_id , $_SESSION['id']);
}
include("includes/template/header.php");
$page_title = 'BeetCom';
?>

<?php
include("includes/template/nav.php");
?>
	<!-- Slider main container -->
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('../beetcom/layout/img/lin-leyu-cIRFLobYPkY-unsplash.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
            <h1 class="mb-3 bread">Services</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section" id="services-sec">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <h2 class="mb-2">Choose Our Services</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="">$</span></div>
              <div class="media-body py-md-4">
              <h3>No Downpayment</h3>
			                <p>No pays in the early stages of purchasing an expensive good or service.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-wallet"></span></div>
              <div class="media-body py-md-4">
              <h3>All Cash Offer</h3>
			                <p>We are working hard to save your money, So we offer you the best place at the suitable price for you.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-file"></span></div>
              <div class="media-body py-md-4">
              <h3>Experts in Your Corner</h3>
			                <p>Experience is our name. We have stuffed experts to help you to own your dreamed place</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-locked"></span></div>
              <div class="media-body py-md-4">
              <h3>Locked in Pricing</h3>
			                <p>We will use if you ask us and we agree to establish (“Lock-In”).</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>




<!--------------------------   FILTER-->

<!--------------------------   Filter -->
<div id="check">

</div>


<!----------------------------------------------------------------------------------- Start Property -->







</div>
<!-- ----------------------------------------------------------------------------------Premium Section -->
---------------------------------------------------- -->


<?php
include("includes/template/footer.php");
// if(empty($_SESSION['email'])){ // not previously logged in
?>
