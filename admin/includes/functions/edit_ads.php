<?php
session_start();
include("model.class.php");
if(isset($_SESSION)){
    if(isset($_GET)){
        $ads_id = $_GET['ads_id'];
        $stmt = $conn->prepare("UPDATE side_ads SET approved = 1 WHERE id = $ads_id");
        $stmt->execute();    
        echo "Update Succes";
        header("refresh:0;url=../../side_ads.php");

    }
}else{
    header("refresh:0;url=../../index.php");
}