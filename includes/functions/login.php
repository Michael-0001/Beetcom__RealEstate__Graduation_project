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
Session_START();
$email =$_POST['email'];
$pass = $_POST['pass'];
include("model.class.php");
$users = new users();


$ifExist = $users->checkemail($email);

    if($ifExist > 0){                                     // Email is Exist
        
        $data = $users->findbyemail($email);
        $DBemail = $data['email'];
        $hashedPass = $data['password'];
        $Fname = $data['Fname'];
        $Sname = $data['Sname'];
        $userRole = $data['userRole'];
        $user_img = $data['user_img'];
        $id = $data['id'];


//Check password is MATCHED
            
            if( password_verify( $pass , $hashedPass)){
                echo '<div class="alert alert-success" role="alert"><h1>Welcome ' .  $Fname  . ' :)</h1></div>';

                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['Fname'] = $Fname;
                $_SESSION['Sname'] = $Sname;
                $_SESSION['userRole'] = $userRole;
                $_SESSION['user_img'] = $user_img ; 
                
                header('refresh:1;url=../../index.php');
            }else{

            
        
        
        
        
        
        echo '<div class="alert alert-danger" role="alert"><h1>Wrong Password .....Please Try again</h1></div>';
            header('refresh:4;url=../../index.php');
        }
    
    }else{
        echo '<br><div class="alert alert-danger" role="alert"><h1>We are sorry..... BUT(' . $email . ')Doesn\'t EXIST :( </h1></div>';
        header('refresh:4;url=../../index.php');
    }




?>