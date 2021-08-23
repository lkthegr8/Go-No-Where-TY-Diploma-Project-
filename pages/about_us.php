<?php
session_start();
include("./dbcon.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<script src="../addons/jquery-3.4.1.min.js"></script>
<script src="../addons/parallax.js-master/parallax.min.js"></script>

<link rel="shortcut icon" href="../images/LOGO.PNG" type="image/x-icon">
<link rel="stylesheet" href="../css and js/aboutus.css" >
<link rel="stylesheet" href="../addons/bootstrap.min.css" >
<link rel="stylesheet" href="../addons/fontawesome/css/all.min.css">



    <title>AboutUs GoNoWhere!</title>
    <!-- login section js -->
    <script >
      // Get the modal 
      var modal = document.getElementById('id01');
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      </script>
</head>
<body>
  <!-- login section-->
  <div id="id01" class="modal">
    <form class="modal-content animate py-3" action="/action_page.php" method="post">
      <h3 align="center">User Login </h3>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

      <div class="imgcontainer">
        <img src="../images/landing_background.jpg" alt="Avatar" class="avatar" style="object-fit:cover;">
      </div>
  
      <div class="px-5 py-2">
        <div class="row align-items-center">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
      </div>

      <div class="row align-items-center ">
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
      </div>
 
        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>
  
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
  </div>
  
  
  <!-- login section ends-->


  <!-- header section-->
<div class="header bg-light" style="border-bottom: 1px solid black;">
  <div class="inside_header">
  
  
  <div class="left_container">
  <a ><img src="../images/LOGO.png" width="90px" height="70px"></a>
  <a class="pl-3" href="../index.php">GoNoWhere!</a>
  <a class="pl-3" href="./service_providers.php">Services Providers</a>
  
  </div>
  
  <div class="right_container row align-items-center m-0 ">
  <?PHP
    if (isset($_SESSION['uid'])&&($_SESSION['cs'])==1) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `client-register` WHERE `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      
      echo"<a class=\"px-3\">".ucwords($data['username'])." </a>";
      echo'  <a><img src="../dataimages/client/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; " onclick="slidemenu()"></a>';
    
    
    }
    elseif (isset($_SESSION['uid'])&&($_SESSION['cs'])==2) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `service-provider` WHERE  `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      echo"<a class=\"px-3\" style=\"font-weight:600;\"> ".ucwords($data['name'])." </a>";   
      echo'  <a  href="./service_provider.php"><img src="../dataimages/service_provider/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; "></a>';
   
    
      }else{
      echo"<a class=\"px-3\" href=\"./signup_form.php\"> Login/Sign Up </a>";
      echo'  <a  href="./signup_form.php"><img src="../images/image1.jpg" style="width:50px; height:50px;border-radius:50px; "></a>      ';
    }



?>
</div>
  
  </div>
  </div>
  <!-- header section ends-->


  <!-- about us section-->

<div  style="padding-top: 30px;" align="center" class="bg-light">
<h1 >What is GoNoWhere! ?</h1>

<div class="row">

<div class="data_width text-justify p-5 col-md-6 col-sm-12">
<p>GoNoWhere! is a platform for connecting individuals looking for household services with top-quality,
independent service professionals. From home cleaning, shifting, to every thing relate to home
matches thousands of customers every week with professionals in cities.</p>
<p>In this product either a client or Professional can register.This product increases self employement oppurtinity.
All the professionals are checked through our ADMIN, and then they are provided to customers.</p>

</div>
<!-- slide show start -->
<div class="col-md-6 col-sm-12 p-5">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../images/homeservice1.jpg" style="width:100%">
  <div class="text" style="color:black;font-weight:500;">House Cleaning</div>
</div>


<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../images/homeservice3.jpg" style="width:100%">
  <div class="text" style="color:black;font-weight:500;">Home Theater Setup</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../images/homeservice2.jpg" style="width:100%">
  <div class="text" style="color:black;font-weight:500;">We help you to get to professionals online.</div>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>
<!-- slide show ends -->


</div>
</div>




<div  align="center" class="bg-light py-5">
<h1 >Project Partners.</h1>
<div >
<!-- card effect -->
<div class="row m-0 pt-3">



