<?php
    session_start();
    if (isset($_SESSION['uid'])&&($_SESSION['cs']==1)) {
      header("location:../index.php");
    }elseif (isset($_SESSION['uid'])&&($_SESSION['cs']==2)) {
      header("location:./service_provider.php");
    }
    include("./dbcon.php");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up And Log In</title>
    <link rel="shortcut icon" href="../images/LOGO.PNG" type="image/x-icon">


    <link rel="stylesheet" href="../css and js/signup_css.css">
    <link rel="stylesheet" href="../addons/bootstrap.min.css" >

    <!-- Font Icon -->
    <link rel="stylesheet" href="../addons/fontawesome/css/all.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css and js/signup_style.css">
     
    <script src="../addons/jquery-3.4.1.min.js"></script>




<!-- <script>
function sendclientdata(){
var name, email,pass,repass,phone,checkbox;
name=$("#name-client").value;
// email=$("#email-client").value;
pass=$("#pass-client").value;
repass=$("#re_pass-client").value;
phone=Number($("#phone-client").value);
checkbox=$("#agree-term-client");
if ( (/[^0-9]/.test(name)) && (pass==repass)&& (/^[0-9]{10}$/.test(phone)) && (checkbox.checked)) {
    
}
else{
    alert("enter all the details valid");
}
}
</script>
     -->
</head>
<body>
 <!-- header section-->
 <div class="header bg-light" style="border-bottom: 1px solid black;">
    <div class="inside_header" style="font-size: 16px;font-family: Arial, Helvetica, sans-serif;">
    
    
    <div class="left_container">
    <a href="#"><img src="../images/LOGO.png" width="90px" height="70px"></a>
    <a class="pl-3" href="../index.php">GoNoWhere!</a>
    <a class="pl-3" href="./about_us.php">About Us</a>
    
    </div>
    
    <div class="right_container row align-items-center m-0 ">
    <button class="btn btn-light" onclick="customer()">As Customer</button>
    <button class="btn btn-light ml-2" onclick="partner()">As Service Provider</button>
    </div>
    
    </div>
    </div>
  
    <!-- header section ends-->
  
    <div class="main">
<h1 align="center">As Customer</h1>
        <!-- Sign up form for client -->


        <section class="signup" style="display: none;">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>



                        <form method="POST" class="register-form" id="register-form-client" action="./signup_form.php" enctype="multipart/form-data">
                            <div class="form-group pl-1">
                                <label for="name"><i class="fas fa-user-circle "></i></label>
                                <input type="text" name="name" id="name-client" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group pl-1">
                                <label for="email"><i class="fas fa-envelope"></i></label>
                                <input type="email" name="email" id="email-client" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group pl-1">
                                <label for="pass"><i class="fas fa-unlock-alt"></i></label>
                                <input type="password" name="pass" id="pass-client" placeholder="Password" minlength="7" required/>
                            </div>
                            <!-- <div class="form-group">
                                <label for="re-pass"><i class="fas fa-unlock"></i></label>
                                <input type="password"  id="re_pass-client" placeholder="Repeat your password" required/>
                            </div> -->
                            <div class="form-group pl-1">
                                <label for="name"><i class="fas fa-phone-square-alt"></i></label>
                                <input type="text" name="phone" id="phone-client" placeholder="Phone No" minlength="10" maxlength="10" required/>
                            </div>

                            <!-- <div class="form-group form-button">
                                <input type="button" id="send-otp" class="btn btn-success" value="Send a OTP"/>
                            </div>

                            <div class="form-group">
                                <label for="name"><i class="fas fa-star-of-life"></i></label>
                                <input type="text" name="otp" id="otp-client" placeholder="OTP" required/>
                            </div>
                             -->
                            <div class="form-group pl-1">
                                <label for="name"><i class="fas fa-map-marker-alt"></i></label>
                                <input type="text" name="add" placeholder="Your Address" maxlength="200"required/>
                            </div>

                            <div class="form-group ">
                            Your Profile Image<input type="file" name="image" required/>
                            </div>
                            

                            <div class="form-group d-flex align-items-center">
                                <input type="checkbox" name="" id="" class="agree-term" />
                            <label for="agree-term" class="label-agree-term">I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit"  id="signup" class="btn btn-primary" value="Register" name="clientregister"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../images/avatar img.png" alt="sing up image"></figure>
                        <a  class="signup-image-link btn-warning btn" onclick="logsign()">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <section class="sign-in" >
            <div class="container shadow-lg">
                <div class="signin-content ">
                    <div class="signin-image">
                        <figure><img src="../images/avatar img.png" alt="sing up image"></figure>
                        <a  class="signup-image-link btn-warning btn" onclick="logsign()">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form" action="./signup_form.php">
                            <div class="form-group">
                                <label for="your_name"><i class="fas fa-user-circle "></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Your E-Mail" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fas fa-unlock-alt"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="clientsignin" id="signin" class="btn btn-primary" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

   



        <!-- Sign up form partner -->
        <div class="partner"  style="display: none;">
            <h1 align="center" class="my-3">As Service Provider</h1>
        <section class="signup" style="display: none;">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="./confirm-registration.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user-circle "></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fas fa-unlock-alt"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" minlength="7" required/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fas fa-phone-square-alt"></i></label>
                                <input type="text" name="phone" id="name" placeholder="Phone No" minlength="10" maxlength="10"required/>
                            </div>

                            <div class="form-group" id="occupation">
                                <label for="name"><i class="fas fa-user-circle "></i></label>
                                <select name="work" id="" aria-placeholder="Occupation" class="ml-3 px-3" style="width:100%; border:1px solid white;" required>
                                    <option value="0">Select your Occupation</option>
                                    <option value="Carpainter">carpainter</option>
                                    <option value="House Cleaner">House cleaner</option>
                                    <option value="Utensil Washer">Utensil Washer</option>
                                    <option value="Driver">Driver</option>
                                    <option value="Maid">Maid</option>
                                    <option value="Cook">Cook</option>
                                    <option value="Painter">Painter</option>
                                    <option value="Electrician">Electrician</option>
                                    <option value="Plumber">Plumber</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user-circle "></i></label>
                                <input type="text" name="locality" placeholder="Address/Locality" required/>
                            </div>

                            <div class="form-group">
                                <label for="name"><i class="fas fa-hand-holding-usd"></i></label>
                                <input type="number" max="5000" name="wage" placeholder="Hourly Wage" required/>
                            </div>


                            <div class="form-group d-flex align-items-center">
                            <input type="checkbox" name="" id="" class="agree-term" />
                                <label for="agree-term" class="label-agree-term">I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="sendotp"  id="signup" class="btn btn-primary" value="Next"/>
                            </div>
                            
                        </form>
                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="../images/service_provider.png" alt="sing up image"></figure>
                        <a  class="signup-image-link btn-warning btn" onclick="logsign()">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form  -->
       
        <section class="sign-in" >
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../images/service_provider.png" alt="sing up image"></figure>
                        <a  class="signup-image-link btn-warning btn" onclick="logsign()">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form" action="./signup_form.php">
                            <div class="form-group">
                                <label for="your_name"><i class="fas fa-user-circle "></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Your E-Mail" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fas fa-unlock-alt"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" required/>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signinservice" id="signin" class="btn btn-primary" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>






    <!-- JS -->
    <script >
        function logsign(){
            $(".signup").toggle();
            $(".sign-in").toggle();
        }
        function customer(){
            $(".main").show();
            $(".partner").hide();
        }
        function partner(){
            $(".main").hide();
            $(".partner").show();
        }
        </script>



