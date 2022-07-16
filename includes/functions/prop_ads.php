<!DOCTYPE html>
<html>
    <head>
                    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

                <!-- Fonts -->
                <link rel="preconnect" href="https://fonts.googleapis.com" />
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                <link
                href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
                rel="stylesheet"
                />

                <!-- Icons. Uncomment required icon fonts -->
                <link rel="stylesheet" href="../../layout/assets/vendor/fonts/boxicons.css" />

                <!-- Core CSS -->
                <link rel="stylesheet" href="../../layout/assets/vendor/css/core.css" class="template-customizer-core-css" />
                <link rel="stylesheet" href="../../layout/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
                <link rel="stylesheet" href="../../layout/assets/css/demo.css" />

                <!-- Vendors CSS -->
                <link rel="stylesheet" href="../../layout/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    </head>
</html>

<?php
session_start();
if(isset($_SESSION['id'])){
include('model.class.php');
$ads = new side_ads();
$ads_data = $ads->all();
$user = new users();
$user_data = $user->findby('id', $_SESSION['id']);

    if(isset($_POST['pkg_type'])){
    $pkg = $_POST['pkg_type'];
        if($pkg == 1){
            $price = 500;
            $new_acc_type = 1;
        }elseif($pkg == 2){
            $price = 1000;
            $new_acc_type = 2;

        }

        
        
            
        $end_date = date("Y-m-d", strtotime(date('Y-m-d')." + 1 months"));

        $credit = $user_data['credit'];


        if($credit > $price){// Cover
                                        // update account type 

            $rem_credit = ($user_data['credit']-$price);
            $user_id = $user_data['id'];

            
    if($user_data['accountType']  == 0){
            $stmt = $conn->prepare("UPDATE users SET credit = $rem_credit WHERE id = $user_id") ; 
            $query = "UPDATE users SET paid_acc_end_date = '$end_date' WHERE id = $user_id";
            $stmt1 = $conn->prepare($query) ;
            $stmt2 = $conn->prepare("UPDATE users SET accountType = $new_acc_type WHERE id = $user_id") ; 


            $stmt->execute();
            $stmt1->execute();
            $stmt2->execute();

    }

            header("refresh:0;url=../../my_prop.php");
        }else{
            echo '<div class="alert alert-danger" role="alert"><h1>Sorry .....BUT Your Credit doesn\'t cover tha package cost </h1></div>';
            
            header("refresh:5;url=../../payment.php");
        }

        

    }
}
// ?>

