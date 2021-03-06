<?php 
$page_title = 'BeetCom(My Properties)';
include("includes/template/myaccount_header.php"); 
if(isset($_SESSION['email']) ) {
// echo"<pre>";
// print_r($_SESSION);
// echo"</pre>";
$prop = new properties();
$prop_data = $prop->findAllby('owner_id',$_SESSION['id']);
?>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="logo-img"><img src="../beetcom/layout/img/logo.png" width="50px"></span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">eetcom</span>
            </a>

              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>

            <div class="menu-inner-shadow"></div>
              <ul class="menu-inner py-1">
                  <!-- Forms -->
              <li class="menu-item active open">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-detail"></i>
                    <div data-i18n="Form Elements">My Account</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="personal.php" class="menu-link">
                        <div data-i18n="Input groups">My Information</div>
                      </a>
                    </li>
                    <li class="menu-item active">
                      <a href="my_prop.php" class="menu-link">
                        <div data-i18n="Input groups">My Properties</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="add-prop.php" class="menu-link">
                        <div data-i18n="Input groups">Add Properties</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="fav.php" class="menu-link">
                        <div data-i18n="Input groups">My Favourite</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ads.php" class="menu-link">
                        <div data-i18n="Input groups">Ads</div>
                      </a>
                    </li>
  <?php
  $ads = new side_ads();
  $user_id = $_SESSION['id'];
  $stmt = $conn->prepare("SELECT * FROM side_ads WHERE user_id = $user_id");
  $stmt->execute();
  $count = $count=$stmt->rowCount();
  if($count == 1){

  ?>
                    <li class="menu-item ">
                      <a href="myprop_side_ads.php" class="menu-link">
                        <div data-i18n="Basic Inputs">Side Banner Ads</div>
                      </a>
                    </li>

  <?php
  }
  ?>
                  <li class="menu-item">
                      <a href="payment.php" class="menu-link">
                        <div data-i18n="Basic Inputs">Payment</div>
                      </a>
                    </li>

                  </ul>
                </li>
              </a>
          </li>
        </ul>
      </aside>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->
        <?php
        include("includes/template/myaccount_navbar.php")
        ?>

          <!-- / Navbar -->
           <!-- Content wrapper -->
           <div class="content-wrapper">
            <!-- Content -->
            <div class="continer">
                <div class="row mt-4">
                    <h6 class="add-head text-center">Properties</h6>
<!----------------------------------------------------------------------Start My Properties  -->
<?php
$user = new users();
$user_data = $user->findby('id', $_SESSION['id']);
if($user_data['accountType'] > 0){
  if($user_data['accountType'] == 1){
      echo "<h2>Account Type: GOLD</h2>";
      echo "<h2>Valid Untill :" . $user_data['paid_acc_end_date'] . "</h2>";
  }
  if($user_data['accountType'] == 2){
    echo "<h2>Account Type: Platinium</h2>";
    echo "<h2>Valid Untill :" . $user_data['paid_acc_end_date'] . "</h2>";
}
}

?>


        <?php
        
        for($i=0; $i < count($prop_data) ;$i++){
        ?>
                    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                              <div class="property-entry h-100 mb-3">
                                
                                <div class="p-4 property-body">
                                  
                                  <h2 class="property-title"><a class="address" href="prop_details.php?id=<?php echo $prop_data[$i]['id'] ?>"><?php echo $prop_data[$i]['title'] ?></a></h2>
                                  <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $prop_data[$i]['location'] ?></span>
                                  <strong class="property-price text-primary mb-3 d-block text-success"><?php echo number_format($prop_data[$i]['price'] )?></strong>
                                  <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                      <span class="property-specs prop-sp">Beds</span>
                                      <span class="property-specs-number"><?php echo $prop_data[$i]['bedrooms'] ?></span>
                                      
                                    </li>
                                    <li>
                                      <span class="property-specs prop-sp">Baths</span>
                                      <span class="property-specs-number"><?php echo $prop_data[$i]['bathrooms'] ?></span>
                                      
                                    </li>
                                    <li>
                                      <span class="property-specs prop-sp">Meter</span>
                                      <span class="property-specs-number"><?php echo $prop_data[$i]['area'] ?></span>
                                      
                                    </li>
                                  </ul>
                                                                                              <!-------------------------------ADD Property Images  ---------->
                          <label>Upload Your Property Images</label>
                          <form action="includes/functions/insert_prop_imgs.php"method="post" enctype="multipart/form-data">                         
                              <div class="form-group mt-3 d-flex justify-content-center">
                                <input type="file" class="form-control" id="formFileMultiple" name="images[]" multiple required>
                                <input type="hidden" name="prop_id" value="<?php echo $prop_data[$i]['id'] ?>">
                                <input type="submit" name="submit" class="btn btn-primary" value="Upload Images">
                              
                              </div>
                          </form>
                          <br>

                          <form method="post" action="includes/functions/delete_prop.php">
                          <input type="hidden" name="prop_id" value="<?php echo $prop_data[$i]['id'] ?>">
                          <input type="submit" name="del" class="btn btn-danger" value="DELETE">  
                          </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>

<?php
        }
?>
                    
<!----------------------------------------------------------------------End My Properties  -->

                </div>
                
            </div>
            </div>
            
            </div>
                
                </div>
              </div>









<?php include("includes/template/myaccount_footer.php"); 

}else{
  header("refresh:0;index.php");
}
?>