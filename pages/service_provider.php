<?php
session_start();
if (!(isset($_SESSION['uid'])&&($_SESSION['cs']==2))) {
    header("location:../index.php");
  }
include("./dbcon.php"); 
include ( "../addons/otp/NexmoMessage.php" );

if (isset($_POST["accept"])) {
  $sql="UPDATE `request` SET `accepted`=\"active\" WHERE `id`=".$_POST["id1"].";";
  $run=mysqli_query($con,$sql);

  $ph='+91'.$_POST['phone'];
  $message=$_POST["uname"].'Your request has been accepted.';
  // Step 1: Declare new NexmoMessage.
 $nexmo_sms = new NexmoMessage('ef07306d', 'uQqQki8FuRo3tSPG');
  // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
 $info = $nexmo_sms->sendText($ph, 'GoNoWhere!', $message);

  ?><script>window.history.go(-1);  </script><?PHP

}elseif (isset($_POST["decline"])) {
  $sql="UPDATE `request` SET `accepted`=\"declined\" WHERE `id`=".$_POST["id1"].";";
  $run=mysqli_query($con,$sql);
  ?><script>window.history.go(-1);  </script><?PHP

  $ph='+91'.$_POST['phone'];
  $message=$_POST["uname"].'Your request has been declined.' ;
  // Step 1: Declare new NexmoMessage.
 $nexmo_sms = new NexmoMessage('ef07306d', 'uQqQki8FuRo3tSPG');
  // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
 $info = $nexmo_sms->sendText($ph, 'GoNoWhere!', $message);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Professional</title>
    <link rel="shortcut icon" href="../images/LOGO.PNG" type="image/x-icon">


    <link rel="stylesheet" href="../css and js/signup_css.css">
    <link rel="stylesheet" href="../addons/bootstrap.min.css" >

    <!-- Font Icon -->
    <link rel="stylesheet" href="../addons/fontawesome/css/all.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css and js/services_provider_css.css">
     

    
</head>
<body>
 <!-- header section-->
 <div class="header bg-light" style="border-bottom: 1px solid black;">
    <div class="inside_header" style="font-size: 16px;font-family: Arial, Helvetica, sans-serif; ">
    
    
    <div class="left_container">
    <a href="../index.php"><img src="../images/LOGO.png" width="90px" style="height: 70px;"></a>
    <a class="pl-3" href="../index.php">GoNoWhere!</a>
    <a class="pl-3" href="./about_us.php">About Us</a>
    
    </div>
    
      
  <div class="right_container row align-items-center m-0 ">
      <?php
         $id=intval($_SESSION['uid']);
         $sql="SELECT * FROM `service-provider` WHERE  `id`=\"".$id."\";";
         $run=mysqli_query($con,$sql);
         $data=mysqli_fetch_assoc($run);
         echo"<a class=\"px-3\"  style=\"font-weight:600;\">Welcome ".ucwords($data['name'])." </a>";   
         echo'  <a><img src="../dataimages/service_provider/'.$data["image"].'" style="width:50px; height:50px;border-radius:50px; "></a>';
      
      ?>
    </div>
 



    </div>
    </div>
  
    <!-- header section ends-->


<div class="d-flex" id="all" style="height:100%">
    <!-- slider menu -->
    <div class=" p-3" id="slider" style="text-align: center;height:90vh;position:sticky;background: rgba(0, 0, 0,0.9);">
            <img src="../dataimages/service_provider/<?php echo ucwords($data['image']);?>" style="width:100px; height:100px;border-radius:50%; " class="m-3"  onclick="slide()">
       <h2 align="center" style="color:white;"><?php echo ucwords($data['name']);?></h2>
        <button class="px-3 btn btn-primary w-100 mt-3" onclick="showrequest()"><i class="fas fa-briefcase"></i> Rquests </button>
        <button class="px-3 btn btn-primary w-100 mt-3" onclick="showactive()"><i class="fas fa-list-ul"></i> Active </button>
        <button class="px-3 btn btn-primary w-100 mt-3" onclick="showhistory()"><i class="fas fa-history"></i> History </button>
        <button class="px-3 btn btn-primary w-100 mt-3" onclick="showeditprofile()"><i class="fas fa-edit"></i> Edit Profile </button>
        <button class="px-3 btn btn-primary w-100 mt-3" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout </button>

        </div>
   <!-- slider menu -->
   
   
   
       <!-- request div-->
   <div id="requestdiv">
   <h2 class="my-3 mx-3">Request Available</h2>
   <table id="requests" class="mx-3 table"  >
   <thead class="thead-dark">
   <tr >
   <th class="py-2 px-2" scope="col">Sr. No.</th>
   <th class="py-2 px-2" scope="col">Request From</th>
   <th class="py-2 px-2" scope="col">Address</th>
   <th class="py-2 px-2" scope="col">Request Description</th>
   <th class="py-2 px-2" scope="col">Job Date</th>
   <th class="py-2 px-2" scope="col">Payment</th>
   <th class="py-2 px-2" scope="col">Phone No.</th>
   <th class="py-2 px-2" scope="col">Accept/Reject</th>
  </tr>
</thread>
<?php
       $sql="SELECT * FROM `request` WHERE `sid`=\"".$_SESSION['uid']."\" AND `accepted`=\"pending\" ORDER BY `id` DESC";

 $run=mysqli_query($con,$sql);

if (mysqli_num_rows($run)<1) {
echo"<tr ><td colspan=7><h4 align=center>No New Request Available</h4></td></tr>";
}else {

   $i=0;
 while (($data=mysqli_fetch_assoc($run))) {
   $i++;
   $sql1="SELECT * FROM `client-register` WHERE `id`=\"".$data["cid"]."\"";
   $run1=mysqli_query($con,$sql1);
   $data1=mysqli_fetch_assoc($run1);

   echo("<tr>");
   echo("   <td class=\"py-3 px-2 \" scope=\"row\" >$i</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["username"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data1["address"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data["workdesc"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["date"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["price"]."</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["phone"]."</td>");
   if ($data["accepted"]=="pending") {
?>
<td class="py-1 px-2" style="text-align:center;">
<form method="post" action="./service_provider.php"> <input type="hidden" name="id1" value="<?php echo $data["id"];?>"><input type="hidden" name="phone" value="<?php echo $data1["phone"];?>"><input type="hidden" name="uname" value="<?php echo $data1["username"];?>"><button class="btn btn-danger my-1 mx-1 px-3" name="decline"><i class="fas fa-trash-alt"></i></button></form>
<form method="post" action="./service_provider.php"> <input type="hidden" name="id1" value="<?php echo $data["id"];?>"><input type="hidden" name="phone" value="<?php echo $data1["phone"];?>"><input type="hidden" name="uname" value="<?php echo $data1["username"];?>"><button class="btn btn-success my-1 mx-1 px-3" name="accept"><i class="fas fa-check-square"></i></button></form>
   </td>
<?php
  } else {
    echo("   <td class=\"py-1 px-2\">".$data["accepted"]."</td>");
  }
   
   echo("</tr>");

 }
  }
        ?>
   </table>
   </div>
       <!-- request div -->
	   
	   
	   <!-- active div-->
   <div style="display:none;" id="activediv">
   <h2 class="my-3 mx-5">Accepted Requests</h2>
   <table id="requests" class="mx-5 table"  >
   <thead class="thead-dark">
   <tr >
   <th class="py-2 px-2" scope="col">Sr. No.</th>
   <th class="py-2 px-2" scope="col">Request From</th>
   <th class="py-2 px-2" scope="col">Address</th>
   <th class="py-2 px-2" scope="col">Request Description</th>
   <th class="py-2 px-2" scope="col">Job Date</th>
   <th class="py-2 px-2" scope="col">Payment</th>
   <th class="py-2 px-2" scope="col">Phone No.</th>
   <th class="py-2 px-2" scope="col">Accept/Reject</th>
  </tr>
</thread>
<?php
       $sql="SELECT * FROM `request` WHERE `sid`=\"".$_SESSION['uid']."\" AND (`accepted`=\"active\") ORDER BY `id` DESC";

 $run=mysqli_query($con,$sql);

if (mysqli_num_rows($run)<1) {
echo"<tr ><td colspan=7><h4 align=center>No New Request Available</h4></td></tr>";
}else {

   $i=0;
 while (($data=mysqli_fetch_assoc($run))) {
   $i++;
   $sql1="SELECT * FROM `client-register` WHERE `id`=\"".$data["cid"]."\"";
   $run1=mysqli_query($con,$sql1);
   $data1=mysqli_fetch_assoc($run1);

   echo("<tr>");
   echo("   <td class=\"py-3 px-2 \" scope=\"row\" >$i</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["username"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data1["address"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data["workdesc"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["date"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["price"]."</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["phone"]."</td>");
  echo("   <td class=\"py-1 px-2\"><p class=\"bg-primary p-1\">".$data["accepted"]."</p></td>");
  }
   
   echo("</tr>");

 }
        ?>
   </table>
   </div>
       <!-- active div ends -->

	   
	 <!-- history div-->
   <div style="display:none;"id="historydiv">
   <h2 class="my-3 mx-5">History</h2>
   <table id="requests" class="mx-5 table"  >
   <thead class="thead-dark">
   <tr >
   <th class="py-2 px-2" scope="col">Sr. No.</th>
   <th class="py-2 px-2" scope="col">Request From</th>
   <th class="py-2 px-2" scope="col">Address</th>
   <th class="py-2 px-2" scope="col">Request Description</th>
   <th class="py-2 px-2" scope="col">Date</th>
   <th class="py-2 px-2" scope="col">Payment</th>
   <th class="py-2 px-2" scope="col">Phone No.</th>
   <th class="py-2 px-2" scope="col">Accept/Reject</th>
  </tr>
</thread>
<?php
       $sql="SELECT * FROM `request` WHERE (`sid`=\"".$_SESSION['uid']."\" AND NOT `accepted`=\"pending\") ORDER BY `id` DESC";

 $run=mysqli_query($con,$sql);

if (mysqli_num_rows($run)<1) {
echo"<tr ><td colspan=7><h4 align=center>No New Request Available</h4></td></tr>";
}else {

   $i=0;
 while (($data=mysqli_fetch_assoc($run))) {
   $i++;
   $sql1="SELECT * FROM `client-register` WHERE `id`=\"".$data["cid"]."\"";
   $run1=mysqli_query($con,$sql1);
   $data1=mysqli_fetch_assoc($run1);

   echo("<tr>");
   echo("   <td class=\"py-3 px-2 \" scope=\"row\" >$i</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["username"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data1["address"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data["workdesc"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["date"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["price"]."</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["phone"]."</td>");
   if ($data["accepted"]=="pending") {
?>
<td class="py-1 px-2" style="text-align:center;">
  <button onclick="accept()" class="btn btn-success my-1 mx-1 px-3"><i class="fas fa-trash-alt"></i></button>
  <button onclick="decline()" class="btn btn-danger my-1 mx-1 px-3"><i class="fas fa-check-square"></i></button>
   </td>
<?php
  } else {
    if ($data["accepted"]=="declined") {
      echo("   <td class=\"py-1 px-2\"><p class=\"bg-danger p-1\">".$data["accepted"]."</p></td>");
    }elseif ($data["accepted"]=="active") {
      echo("   <td class=\"py-1 px-2\"><p class=\"bg-primary p-1\">".$data["accepted"]."</p></td>");
    }elseif ($data["accepted"]=="completed") {
      echo("   <td class=\"py-1 px-2\"><p class=\"bg-success p-1\">".$data["accepted"]."</p></td>");
    }
  }
   
   echo("</tr>");

 }
  }
        ?>
   </table>
   </div>
       <!-- history div ends-->  
	   
	   
	   
   <div>
   
   


   <script src="../addons/jquery-3.4.1.min.js"></script>
<script>
var a=$(document).height();;
var b=(a-70)+"px";

document.getElementById("all").style.height=b;

    function showrequest() {
$("#requestdiv").show();
 $("#activediv").hide();       
 $("#editprofilediv").hide(); 
  $("#historydiv").hide(); 
    }
	 function showactive() {
$("#requestdiv").hide();
 $("#activediv").show();       
 $("#editprofilediv").hide(); 
  $("#historydiv").hide(); 
    }
	 function showeditprofile() {
window.location="./edit_profile.php"; 
    }
	 function showhistory() {
$("#requestdiv").hide();
 $("#activediv").hide();       
 $("#editprofilediv").hide(); 
  $("#historydiv").show(); 
    }

    function logout(){
      window.location="./logout.php";
    }
</script>

    </body>
    </html>