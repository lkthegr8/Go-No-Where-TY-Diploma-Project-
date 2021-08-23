<?php
session_start();
include("./dbcon.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service Providers</title>
    <link rel="shortcut icon" href="../images/LOGO.PNG" type="image/x-icon">


    <link rel="stylesheet" href="../addons/bootstrap.min.css" >

    <!-- Font Icon -->
    <link rel="stylesheet" href="../addons/fontawesome/css/all.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css and js/services_css.css">
<!-- animation and wow -->
     <script src="../addons/wow.min.js"></script>
     <link rel="stylesheet" href="../addons/animate.css">

     <script>
        new WOW().init();
        </script>
<style>

/* slider section */
.slidecontainer {
	width: 100%;
  }
  
  .slider {
	-webkit-appearance: none;
	width: 80%;
	height: 5px;
  border-radius: 5px;
  border:none;
	background: rgb(169,169,169);
	outline: none;
	opacity: 0.8;
	-webkit-transition: .2s;
	transition: opacity .2s;
  }
  
  .slider:hover {
	opacity: 1;
  }
  
  .slider::-webkit-slider-thumb {
	-webkit-appearance: none;
	appearance: none;
	width: 25px;
	height: 25px;
	border-radius: 50%;
	background: rgb(0,0,0);
	cursor: pointer;
  }
  
  .slider::-moz-range-thumb {
	width: 25px;
	height: 25px;
	border-radius: 50%;
	background: rgb(0,0,0);
	cursor: pointer;
  }

/* slider section ends */
</style>

</head>
<body>
 <!-- header section-->
 <div class="header bg-light">
    <div class="inside_header">
    
    
    <div class="left_container">
    <a href="#"><img src="../images/LOGO.png" width="90px" height="70px"></a>
    <a class="pl-3" href="../index.php">GoNoWhere!</a>
    <a class="pl-3" href="./about_us.php">About Us</a>
    
    </div>
    <div class="right_container row align-items-center m-0 ">

<?PHP
    if (isset($_SESSION['uid'])&&($_SESSION['cs'])==1) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `client-register` WHERE `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      
      echo"<a class=\"px-3\"> Welcome ".ucwords($data['username'])." </a>";
      echo'  <a  ><img src="../dataimages/client/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; " onclick="slidemenu()"></a>';
    
    
    }
    elseif (isset($_SESSION['uid'])&&($_SESSION['cs'])==2) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `service-provider` WHERE  `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      echo"<a class=\"px-3\"> welcome ".ucwords($data['name'])." </a>";   
      echo'  <a  href="./signup_form.php"><img src="../dataimages/service_provider/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; "></a>';
   
    
      }else{
      echo"<a class=\"px-3\" href=\"./signup_form.php\"> Login/Sign Up </a>";
      echo'  <a  href="./signup_form.php"><img src="../images/image1.jpg" style="width:50px; height:50px;border-radius:50px; "></a>      ';
    }



?>  
  </div>
    
    </div>
    </div>
   <!-- header section ends-->

<!-- infinite div -->
<div class="dummy d-flex" id="dummy">
  <!-- form div -->
    <div class="filters my-5 ml-3" id="filters" style="position:sticky;top:90px;left:10px;min-width:300px;max-height:327px">

<form action="./service_providers.php">
<h6 class="mx-3 mt-3">What Service Do You Need</h6>
<select name="service"  class="ml-3 p-1" style="border:1px solid rgb(169,169,169);">
    <option value="0">Select Here</option>
    <option value="carpainter">carpainter</option>
    <option value="House Cleaner">House cleaner</option>
    <option value="Utensil Washer">Utensil Washer</option>
    <option value="Driver">Driver</option>
    <option value="Maid">Maid</option>
    <option value="Cook">Cook</option>
    <option value="Painter">Painter</option>
    <option value="Electrician">Electrician</option>
    <option value="Plumber">Plumber</option>
</select>
<h6 class="mx-3 mt-3">Your Locality</h6>
<select name="locality" class="ml-3 p-1" style="border:1px solid rgb(169,169,169);">
    <option value="0">Select Here</option>
    <?php
$sql="SELECT DISTINCT loaclity FROM `service-provider`;";
$run11=mysqli_query($con,$sql);
while ($data11=mysqli_fetch_assoc($run11)) {
echo "<option value=\"".$data11["loaclity"]."\">".$data11["loaclity"]."</option>";
}
?>
</select>
<h6 class="mx-3 mt-3">Max Price</h6>
<div class="slidecontainer">
  <input name="price" type="range" min="0" max="5000" value="0" class="slider mx-3 mt-3" id="myRange">
  <b><p align="center" class="mr-3">PRICE: <span id="demo"></span></p></b>
</div>


