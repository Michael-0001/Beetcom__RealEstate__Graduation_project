<?php
session_start();
include('model.class.php');

if(isset($_SESSION['id']) && isset($_POST['amount'])){
        $user_id = $_SESSION['id'];
        $amount = $_POST['amount'];
        
        if(isset($_FILES)){
            // ==================== uploading img script ==========================
            $imgName = $_FILES['bill']['name'];
            $imgType = $_FILES['bill']['type'];
            $imgTmp = $_FILES['bill']['tmp_name'];
            $imgSize = $_FILES['bill']['size'];
            $extension = pathinfo($imgName , PATHINFO_EXTENSION);
            $randNum = rand(0 , 100000);
            $rename = $_SESSION['Fname'] . "_Upload_" . date('ymd') . $randNum;
            $newImgName = $rename . '.' . $extension;
            $uploadOk = 1;
                if($imgSize > 10000000){              // image size check
                    $uploadOk = 2;
                }elseif($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){       // image format check
                    $uploadOk = 3;

                }
            if($uploadOk == 1){
            if(move_uploaded_file($imgTmp , "C:\\xampp\htdocs\beetcom\data\images\bills\\" . $newImgName)  ){
                // echo "Image Uploaded Successfuly";
            }else{
                // echo "Can's upload such image...Check the size of image and image Extension";
            }
            }
            // echo "UploadOk img: " . $uploadOk;
        }


        // ==================== uploading img script ==========================





        //----------------------------------- Insert into Payment
        $stmt = $conn->prepare("INSERT INTO payments(user_id, bill_img, amount)
        VALUES(?,?,?)");
                $stmt->execute(array(
                    $user_id,
                    $newImgName,
                    $amount
                    
                ));


    header("refresh:0;url=../../ads.php");


}else{
    header("refresh:0;url=../../payment.php");
}