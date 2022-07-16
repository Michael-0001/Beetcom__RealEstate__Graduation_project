<?php
session_start();    


$page_title = 'Edit Page';
include("includes/functions/functions.php");
include("includes/template/header.php");
include("includes/functions/model.class.php");


if(isset($_SESSION) && isset($_GET['ads_id']) && !empty($_GET['ads_id'])){
    // model included
    $ads = new side_ads();
    $ads_data = $ads->findbyid($_GET['ads_id']);
    //display user data in form 
?>
    <!DOCTYPE html>

<!-- beautify ignore:start -->
<html
lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="assets/"
data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title> Dashboard (Users)</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="layout/img/logo.png" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

    <!-- Menu -->

    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
            <img style="width:50px" src="layout/img/logo.png">


            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
            </li>
            
                        <!-- Controls -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Controls</span></li>
            <!-- Users -->
            <li class="menu-item">
            <a
                href="users.php"
                class="menu-link"
            >
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Users">Users</div>
            </a>
            </li>
            
            <!-- Authentication -->

            <li class="menu-item active">
            <a href="auth.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
            </a>
            </li>
            <!-- Properties -->
            <li class="menu-item">
            <a
                href="properties.php"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Properties</div>
            </a>
            </li>
            <!-- Requests -->
            <li class="menu-item">
            <a
                href="requests.php"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Requests</div>
            </a>
            </li>
            <!-- Payments -->
            <li class="menu-item">
            <a
                href="payments.php"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Payments</div>
            </a>
            </li>

        </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
        <!-- Navbar -->

        <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
        >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                />
                </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online" style="width: 350px;">
                    <img src="../data/images/users/<?php echo $_SESSION['user_img']?>"  alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                            <img src="../data/images/users/<?php echo $_SESSION['user_img']?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php  echo $_SESSION['Fname'] . ' ' . $_SESSION['Sname']?></span>
                            <small class="text-muted">Admin</small>
                        </div>
                        </div>
                    </a>
                    </li>
                  
                    <li>
                    <a class="dropdown-item" href="includes/functions/logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                    </li>
                </ul>
                </li>
                <!--/ User -->
            </ul>
            </div>
        </nav>
        <!-- / Navbar -->
<!--===============================================================================================-->
<!--========================================== Form Start =========================================-->
<!--===============================================================================================-->


<div class="col-md-6">
                    <div class="card mb-4">
                    </div>

                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <h5 class="card-header text-center"> Side Ads</h5>
                            <div class="card-body">
                                
                            
                            
                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">User ID</label>
                                    
                                    <div class="col-md-10">
                                        <?php echo $ads_data['user_id'];?>
                                    </div>
                                </div>
                                
                                
                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">Company Name</label>
                                    
                                    <div class="col-md-10">
                                        <?php echo $ads_data['coName']  ;?>
                                    </div>
                                </div>
                                


                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">Package</label>
                                    
                                    <div class="col-md-10">
                                        <?php echo $ads_data['package'];?>
                                    </div>
                                </div>
                                


                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">End Date </label>
                                    
                                    <div class="col-md-10">
                                        <?php echo $ads_data['end_date']  ;?>
                                    </div>
                                </div>
                                

                                
                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">URL</label>
                                    
                                    <div class="col-md-10">
                                        <?php echo $ads_data['url']  ;?>
                                    </div>
                                </div>
                                

                                
                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">Is Paid</label>
                                    
                                    <div class="col-md-10">
                                        <?php
                                        if($ads_data['isPaid'] == 0){
                                            echo "Not Paid";
                                        }else{
                                            echo "Paid";
                                        }
                                        
                                        
                                        
                                        ;?>
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">Status</label>
                                    
                                    <div class="col-md-10">
                                        <?php 
                                        if($ads_data['status'] == 0){
                                            echo "In Review";

                                        }elseif($ads_data['status'] == 1){
                                            echo "Active";

                                        }
                                        
                                        ;?>
                                    </div>
                                </div>


                                
                                <div class="mb-3 row">
                                    <label for="exampleFormControlReadOnlyInput1" class="col-md-2 col-form-label">Side Ads Image</label>
                                    
                                    <div class="col-md-10">
                                        <img src='../data/images/side_ads/<?php echo $ads_data['ads_img'];?>' style="width:350px" >   
                                    </div>
                                </div>

                                <a href="includes/functions/edit_ads.php?ads_id=<?php echo $ads_data['id']; ?>"> <button>Approve Side Ads</button>
                                


                            





                    </div>
                                
<!--------------------------------------------- Start Edit Banner  -->


                            </div>
                        </div>
                    </div>





                    
                </div>
        
            <!-- / Content ------------------------------------------------------------------------------->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            
            
            </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>


<?php
}else{
    // header('refresh:0;url=index.php');
}

// include('includes/template/footer.php');
?>