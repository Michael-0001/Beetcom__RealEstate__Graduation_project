<?php
session_start();
include("model.class.php");
$ads = new side_ads();
if(isset($_POST) && !empty($_POST)){
$user_id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT * FROM side_ads WHERE user_id = $user_id");
$stmt->execute();
$count = $count=$stmt->rowCount();


    if($count == 0){


    // ============================Fetch personal data from "reg.php"
    $coName  = $_POST['coName']; 
    $package=$_POST["pkg"];
    $url =$_POST["url"];
    if($package == 1){
        $duration = 1;
    }elseif($package == 2){
        $duration = 4;
    }elseif($package == 3){
        $duration = 12;
    }


        // ___________________________________________________________SQL Inserting Query ___________________________
        $stmt = $conn->prepare("INSERT INTO side_ads(user_id, package, duration)
        VALUES(?,?,?,?,?,?)");
                $stmt->execute(array(
                    $user_id,
                    $coName,
                    $package,
                    $duration,
                    $url,
                    $newImgName
                ));
            header('refresh:2;url=../../myprop_side_ads.php');

    }else{    // previously create ads 
        echo "<h1> Sorry but you are already request a Side Ads before. </h1>";
        header('refresh:2;url=../../index.php');
    }


        // ___________________________________________________________SQL Inserting Query ___________________________

}else{// Empty Data

    echo "Data Not Completed";
    header('refresh:1;url=../../index.php');
}