<div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 m-0">
<div class="card ">
    <div class="front" style="overflow:hidden;">
      <img src="../images/p1.webp" alt="">
    </div>
    <div class="back">
      <div class="back-content middle pt-4">
        <h2>Prathamesh</h2>
        <span>Documentation and Testing.</span>
        <div class="sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 m-0">
  <div class="card ">
    <div class="front" style="overflow:hidden;">
      <img src="../images/p2.webp" alt="">
    </div>
    <div class="back">
      <div class="back-content middle pt-4">
        <h2>Lakshmikanth</h2>
        <span>Development partner.</span>
        <div class="sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="https://www.instagram.com/lk_gr8/"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 m-0">
  <div class="card ">
    <div class="front" style="overflow:hidden;">
      <img src="../images/p3.jpg" alt="">
    </div>
    <div class="back">
      <div class="back-content middle pt-4">
        <h2>Arihant</h2>
        <span>Development partner.</span>
        <div class="sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 m-0">
  <div class="card ">
    <div class="front" style="overflow:hidden;">
      <img src="../images/p4.png" alt="">
    </div>
    <div class="back">
      <div class="back-content middle pt-4">
        <h2>Abhiraj</h2>
        <span>Documentation and Testing.</span>
        <div class="sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>






</div>
<!-- card effect end -->

</div>

</div>


  <!-- about us section ends-->



  <!-- footer section-->

  <div class="footer bg-secondary pb-3">
    <div class="footer_inside bg-secondary ">
      <div></div>
<h5 class="mx-5 pt-3 mb-3">Services we provide</h5>

<hr style="border-color: white;" class="mx-5">

<a class="ml-5  link">Carpenter</a>
<a class="ml-5 link">Electrician</a>
<a class="ml-5 link">Packers & Movers</a>
<a class="ml-5 link">Massage for Men</a>
<a class="ml-5 link">Hairstyling & Makeup</a >
<a class="ml-5 link">Pest Control</a>
<a class="ml-5 link">Plumber</a>
<a class="ml-5 link">Bathroom Deep Cleaning</a>
<a class="ml-5 link">Home Deep Cleaning</a>
<a class="ml-5 link">Kitchen Deep Cleaning</a>
<a class="ml-5 link">Sofa Cleaning</a>
<a class="ml-5 link">RO or Water Purifier Repair</a>
<a class="ml-5 link">Salon at Home</a>
<a class="ml-5 link">Spa at Home for Women</a>
    </div> 
</div>

  <div class="footer bg-dark px-5">
    <div class="footer_inside bg-dark py-3">

      <div class="row justify-content-between"></div>
     <a href="" class="col link"> About Us </a>
     <a href="" class="col link">Terms & Conditions</a> 
     <a href="" class="col link">Privacy Policy</a>
      <a href="" class="col link">Blog</a>
      <a href="" class="col link">Reviews</a>
      <a href="" class=" col link">Careers</a>
      <a href="" class="col link">Contact Us</a>

      <hr style="border-color: white;">

      <div>
        <h6 style="color:black;font-weight:600;">Services we provide</h6>
        <p class="text-white">GoNoWhere! is a platform for connecting individuals looking for household services with top-quality,
independent service professionals. From home cleaning, shifting, to every thing relate to home
matches thousands of customers every week with professionals in cities.</p>
<p class="text-white">In this product either a client or Professional can register.This product increases self employement oppurtinity.
All the professionals are checked through our ADMIN, and then they are provided to customers.</p>
        

        <hr style="border-color: white;">


          <div class=" row align-items-center mx-3 justify-content-between">
            <div class="row align-items-center">
            <img src="../images/LOGO.png" width="90px" height="70px">
            <a class="px-3" > <h5 style="color:white;">GoNoWhere!</h5> </a>
          </div>


          <div class="ml-5 row align-items-center">
            <h6 class="pt-2 mx-4" style="color:black;font-weight:600;">Follow Us On</h6>

            <i class="fab fa-instagram text-white  fa-2x"></i>
            <i class="fab fa-facebook-square text-white ml-2 fa-2x"></i>
            <i class="fab fa-twitter-square text-white ml-2 fa-2x"></i>
            <i class="fab fa-youtube text-white ml-2 fa-2x"></i>
            <i class="fab fa-pinterest-square text-white ml-2 fa-2x"></i>
          </div>

            </div>



      </div>



</div> 
</div>

  <!-- footer section ends-->
  <script>
    var slideIndex = 0;
    showSlides();
    
    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 4000); //time
    }
    </script>
  </body>
  </html>