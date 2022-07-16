<?php
session_start();
include('model.class.php');

if(isset($_SESSION) && isset($_GET['pay_id'])){
    $pay_id = $_GET['pay_id'];


    $stmt = $conn->prepare("UPDATE payments SET approve = 1");
    $stmt->execute();

    header("refresh:0;url=../../payments.php");

}else{
    header("refresh:0;url=../../payments.php");
}