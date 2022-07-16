<?php
// include('includes/template/header.php');
session_start();    
include("functions.php");
include("model.class.php");
echo "Update Page";
if(!empty($_POST["newTitle"])){
    echo $_POST["newTitle"] . "<br>";
    echo $_POST["newDescription"] . "<br>";
    echo $_POST["newProptype"] . "<br>";
    echo $_POST["newBedroom"] . "<br>";
    echo $_POST["newBathroom"] . "<br>";
    echo $_POST["newKitchen"] . "<br>";
    echo $_POST["newLivingroom"] . "<br>";
    echo $_POST["newArea"] . "<br>";
    echo $_POST["newPrice"] . "<br>";
    echo $_POST["newLocation"] . "<br>";
    echo $_POST["newApprove"] . "<br>";
    echo $_POST["id"] . "<br>";



$updateStmt = $conn->prepare("UPDATE properties SET title=? , description=? , prop_type=? , bedrooms=?,bathrooms=?, kitchen=?, livingrooms=?, area=?, price=?, location=?, approved=? WHERE properties.id=?");
$updateStmt->execute(array(
    $_POST["newTitle"],
    $_POST["newDescription"],
    $_POST["newProptype"],
    $_POST["newBedroom"],
    $_POST["newBathroom"],
    $_POST["newKitchen"],
    $_POST["newLivingroom"],
    $_POST["newArea"],
    $_POST["newPrice"],
    $_POST["newLocation"],
    $_POST["newApprove"],
    $_POST["id"]     
));
    header("refresh:0;../../properties.php");
}else{
    header("refresh:0;../../properties.php");

}


