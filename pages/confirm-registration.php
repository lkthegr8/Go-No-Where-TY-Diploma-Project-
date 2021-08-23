<?php
session_start();
include("./dbcon.php"); 
?>

<!-- otp section -->

<?php

if (isset($_POST["sendotp"])) {
    include ( "../addons/otp/NexmoMessage.php" );

    try {
        $otp = mt_rand(10000, 99999);
        setcookie("onetimepass", $otp, time() + (86400)); // 86400 = 1 day
        /**
         * To send a text message.
         *
         */
        $ph='+91'.$_POST['phone'];
        $message=$_POST["name"].'OTP is ='.$otp ;
        // Step 1: Declare new NexmoMessage.
       $nexmo_sms = new NexmoMessage('ef07306d', 'uQqQki8FuRo3tSPG');
        // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
       $info = $nexmo_sms->sendText($ph, 'GoNoWhere!', $message);
       echo  $nexmo_sms->displayOverview($info);
    echo '<script>alert("OTP Has Been Sent To Your Mobile No");</script>';
    } catch (Exception $e) {
        //throw $th;
    }
    
}else {
     header("location:./signup_form.php");
}
?>

<!-- otp section ends -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Registration</title>
</head>

<link rel="shortcut icon" href="../images/LOGO.PNG" type="image/x-icon">


<link rel="stylesheet" href="../css and js/signup_css.css">
<link rel="stylesheet" href="../addons/bootstrap.min.css" >

<!-- Font Icon -->
<link rel="stylesheet" href="../addons/fontawesome/css/all.min.css">

<!-- Main css -->
<link rel="stylesheet" href="../css and js/signup_style.css">
 
<script src="../addons/jquery-3.4.1.min.js"></script>


<body style="background:rgba(0,0,0,0.3);">
    
<h2 align="center" class="m-3">Confirm Registration</h2>
<!-- Sign up form partner -->
<div class="partner" >
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="./confirm-registration.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user-circle "></i></label>
                                <input type="text" name="name" value="<?PHP echo $_POST["name"];?>" id="name"  readonly/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i></label>
                                <input type="email" name="email" value="<?PHP echo $_POST["email"];?>" id="email"readonly/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fas fa-unlock-alt"></i></label>
                                <input type="password" name="pass" value="<?PHP echo $_POST["pass"];?>" id="pass"   readonly/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fas fa-phone-square-alt"></i></label>
                                <input type="text" name="phone" value="<?PHP echo $_POST["phone"];?>" id="name" readonly/>
                            </div>

                            <div class="form-group" id="occupation">
                                <label for="name"><i class="fas fa-user-circle "></i></label>
                                <input type="text" name="work" value="<?PHP echo $_POST["work"];?>" id="work" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user-circle "></i></label>
                                <input type="text" name="locality" value="<?PHP echo $_POST["locality"];?>" id="name"  readonly/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fas fa-hand-holding-usd"></i></label>
                                <input type="number" name="wage" id="name" value="<?PHP echo $_POST["wage"];?>" required/>
                            </div>

                                <div class="form-group">
                            <h6>Your Profile Image</h6><input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" required/>
                            </div>

                            <div class="form-group d-flex align-items-center">
                            <input type="checkbox" name="" id="" class="agree-term" required/>
                                <label for="agree-term" class="label-agree-term">I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>

                            <div class="form-group" class="mt-3 ">
                                <label for="name"><i class="fas fa-star-of-life"></i></i></label>
                                <input type="number" id="otp1" name="otp1"placeholder=" ENTER OTP" class="bg-warning " required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signupservice" id="signup" class="btn btn-success" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../images/service_provider.png" alt="sing up image"></figure>
                        <h4 class="bg-primary p-2 w-100 " style="border-radius:7px;">Confirm Your Registration</h4>
                    </div>
                </div>
            </div>
        </section>





</body>
</html>





<!-- vjhvfvkjv,jhv,hv,jhv,jhv,jhv,vjghfvjgfhgfcgc -->

<?php
if (isset($_POST["signupservice"])&&($_POST['otp1']==$_COOKIE["onetimepass"])) {
$uname=$_POST['name'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$locality=$_POST['locality'];
$work=$_POST['work'];
$wage=$_POST['wage'];
$imagename=$_FILES['image']['name'];
$tempname=$_FILES['image']['tmp_name'];

move_uploaded_file($tempname,"../dataimages/service_provider/$imagename");

$qry="INSERT INTO `service-provider`(`name`, `email`, `password`, `phone`, `work`, `loaclity`, `image`, `hourly-wage`) VALUES (\"".$uname."\",\"".$email."\",MD5(\"".$pass."\"),\"".$phone."\",\"".$work."\",\"".$locality."\",\"".$imagename."\",\"".$wage."\");";

$run=mysqli_query($con,$qry);

if ($run) {
    ?>
    
    <script>
    alert("Register Successfull");
    </script>
    
    
    <?PHP
    header("location:./signup_form.php");
    }
    else{
        ?>
        
        <script>
        alert("Invalid OTP or Failed to Register");
        </script>
        
        <?PHP
    
    }
}
    ?>
