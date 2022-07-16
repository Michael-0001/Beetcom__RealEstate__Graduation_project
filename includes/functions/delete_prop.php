<?php
session_start();
include("model.class.php");

if(isset($_SESSION) && isset($_POST)){
    $prop_id = $_POST['prop_id'];
    $stmt = $conn->prepare("DELETE FROM properties WHERE id='$prop_id' ");
            $stmt->execute();
    header("refresh:0;url=../../my_prop.php");
}