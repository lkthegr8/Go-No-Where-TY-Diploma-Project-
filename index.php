<?php
session_start();
include("./pages/dbcon.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="./addons/jquery-3.4.1.min.js"></script>
<script src="./addons/parallax.js-master/parallax.min.js"></script>

<link rel="shortcut icon" href="./images/LOGO.PNG" type="image/x-icon">
<link rel="stylesheet" href="./css and js/main.css" >
<link rel="stylesheet" href="./addons/bootstrap.min.css" >
<link rel="stylesheet" href="./addons/fontawesome/css/all.min.css">

<script>
$('.parallax-window').parallax({imageSrc: './images/landing_background.jpg'});

  jQuery(window).trigger('resize').trigger('scroll');
</script>


    <title>GoNoWhere!</title>
</head>
<body>

  <!-- header section-->
<div class="header bg-light">
  <div class="inside_header">
  
  
  <div class="left_container">
  <a ><img src="./images/LOGO.png" width="90px" height="70px"></a>
  <a class="pl-3" >GoNoWhere!</a>
  <a class="pl-3" href="./pages/about_us.php">About Us</a>
  <a class="pl-3" href="./pages/service_providers.php">Services Providers</a>
  
  </div>
  
  <div class="right_container row align-items-center m-0 ">

<?PHP
    if (isset($_SESSION['uid'])&&($_SESSION['cs'])==1) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `client-register` WHERE `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      
      echo"<a class=\"px-3\"> Welcome ".ucwords($data['username'])." </a>";
      echo'  <a><img src="./dataimages/client/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; " id="userimg"></a>';
    
    
    }
    elseif (isset($_SESSION['uid'])&&($_SESSION['cs'])==2) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `service-provider` WHERE  `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      echo"<a class=\"px-3\"> Welcome ".ucwords($data['name'])." </a>";   
      echo'  <a  href="./pages/signup_form.php"><img src="./dataimages/service_provider/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; "></a>';
   
    
      }else{
      echo"<a class=\"px-3\" href=\"./pages/signup_form.php\"> Login / Sign Up </a>";
      echo'  <a  href="./pages/signup_form.php"><img src="./images/image1.jpg" style="width:50px; height:50px;border-radius:50px; "></a>      ';
    }



?>
  </div>
  
  </div>
  </div>
  <!-- header section ends-->

 <!-- slider menu -->
 <div class=" p-3" id="slider" style="text-align: center;	display: none;position: fixed;top: 70px;right: 0px;width: 50%;min-width: 300px;background: rgba(0, 0, 0,0.9);z-index: 20;height:100vh;" >
            <img src="./dataimages/client/<?php echo $data["image"]?>" style="width:100px; height:100px;border-radius:50%; " class="m-3"  onclick="slide()">
       <h2 align="center" style="color:white;"><?php echo $data["username"]?></h2>
        <button class="px-3 btn bg-primary w-100 mt-3" onclick="goactive()"><i class="fas fa-list-ul"></i> Active </button>
		    <button class="px-3 btn bg-warning w-100 mt-3" onclick="goedit()"><i class="fas fa-edit"></i> Edit Profile </button>
        <button class="px-3 btn bg-success w-100 mt-3" onclick="gohistory()"><i class="fas fa-history"></i> History </button>
        <button class="px-3 btn bg-danger w-100 mt-3" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout </button>

        </div>
   <!-- slider menu -->

  <!-- landing section-->
  <div class="landing m-0">
    <div class="parallax-window landing_top m-0 " data-parallax="scroll" data-image-src="./images/landing_background.jpg">
      <div  class="row align-items-center m-0 h-100 px-5">

        <div class="w-100" style="margin-top: 50px;">
        <div class="w-100 " style="min-width: 360px;">
    <h1 >WELCOME TO GoNoWhere!</h1>
    <h3>Get instant access to reliable <wbr>and affordable services</h3>
        </div>

  </div>
    </div>
  </div>


    <div class="landing_bottom m-0 row pb-3 px-5" > 
      <div class="col-md-3 col-sm-6"><div align="center"><i class="fas fa-user-tie fa-3x my-3"></i><br><div class="w-100">Professionals can work with us as partners, and be self employed.</div></div></div>
      <div class="col-md-3 col-sm-6"><div align="center"><i class="fas fa-home fa-3x my-3"></i><br><div class="w-100">Clients can get their required work done from home.</div></div></div>
      <div class="col-md-3 col-sm-6"><div align="center"><i class="fas fa-hands-helping fa-3x my-3"></i><br><div class="w-100">Direct communication between the client and worker, leading to a healthy relationship.</div></div></div>
      <div class="col-md-3 col-sm-6"><div align="center"><i class="fas fa-truck-monster fa-3x my-3"></i><br><div class="w-100">All the services are provided by the service providers, you need not go any where.</div></div></div>
    </div>
    </div>
  <!-- landing section ends-->

  <!-- sercive provided section-->