<h6 class="pl-3 pb-3">Please Select From Dropdown</h6>

<input type="submit" value="SEARCH" class="btn btn-dark w-100" style="text-align: center;" name="submit">
</form>
</div>
  
<!-- form div ends -->
<div class="infinite pl-5">

    <div id="fill">
        
      </div>

</div>

</div>
<!-- infinite div ends -->





    <!-- footer section-->

    <div class="footer bg-secondary pb-3" style="width: 100%;">
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
                <img src="../images/LOGO.png" width="90px" height="70px">
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




 <!-- slider menu -->
 <div class=" p-3" id="slider" style="text-align: center;	display: none;position: fixed;top: 70px;right: 0px;width: 50%;min-width: 300px;background: rgba(0, 0, 0,0.9);z-index: 20;height:100vh;" >
            <img src="../dataimages/client/<?php echo $data["image"]?>" style="width:100px; height:100px;border-radius:50%; " class="m-3"  onclick="slide()">
       <h2 align="center" style="color:white;"><?php echo $data["username"]?></h2>
        <button class="px-3 btn bg-primary w-100 mt-3" onclick="goactive()"><i class="fas fa-list-ul"></i> Active </button>
		    <button class="px-3 btn bg-warning w-100 mt-3" onclick="goedit()"><i class="fas fa-edit"></i> Edit Profile </button>
        <button class="px-3 btn bg-success w-100 mt-3" onclick="gohistory()"><i class="fas fa-history"></i> History </button>
        <button class="px-3 btn bg-danger w-100 mt-3" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout </button>

        </div>
   <!-- slider menu -->







          <!-- JS -->
    <script src="../addons/jquery-3.4.1.min.js"></script>

    <script>
        <?php

if (isset($_GET["submit"])&&($_GET["locality"]!=0)&&($_GET["service"]!=0)&&($_GET["price"]!=0)) {
  $sql="SELECT * FROM `service-provider` WHERE `loaclity`=\"".$_GET["locality"]."\" `work`=\"".$_GET["service"]."\" `hourly-wage`<\"".$_GET["price"]."\" AND `admin-check`=1 ORDER BY `rating` DESC;";

}elseif(isset($_GET["submit"])&&(!$_GET["locality"]==0)) {
  $sql="SELECT * FROM `service-provider` WHERE `loaclity`=\"".$_GET["locality"]."\" AND `admin-check`=1 ORDER BY `rating` DESC;";

}elseif(isset($_GET["submit"])&&(!$_GET["service"]==0)) {
  $sql="SELECT * FROM `service-provider` WHERE `work`=\"".$_GET["service"]."\" AND `admin-check`=1 ORDER BY `rating` DESC;";

}elseif(isset($_GET["submit"])&&(!$_GET["price"]==0)) {
  $sql="SELECT * FROM `service-provider` WHERE `hourly-wage`<\"".$_GET["price"]."\" AND `admin-check`=1 ORDER BY `rating` DESC;";

}else {
  $sql="SELECT * FROM `service-provider` WHERE `admin-check`=1 ORDER BY `rating` DESC;";

}

        $run=mysqli_query($con,$sql);


if (mysqli_num_rows($run)<1) {
  ?>
  $("#fill").append("<h4>No Records Found.<h4>");
  <?Php
    }else {

    while (($data=mysqli_fetch_assoc($run))) {
      ?>

      $("#fill").append('<div class="card wow bounceInUp" style="border-radius:10px;"><img src="../dataimages/service_provider/<?php echo $data['image']; ?>" alt="John" style="width:100px;height:100px;margin-left:auto;margin-right:auto;border-radius:50px;"><h6 class="pt-2"><?php echo ucwords($data['name']); ?></h6><p class="title"><?php echo $data['work']; ?></p><p><?php echo $data['loaclity']; ?></p><a href="#"><p>Hourly Wage:-<?php echo $data['hourly-wage']; ?></p><p><form action="./request.php" method="post"><input type="hidden" name="req" value="<?php echo $data['id']; ?>"><input type="submit" name="submit" class="w-100 btn btn-dark" value="Contact"></form></p></div>');
        
        
        <?PHP
          }
        }      
            ?>

        function slidemenu(){
      $("#slider").toggle("easing");
    }


        </script>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

<!-- slide bar script -->
<script>
function goactive(){
<?php     //$_SESSION["goto"]=1;?>
window.location="./client.php";
}
function gohistory(){
  <?php    // $_SESSION["goto"]=2;?>
window.location="./client.php";
}

function goedit(){
  <?php     //$_SESSION["goto"]=3;?>
window.location="./client.php";
}
function logout(){
window.location="./logout.php";
}
</script>
<!-- slide bar script ends -->



</body>
</html>