<?php
if (isset($_POST["clientregister"])) {
$uname=$_POST['name'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$add=$_POST['add'];

$imagename=$_FILES['image']['name'];
$tempname=$_FILES['image']['tmp_name'];

move_uploaded_file($tempname,"../dataimages/client/$imagename");

$qry="INSERT INTO `client-register`( `username`, `password`, `email`, `phone`, `image`, `address`) VALUES (\"".$uname."\",MD5(\"".$pass."\"),\"".$email."\",\"".$phone."\",\"".$imagename."\",\"".$add."\")";

$run=mysqli_query($con,$qry);

if ($run) {
    ?>
    
    <script>
    alert("Register successfull.");
    </script>
    
    
    <?PHP

    }
    else{
        ?>
        
        <script>
        alert("failed to register");
        </script>
        
        
        <?PHP
    
    }
}
    ?>


<!-- hvcjgckvcmvmcmcm -->
        <?PHP
    if(isset($_POST['clientsignin']))
    {
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    
    $qry="SELECT * FROM `client-register` WHERE `email`=\"".$email."\" AND `password`=MD5(\"".$pass."\");";
    
    $result= mysqli_query($con,$qry);
    $row=mysqli_num_rows($result);
    if ($row<1) {
    ?>
    <script>
    
    alert("invalid login");
    window.open("./signup_form.php","_self");
    </script>
    
    
    <?php
    }
    else{    
     $data=mysqli_fetch_assoc($result);
     $id=$data['id'];
    
    $_SESSION["uid"]=$id;
    $_SESSION["cs"]=1;
    
    ?>
    <script>
    
    window.open("../index.php","_self");
    </script>
    
    
    <?php
    
    }
    }

    ?>




<!-- jgfhjgvkjvjhcggvkvjjkvhjh -->

<?PHP
    if(isset($_POST['signinservice']))
    {
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    
    $qry="SELECT * FROM `service-provider` WHERE `email`=\"".$email."\" AND `password`=MD5(\"".$pass."\");";
    
    $result= mysqli_query($con,$qry);
    $row=mysqli_num_rows($result);
    if ($row<1) {
    ?>
    <script>
    
    alert("invalid login");
    window.open("./signup_form.php","_self");
    </script>
    
    
    <?php
    }
    else{    
     $data=mysqli_fetch_assoc($result);
     $id=$data['id'];
    
    $_SESSION["uid"]=$id;
    $_SESSION["cs"]=2;
    
    ?>
    <script>
    
    // alert(" login successfull");
    window.open("./service_provider.php","_self");
    </script>
    
    
    <?php
    
    }
    }

    ?>

</body>
</html>




