<div class="pt-4" >
<div class="d-flex service_menu " id="menu">
      <div class="w-100">
      <a class="btn btn-dark w-100 p-2 rounded-0" href="#hi1">Home Services</a>
      <a class="btn btn-dark w-100 p-2 rounded-0" href="#hi2">Home Maintainance and Installation</a>
      <a class="btn btn-dark w-100 p-2 rounded-0" href="#hi3">Labours for work</a>
      
    </div>
    <div style="background: transparent;">

    </div>
</div>

<div class="d-flex " id="data">
  <div style="min-width: 300px;" ></div>
<div  style="padding: 10px;">
<h2>Services Provided</h2>
  <!-- data -->
<div id="hi1" class="p-3">
<h4>Home services</h4>
<img src="./images/home1.jpg" class="m-2" width="300px" height="200px">
<img src="./images/home2.jpg" class="m-2" width="300px" height="200px">
<p class="mb-2 ml-2" style="max-width:700px;">All the services which are related to home will be provided, services such as home cleaning, dish washing, jhadu & phocha, helping hand for cooking.</p>
</div>


<div id="hi2" class="p-3">
<h4>Home maintainance And appliance installation.</h4>
<img src="./images/appliance1.jpg" class="m-2" width="300px" height="200px">
<img src="./images/appliance2.jpg" class="m-2" width="300px" height="200px">
<p class="mb-2 ml-2" style="max-width:700px;"> Services such as Home maintainance And appliance installation will also be done by the professionals, just select the specific professional for the specific jobs.</p>
</div>


<div id="hi3" class="p-3">
<h4>Labours</h4>
<img src="./images/labour1.jpg" class="m-2" width="300px" height="200px">
<img src="./images/labour2.jpg" class="m-2" width="300px" height="200px">
<p class="mb-2 ml-2" style="max-width:700px;">The business man can also use this platform to recruit a unskilled labour. Your business wont stop due to labour and broker problems.</p>
</div>

  <!-- end data -->

</div>
</div>

</div>
  <!-- sercive provided section ends-->

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
          <h6>Services we provide</h6>
          <p class="text-white">GoNoWhere! is a platform for connecting individuals looking for household services with top-quality,
independent service professionals. From home cleaning, shifting, to every thing relate to home
matches thousands of customers every week with professionals in cities.</p>
<p class="text-white">In this product either a client or Professional can register.This product increases self employement oppurtinity.
All the professionals are checked through our ADMIN, and then they are provided to customers.</p>

          <hr style="border-color: white;">


            <div class=" row align-items-center mx-3 justify-content-between">
              <div class="row align-items-center">
              <img src="./images/LOGO.png" width="90px" height="70px">
              <a class="px-3" > <h5 style="color:white;">GoNoWhere!</h5> </a>
            </div>


            <div class="ml-5 row align-items-center">
              <h6 class="pt-2 mx-4">Follow Us On</h6>

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
    var h=document.getElementById("menu").offsetHeight  ;
    document.getElementById("data").style.top = "-"+h+"px";



window.addEventListener("click",function(e){
      if(document.getElementById("userimg").contains(e.target))
    {
      $("#slider").show("easing");
      }else if(! document.getElementById("slider").contains(e.target))
    {
        $("#slider").hide("easing");
    }
})
    
    </script>

<script>
function goactive(){
window.location="./pages/client.php";
}
function gohistory(){
window.location="./pages/client.php";
}

function goedit(){
window.location="./pages/client.php";
}
function logout(){
  window.location="./pages/logout.php";
    }

</script>


</body>
</html>