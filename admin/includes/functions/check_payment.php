<?php
// include("model.class.php");

$payment = new payments();
$pay = $payment-> all();

$user = new users();





for($i =0; $i < count( ($pay) ) ; $i++ ){
    if($pay[$i]['approve'] == 1){
        $user_id = $pay[$i]['user_id'];
        $account = $user->findby('id', $user_id);


        $old_credit = $account['credit'];
        $new_credit = $old_credit + $pay[$i]['amount'];
        $stmt = $conn->prepare("UPDATE users SET credit = $new_credit WHERE id = $user_id") ; // Update Credit
        $stmt->execute();

        $pay_id = $pay[$i]['id'];
        $stmt2 =$conn->prepare("DELETE FROM payments WHERE id = $pay_id");
        $stmt2->execute();
    }



}