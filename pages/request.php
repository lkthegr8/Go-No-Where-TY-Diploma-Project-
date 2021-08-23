<?php
    session_start();
    if (!(isset($_POST['req']))) {
      header("location:./service_providers.php");
     }elseif (isset($_SESSION["cs"])&&$_SESSION["cs"]==2) {
        ?>

        <script>alert("Please Login Client.");    window.open("./signup_form.php","_self");</script>
    
    <?php
    }

    include("./dbcon.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request</title>
    <link rel="shortcut icon" href="../images/LOGO.PNG" type="image/x-icon">


    <link rel="stylesheet" href="../css and js/signup_css.css">
    <link rel="stylesheet" href="../addons/bootstrap.min.css" >

    <!-- Font Icon -->
    <link rel="stylesheet" href="../addons/fontawesome/css/all.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css and js/signup_style.css">
    <!-- <link rel="stylesheet" href="../css and js/request.css"> -->
     
    <script src="../addons/jquery-3.4.1.min.js"></script>

</head>
<body style="background:white;">
 <!-- header section-->
 <div class="header bg-light" style="border-bottom: 1px solid black;">
    <div class="inside_header" style="font-size: 16px;font-family: Arial, Helvetica, sans-serif;">
    
    
    <div class="left_container">
    <a ><img src="../images/LOGO.png" width="90px" style="height: 70px;"></a>
    <a class="pl-3" href="../index.html">GoNoWhere!</a>
    <a class="pl-3" href="./about_us.html">About Us</a>
    
    </div>
    
  <div class="right_container row align-items-center m-0 ">

<?PHP
    if (isset($_SESSION['uid'])&&($_SESSION['cs'])==1) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `client-register` WHERE `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      
      echo"<a class=\"px-3\"> welcome ".$data['username']." </a>";
      echo'  <a  ><img src="../dataimages/client/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; " onclick="slidemenu()"></a>';
    
    
    }
    elseif (isset($_SESSION['uid'])&&($_SESSION['cs'])==2) {
      $id=intval($_SESSION['uid']);
      $sql="SELECT * FROM `service-provider` WHERE  `id`=\"".$id."\";";
      $run=mysqli_query($con,$sql);
        $data=mysqli_fetch_assoc($run);
      echo"<a class=\"px-3\"> welcome ".$data['name']." </a>";   
      echo'  <a  href="./pages/signup_form.php"><img src="../dataimages/service_provider/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; "></a>';
   
    
      }else{
      echo"<a class=\"px-3\" href=\"./pages/signup_form.php\"> Login/Sign Up </a>";
      echo'  <a  href="./pages/signup_form.php"><img src="../images/image1.jpg" style="width:50px; height:50px;border-radius:50px; "></a>      ';
    }



?>

  
  </div>
    
    </div>
    </div>
  
    <!-- header section ends-->



<!-- Hero section start -->
<section class=" " style="margin-top:25px;">
		<div class="container-fluid" >
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row mx-5" >
						<div class="col-md-6 p-4" style="background:rgba(0,0,0,0.2);">
							<div class="">
                                <h3><?php 
                                    $id=intval($_POST['req']);
                                    $sql="SELECT * FROM `service-provider` WHERE  `id`=\"".$id."\";";
                                    $run=mysqli_query($con,$sql);
                                    $data=mysqli_fetch_assoc($run);
                                echo ucwords($data['name']);?></h3>
							</div>
							<div class="hero-info">
								<h5>General Info</h5>
								<ul>
									<li>E-Mail=<p><?php echo $data['email'];?></p></li>
									<li>Phone No.<p><?php echo $data['phone'];?></p></li>
									<li>Occupation<p><?php echo ucwords($data['work']);?></p></li>
									<li>Locality<p><?php echo ucwords($data['loaclity']);?> </p></li>
									<li>Hourly Wage<p><?php echo $data['hourly-wage'];?> </p></li>
								</ul>
                            </div>
                            <form action="./request.php" method="post">
                            <br><input type="text" name="work" id="" placeholder="Your Work Description" required>
                            <br><input type="number" name="price" id="" placeholder="Enter Your Price" required>
                            <br><input type="date" name="date" id="" placeholder="Select Date Of Booking" min="<?php echo date("Y-m-d"); ?>" max="<?PHP $date = date("Y-m-d", strtotime("+7 days"));echo $date;?>" required>
                            <ul>
                            <li><p style="color:black;">Price can be negotiated over phone.</p></li>
                            <li><p style="color:black;">you should pay the negotiated amout to the service provider.we are in no manner to be interfared</p></li>
                            </ul>
                            <input type="hidden" name="req" value="<?php echo $_POST['req'];?>">
                            <input type="submit" value="submit" name="servicesubmit" class="btn btn-primary">
                            </form>
						</div>
						<div class="col-md-6 p-4" style="background:rgba(0,0,0,0.2);">
							<figure class="hero-image">
                    
								<img src="../dataimages/service_provider/<?PHP echo $data["image"];?>" style="border-radius:150px;height:300px;width:300px;">
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

  <?php
if (isset($_POST["servicesubmit"])) {
$cid=intval($_SESSION['uid']);
$sid=intval($_POST['req']);
$workdesc=$_POST['work'];
$date=$_POST['date'];
$price=intval($_POST['price']);

// $imagename=$_FILES['image']['name'];
// $tempname=$_FILES['image']['tmp_name'];

// move_uploaded_file($tempname,"../dataimages/service_provider/$imagename");

$qry="INSERT INTO `request`( `cid`, `sid`, `workdesc`, `price`, `date`) VALUES (\"".$cid."\",\"".$sid."\",\"".$workdesc."\",\"".$price."\",\"".$date."\");";

$run=mysqli_query($con,$qry);

if ($run) {
  include ( "../addons/otp/NexmoMessage.php" );

  $ph='+91'.$data['phone'];
  $message=$data['name'].'You have got a new request';
  // Step 1: Declare new NexmoMessage.
    $nexmo_sms = new NexmoMessage('ef07306d', 'uQqQki8FuRo3tSPG');
  // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
   $info = $nexmo_sms->sendText($ph, 'GoNoWhere!', $message);
    ?>
    <script>
    alert("Request Successfull ");
    window.history.go(-2);
        </script>
    
    
    <?PHP

    }
    else{
        ?>
        
        <script>
        alert("error");
        </script>
        
        
        <?PHP
    
    }
}
    ?>





</body>
</html>