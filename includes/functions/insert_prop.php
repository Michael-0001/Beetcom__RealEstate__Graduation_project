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
include('model.class.php');

if(isset($_SESSION['id'])){
    if(isset($_POST['price'])){
        $user = new users();
        $user_data = $user->findbyid($_SESSION['id']);
        $prop = new properties();
        $prop_data = $prop->findAllby("owner_id", $_SESSION['id']);
        $prop_owned = count($prop_data);
// =============================== Define Limits =====
        if($user_data['accountType'] == 0){
            $limit = 2;
        }elseif($user_data['accountType'] == 1){
            $limit = 1000;
        }elseif($user_data['accountType'] == 2){
            $limit = 1000;
        }


        $id = $_SESSION['id'];
        $propType = $_POST['prop_type'];
        $title = $_POST['title'];
        $deliveryType = $_POST['delivery_type'];
        $propType = $_POST['prop_type'];
        $location = $_POST['address'];
        $bedroom = $_POST['bedroom'];
        $bathroom = $_POST['bathroom'];
        $livingroom = $_POST['livingroom'];
        $kitchen = $_POST['kitchen'];
        $area = $_POST['area'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $isPaid = $user_data['accountType'] ;
        

    if($prop_owned < $limit){// Insert property
        $stmt = $conn->prepare("INSERT INTO properties(owner_id, title, prop_type, bedrooms, bathrooms, kitchen, livingrooms, area, price, location, description, delivery_type, isPaid)VALUES('$id','$title','$propType','$bedroom','$bathroom','$kitchen','$livingroom','$area','$price','$location','$description','$deliveryType', '$isPaid')");
        $stmt->execute();
        echo '<div class="alert alert-success" role="alert"><h1>Your Property is Added successfully</h1></div>';
        header("refresh:5;../../my_prop.php");

    }else{// Say sorry 
    
        echo '<div class="card-body"> <div class="alert alert-warning" role="alert"><h2>Sorry but you exceed the Limit of adding properties.</h2>      </div></div>';
        echo '<div class="card-body"> <div class="alert alert-warning" role="alert">      <h3>You can <a href="../../my_prop.php">Delete</a> some of your Properties </h3>         </div></div>';
        echo '<div class="card-body"> <div class="alert alert-warning" role="alert">      <h1>OR</h1>         </div></div>';
        echo '<div class="card-body"> <div class="alert alert-warning" role="alert">      <h3><a href="../../ads.php">Upgrade Your Account</a> and Choose one of our Packages According to your needs....         </h3></div></div>';
    
    
    }
    

    
    // header("refresh:;../../my_prop.php");




    }else{
        header("refresh:4;../../index.php");
        echo "t3";
    }
}else{
    header("refresh:5;../../index.php");
    echo "t4";

}