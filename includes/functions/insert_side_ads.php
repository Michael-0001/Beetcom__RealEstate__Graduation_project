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
include("model.class.php");
$ads = new side_ads();
if(isset($_POST)){

if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];

    $stmt = $conn->prepare("SELECT * FROM side_ads WHERE user_id = '$user_id'");
    $stmt->execute();
    $count = $count=$stmt->rowCount();


        if($count == 0){


        // ============================Fetch personal data from "reg.php"

        $coName  = $_POST['coName']; 
        $package=$_POST["pkg"];
        $url =$_POST["url"];
        if($package == 1){
            $duration = 1;
            $end_date = $end_date = date("Y-m-d", strtotime(date('Y-m-d')." + 1 months"));

        }elseif($package == 2){
            $duration = 4;
    $end_date = $end_date = date("Y-m-d", strtotime(date('Y-m-d')." + 4 months"));

        }elseif($package == 3){
            $duration = 12;
    $end_date = $end_date = date("Y-m-d", strtotime(date('Y-m-d')." + 12 months"));

        }


            // ==================== uploading img script ==========================
            $imgName = $_FILES['bannerImg']['name'];
            $imgType = $_FILES['bannerImg']['type'];
            $imgTmp = $_FILES['bannerImg']['tmp_name'];
            $imgSize = $_FILES['bannerImg']['size'];
            $extension = pathinfo($imgName , PATHINFO_EXTENSION);
            $randNum = rand(0 , 100000);
            $rename = $coName . "_Upload_" . date('ymd') . $randNum;
            $newImgName = $rename . '.' . $extension;
            $uploadOk = 1;
                if($imgSize > 10000000){              // image size check
                    $uploadOk = 2;
                }elseif($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){       // image format check
                    $uploadOk = 3;

                }
            if($uploadOk == 1){
            if(move_uploaded_file($imgTmp , "C:\\xampp\htdocs\beetcom\data\images\side_ads\\" . $newImgName)  ){
                echo "Image Uploaded Successfuly";
            }else{
            
                echo '<div class="card-body"> <div class="alert alert-warning" role="alert"><h2>Can\'s upload such image...Check the size of image and image Extension.</h2>      </div></div>';
                
            
            }
            }
            echo "UploadOk img: " . $uploadOk;



            // ==================== uploading img script ==========================

    // Insert side Ads---------------------------------------------





    // Insert side Ads---------------------------------------------

            // ___________________________________________________________SQL Inserting Query ___________________________
            $stmt = $conn->prepare("INSERT INTO side_ads(user_id,coName, package, duration, url, ads_img, end_date)
            VALUES(?,?,?,?,?,?,?)");
                    $stmt->execute(array(
                        $user_id,
                        $coName,
                        $package,
                        $duration,
                        $url,
                        $newImgName,
                        $end_date
                    ));
                header('refresh:2;url=../../myprop_side_ads.php');

        }else{    // previously create ads 
            
            echo '<div class="card-body"> <div class="alert alert-warning" role="alert"><h2> Sorry but you are already request a Side Ads before. .</h2>      </div></div>';


            header('refresh:2;url=../../index.php');
        }


            // ___________________________________________________________SQL Inserting Query ___________________________
        }else{
            Echo "Create an Account First";
            header('refresh:2;url=../../index.php');
            
        }
    }else{// Empty Data

        echo "Data Not Completed";
        header('refresh:1;url=../../index.php');
    }


