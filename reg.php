<?php 
$page_title = 'Registration';
include('includes/template/myaccount_header.php'); 
include('includes/template/nav.php'); ?>

<div class="container">
    <form method="post" action="includes/functions/insert.php" enctype="multipart/form-data">
    <h1>Personal Information</h1>

    <!------------------------------------------------------------------------------ Personal Information & Just Buyer-->
<div class="row">
    <div class="col-2 "><label>Upload Image</label> </div>
    <div class="col-6"> 
        <input class="form-control" type="file" name="img" accept="image/png, image/jpeg">
    </div>    
</div>
<br>
<div class="row">
    <div class="col-2 "><label>First Name</label> </div>
    <div class="col-6"> <input required class="form-control" type="text" name="Fname"> </div>    
</div>
<br>    
<div class="row">
    <div class="col-2"> <label>Second Name</label> </div>
    <div class="col-6"> <input required class="form-control" type="text" name="Sname"> </div>
    <br>
</div>
<br>
<div class="row">  
<div class="col-2"><label>Adress</label></div>
    <div class="col-6"><input required class="form-control" type="text" name="adress"></div>
    <br>
</div>
<br>
<div class="row">
    <div class="col-2"><label>Postal Code</label></div>
    <div class="col-6"><input class="form-control" type="text" maxlength="5" name="zip"></div>
    <br>
</div>
<br>
<div class="row">
    <div class="col-2"><label>Date Of Birth</label></div>
    <div class="col-6"><input required class="form-control" type="date" name="dob"></div>
    <br>
</div>
<br>
<div class="row">
    <div class="col-2"><label>Email</label></div>
    <div class="col-6"><input required class="form-control" type="email" name="email"></div>
    <br>
</div>
<br>
<div class="row">
    <div class="col-2"><label>Phone Number</label></div>
    <div class="col-6"><input required class="form-control" type="text" maxlength="11" name="phone"></div>
    <br>
</div>
<br>
<div class="row">
    <div class="col-2"><label>National ID</label></div>
    <div class="col-6"><input required class="form-control" type="" maxlength="14" name="ssn"></div>
</div>
<br>


<div class="row">
    <div class="col-2"><label>password</label></div>
    <div class="col-6"><input required class="form-control" type="password" name="password"></div>
    <br>
</div>
<br>
<div class="row">
    <div class="col-2"><label>Confirm Password</label></div>
    <div class="col-6"><input required class="form-control" type="password" name="Cpassword"></div>
</div>






<br><br><br>
    <button class="btn btn-primary" type="submit">SUBMIT</button>
    </form>

</div>
<hr>

<?php
include("includes/template/footer.php");    
?>