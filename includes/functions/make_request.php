<?php
session_start();
include("model.class.php");

if(isset($_POST) && !empty($_POST)){
    $prop_id = $_POST['prop_id'];
    $user_id = $_SESSION['id'];

    
    
    if(isset($_POST['do'])  ) {


        $stmt = $conn->prepare("DELETE FROM request WHERE prop_id='$prop_id' AND user_id = '$user_id'");
        $stmt->execute();
        header("refresh:0;url=../../index.php");

    }else{
        
    
            $stmt = $conn->prepare("INSERT INTO request(user_id,prop_id)  VALUES($user_id ,  $prop_id)");
            $stmt->execute();
            header("refresh:0;url=../../index.php");



        }
}
header("refresh:0;url=../../index.php");
