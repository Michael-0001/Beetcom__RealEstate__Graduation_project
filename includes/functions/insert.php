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
$user = new users();
if(isset($_POST) && !empty($_POST)){

// ============================Fetch personal data from "reg.php"

    $fName  = $_POST['Fname']; 
    $sName=$_POST["Sname"];
    $adress =$_POST["adress"];
    $zip=  filter_var( $_POST["zip"] , FILTER_SANITIZE_NUMBER_INT);
    $dob=$_POST["dob"];
    $email=  filter_var( $_POST["email"] ,FILTER_SANITIZE_EMAIL);
    $phone=$_POST["phone"];
    $ssn= filter_var( $_POST["ssn"] , FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
// ==================================Checking Insert Errors 
    if($user->checkemail($email) >0){// Check if email exist

        echo '<div class="alert alert-danger" role="alert"><h1>This email is already Exist</h1></div>';
        header('refresh:3;url=../../reg.php');
    }else{
    if($password != $Cpassword){                //Check Password match Confirm Password===============
        echo '<div class="alert alert-danger" role="alert"><h1>Password Doesn\'t Match</h1></div>';



        header('refresh:3;url=../../reg.php');
    }else{
        //======================================Rename and inserting image && hashing Password && inserting all data=============== 

        // ==================== uploading img script ==========================
        $imgName = $_FILES['img']['name'];
        $imgType = $_FILES['img']['type'];
        $imgTmp = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];

        $extension = pathinfo($imgName , PATHINFO_EXTENSION);
        $randNum = rand(0 , 100000);
        $rename = $fName . "_Upload_" . date('ymd') . $randNum;
        $newImgName = $rename . '.' . $extension;
        $uploadOk = 1;
            if($imgSize > 800000){              // image size check
                $uploadOk = 2;
            
            }elseif($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){       // image format check
                $uploadOk = 3;
            }
            echo $uploadOk;
        if($uploadOk == 1){
        if(move_uploaded_file($imgTmp , "C:\\xampp\htdocs\beetcom\data\images\users\\" . $newImgName)  ){
            
        }else{
            echo '<div class="alert alert-dark mb-0" role="alert">Can\'s upload such image...Check the size of image and image Extension</div>';
        
            header('refresh:;url=../../reg.php');
        }
        }
        // ==================== uploading img script ==========================






        $Fname = $_POST['Fname'];
        $Sname = $_POST['Sname'];
        $adress = $_POST['adress'];
        $zip = $_POST['zip'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $ssn = $_POST['ssn'];

        $hashpassword = password_hash( $_POST['password'], PASSWORD_DEFAULT);




        // ___________________________________________________________SQL Inserting Query ___________________________
        $stmt = $conn->prepare("INSERT INTO users(Fname, Sname, adress, zip, dob, email, password, ssn, phone, user_img)
        VALUES(?,?,?,?,?,?,?,?,?,?)");
                $stmt->execute(array(
                    $Fname,
                    $Sname,
                    $adress,
                    $zip,
                    $dob,
                    $email,
                    $hashpassword,
                    $ssn,
                    $phone,
                    $newImgName
                ));


            header('refresh:0;url=../../index.php');

        // ___________________________________________________________SQL Inserting Query ___________________________
        }
    }
}else{// Empty Data

    echo '<div class="alert alert-danger" role="alert">Your Input Not Completed</div>';
    header('refresh:1;url=../../reg.php');
}