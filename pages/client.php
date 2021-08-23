<?php
session_start();
if (!(isset($_SESSION['uid'])&&($_SESSION['cs']==1))) {
    header("location:../index.php");
  }
include("./dbcon.php"); 

if (isset($_POST["complete"])) {
  $sql="INSERT INTO `feedback`(`cid`, `sid`, `comment`, `rating`) VALUES (\"".$_SESSION['uid']."\",\"".$_POST["sid1"]."\",\"".$_POST["comment"]."\",\"".$_POST["rating"]."\");";
  $run=mysqli_query($con,$sql);


    $sql="UPDATE `request` SET `accepted`=\"completed\" WHERE `id`=".$_POST["id1"].";";
    $run=mysqli_query($con,$sql);


    $sql="SELECT * FROM `feedback` WHERE `sid`=".$_POST["sid1"].";";
    $run=mysqli_query($con,$sql);
    $rows = mysqli_num_rows($run);



    $sql="UPDATE `service-provider` SET `rating`=\"".(($_POST["overallrating"]*5 +$_POST["rating"])/($rows+1))."\" WHERE `id`=".$_POST["sid1"].";";
    $run=mysqli_query($con,$sql);
    $sql="UPDATE `service-provider` SET `serviceprovided`=\"".$rows."\" WHERE `id`=".$_POST["sid1"].";";
    $run=mysqli_query($con,$sql);
    ?><script>window.history.go(-1);</script><?PHP

}elseif (isset($_POST["cancel"])) {
    $sql="DELETE FROM `request` WHERE `id`=".$_POST["id1"].";";
    $run=mysqli_query($con,$sql);
    ?><script>window.history.go(-1);</script><?PHP

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
     
<!-- jquery -->
<script src="../addons/jquery-3.4.1.min.js"></script>

<!-- poppper.js  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



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

    </div>
    </div>
  
    <!-- header section ends-->

    <?php
         $id=intval($_SESSION['uid']);
         $sql="SELECT * FROM `client-register` WHERE  `id`=\"".$id."\";";
         $run=mysqli_query($con,$sql);
         $data=mysqli_fetch_assoc($run);
      ?>



<div class="d-flex" id="all" style="height:100%">
    <!-- slider menu -->
    <div class=" p-3 mr-4" id="slider" style="text-align: center;height:90vh;position:sticky;background: rgba(0, 0, 0,0.9);" >
            <img src="../dataimages/client/<?php echo $data["image"];?>" style="width:100px; height:100px;border-radius:50%; " class="m-3"  onclick="slide()">
       <h2 align="center" style="color:white;"><?php echo ucwords($data['username']);?></h2>
        <button class="px-3 btn btn-primary w-100 mt-3" onclick="showrequest()"><i class="fas fa-briefcase"></i> Rquested </button>
        <button class="px-3 btn btn-success w-100 mt-3" onclick="showhistory()"><i class="fas fa-history"></i> History </button>
        <button class="px-3 btn btn-warning w-100 mt-3" onclick="showeditprofile()"><i class="fas fa-edit"></i> Edit Profile </button>
        <button class="px-3 btn btn-danger w-100 mt-3" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout </button>

        </div>
   <!-- slider menu -->
   
   
   
       <!-- request div-->
   <div id="requestdiv">
   <h2 class="my-3 mx-3">Requested</h2>
   <table id="requests" class="mx-3 table"  >
   <thead class="thead-dark">
   <tr >
   <th class="py-2 px-2" scope="col">Sr. No.</th>
   <th class="py-2 px-2" scope="col">Request to</th>
   <!-- <th class="py-2 px-2" scope="col">Address</th> -->
   <th class="py-2 px-2" scope="col">Request Description</th>
   <th class="py-2 px-2" scope="col">Payment</th>
   <th class="py-2 px-2" scope="col">Phone No.</th>
   <th class="py-2 px-2" scope="col">Accepted/Rejected</th>
   <th class="py-2 px-2" scope="col">Complete</th>
  </tr>
</thread>
<?php
       $sql="SELECT * FROM `request` WHERE `cid`=\"".$_SESSION['uid']."\" AND (`accepted`=\"pending\" OR `accepted`=\"active\") ORDER BY `id` DESC";

 $run=mysqli_query($con,$sql);

if (mysqli_num_rows($run)<1) {
echo"<tr ><td colspan=8><a href=\"./service_providers.php\"><h4 align=center>Not Requested Any Yet!</h4></a></td></tr>";
}else {

   $i=0;
 while (($data=mysqli_fetch_assoc($run))) {
   $i++;
   $sql1="SELECT * FROM `service-provider` WHERE `id`=\"".$data["sid"]."\"";
   $run1=mysqli_query($con,$sql1);
   $data1=mysqli_fetch_assoc($run1);
    if ($data["accepted"]=="pending") {
        $bgcolor="bg-warning";
    } elseif($data["accepted"]=="active"){
        $bgcolor="bg-primary";
   }
   echo("<tr class=\"".$bgcolor."\">");
   echo("   <td class=\"py-3 px-2 \" scope=\"row\" >$i</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["name"]."</td>");
  //  echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data1["address"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data["workdesc"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["price"]."</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["phone"]."</td>");
   echo("   <td class=\"py-3 px-2\">".$data["accepted"]."</td>");
if ($data["accepted"]=="active") {
    echo("   <td class=\"pt-3 px-2\"> <button type=\"button\" class=\"btn btn-success w-100  m-1\" data-toggle=\"modal\" data-target=\"#myModal\">Completed</button></td>");
  echo '  <div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    
  <div class="modal-content">
  <form method="post" action="./client.php">
  <input type="hidden" name="id1" value="'.$data["id"].'">
  <input type="hidden" name="sid1" value="'.$data["sid"].'">
  <input type="hidden" name="overallrating" value="'.$data1["rating"].'">
      <div class="modal-header">
        <h4 class="modal-title">Rate '.ucwords($data1["name"]).'</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <div class="modal-body">
      <div class="slidecontainer" align="center">
      <input type="range" name="rating" min="1" max="5" value="3" class="slider" id="myRange" required ><br>
      <i class="far fa-angry fa-2x r" id="1"></i>
      <i class="far fa-frown-open fa-2x r" id="2"></i>
      <i class="far fa-meh fa-2x r" id="3"></i>
      <i class="far fa-smile fa-2x r" id="4"></i>
      <i class="far fa-laugh-beam fa-2x r" id="5"></i>
      <p id="rat">please rate through slider</p>
      <textarea rows="4" cols="50" name="comment" maxlength="200" style=" resize:none;" placeholder="Write Your Comment Here!"></textarea>
      </div>
      </div>
      
      <div class="modal-footer">
      <button class="btn btn-success m-1 w-100 complete"  name="complete">Completed</button>
      </div>
      
      </form>
    </div>
  </div>
</div>
';
  
   } elseif($data["accepted"]=="pending") {
    echo("   <td class=\"pt-3 px-2\"> <form method=\"post\" action=\"./client.php\" onsubmit=\"return confirm(\"Cancel the Request?\");\"><input type=\"hidden\" name=\"id1\" value=\"".$data["id"]."\"> <button class=\"btn btn-danger m-1 w-100 cancel\"  name=\"cancel\">Cancel</button></form></td>");
}

   
   echo("</tr>");

 }
  }
        ?>
   </table>
   </div>
       <!-- request div -->
	   

<!-- modal section -->


  <!-- The Modal -->
  <!-- <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        //Modal Header
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        //Modal body
        <div class="modal-body">
          Modal body..
        </div>
        
        //Modal footer
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div> -->
  
<!-- modal section ends-->









	   
	 <!-- history div-->
   <div style="display:none;"id="historydiv">
   <h2 class="my-3 mx-3">History</h2>
   <table id="requests" class="mx-3 table"  >
   <thead class="thead-dark">
   <tr >
   <th class="py-2 px-2" scope="col">Sr. No.</th>
   <th class="py-2 px-2" scope="col">Request to</th>
   <th class="py-2 px-2" scope="col">Address</th>
   <th class="py-2 px-2" scope="col">Request Description</th>
   <th class="py-2 px-2" scope="col">Payment</th>
   <th class="py-2 px-2" scope="col">Phone No.</th>
   <th class="py-2 px-2" scope="col">Accepted/Rejected</th>
  </tr>
    </thread>


   <?php
       $sql="SELECT * FROM `request` WHERE `cid`=\"".$_SESSION['uid']."\" ORDER BY `id` DESC";

 $run=mysqli_query($con,$sql);

if (mysqli_num_rows($run)<1) {
echo"<tr ><td colspan=7><a href=\"./service_providers.php\"><h4 align=center>Not Requested Any Yet!</h4></a></td></tr>";
}else {

   $i=0;
 while (($data=mysqli_fetch_assoc($run))) {
   $i++;
   $sql1="SELECT * FROM `client-register` WHERE `id`=\"".$data["cid"]."\"";
   $run1=mysqli_query($con,$sql1);
   $data1=mysqli_fetch_assoc($run1);
    if ($data["accepted"]=="pending") {
        $bgcolor="bg-warning";
    } elseif($data["accepted"]=="active"){
        $bgcolor="bg-primary";
   }elseif($data["accepted"]=="declined"){
        $bgcolor="bg-danger";
   }elseif($data["accepted"]=="completed"){
        $bgcolor="bg-success";
   }
   echo("<tr class=\"".$bgcolor."\">");
   echo("   <td class=\"py-3 px-2 \" scope=\"row\" >$i</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["username"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data1["address"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:250px;\">".$data["workdesc"]."</td>");
   echo("   <td class=\"py-3 px-2\" style=\"max-width:100px;\">".$data["price"]."</td>");
   echo("   <td class=\"py-3 px-2\">".$data1["phone"]."</td>");
   echo("   <td class=\"py-1 px-2\">".$data["accepted"]."</td>");
   
   echo("</tr>");

 }
  }
        ?>

   </table>
   </div>
       <!-- history div ends-->  
	   
	   
	   
   <div>


   <script>
   function showrequest() {
$("#requestdiv").show();
  $("#historydiv").hide(); 
    }

	 function showeditprofile() {
window.location="./edit_profile.php"; 
    }
	 function showhistory() {
$("#requestdiv").hide();
  $("#historydiv").show(); 
    }

    function logout(){
      window.location="./logout.php";
    }




// smily section
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");

slider.oninput = function() {
   
   if (this.value==1) {
    document.getElementById("rat").innerText = "Very Poor";
    document.getElementById("1").style.transform = "scale(1.5,1.5)";
    document.getElementById("1").style.background = "rgb(255,0,0)";
    document.getElementById("2").style.transform = "scale(1,1)" ;
    document.getElementById("2").style.background = "rgb(255,255,255)";
    document.getElementById("3").style.transform = "scale(1,1)" ;
    document.getElementById("3").style.background = "rgb(255,255,255)";
    document.getElementById("4").style.transform = "scale(1,1)" ;
    document.getElementById("4").style.background = "rgb(255,255,255)";
    document.getElementById("5").style.transform = "scale(1,1)" ;
    document.getElementById("5").style.background = "rgb(255,255,255)";
   }else if(this.value==2) {
    document.getElementById("rat").innerText = "Poor";
    document.getElementById("2").style.transform = "scale(1.5,1.5)";
    document.getElementById("2").style.background = "rgb(255,165,0)";
    document.getElementById("5").style.transform = "scale(1,1)" ;
    document.getElementById("5").style.background = "rgb(255,255,255)";
    document.getElementById("3").style.transform = "scale(1,1)" ;
    document.getElementById("3").style.background = "rgb(255,255,255)";
    document.getElementById("4").style.transform = "scale(1,1)" ;
    document.getElementById("4").style.background = "rgb(255,255,255)";
    document.getElementById("1").style.transform = "scale(1,1)" ;
    document.getElementById("1").style.background = "rgb(255,255,255)";
   }else if(this.value==3) {
    document.getElementById("rat").innerText = "Normal";
    document.getElementById("3").style.transform = "scale(1.5,1.5)";
    document.getElementById("3").style.background = "rgb(255,233,47)";
    document.getElementById("2").style.transform = "scale(1,1)" ;
    document.getElementById("2").style.background = "rgb(255,255,255)";
    document.getElementById("5").style.transform = "scale(1,1)" ;
    document.getElementById("5").style.background = "rgb(255,255,255)";
    document.getElementById("4").style.transform = "scale(1,1)" ;
    document.getElementById("4").style.background = "rgb(255,255,255)";
    document.getElementById("1").style.transform = "scale(1,1)" ;
    document.getElementById("1").style.background = "rgb(255,255,255)";
   }else if(this.value==4) {
    document.getElementById("rat").innerText = "Good";
    document.getElementById("4").style.transform = "scale(1.5,1.5)";
    document.getElementById("4").style.background = "rgb(173,255,47)";
    document.getElementById("2").style.transform = "scale(1,1)" ;
    document.getElementById("2").style.background = "rgb(255,255,255)";
    document.getElementById("3").style.transform = "scale(1,1)" ;
    document.getElementById("3").style.background = "rgb(255,255,255)";
    document.getElementById("5").style.transform = "scale(1,1)" ;
    document.getElementById("5").style.background = "rgb(255,255,255)";
    document.getElementById("1").style.transform = "scale(1,1)" ;
    document.getElementById("1").style.background = "rgb(255,255,255)";
   }else if(this.value==5) {
    document.getElementById("rat").innerText = "Very Good";
    document.getElementById("5").style.transform = "scale(1.5,1.5)";
    document.getElementById("5").style.background = "rgb(110,252,0)";
    document.getElementById("2").style.transform = "scale(1,1)" ;
    document.getElementById("2").style.background = "rgb(255,255,255)";
    document.getElementById("3").style.transform = "scale(1,1)" ;
    document.getElementById("3").style.background = "rgb(255,255,255)";
    document.getElementById("4").style.transform = "scale(1,1)" ;
    document.getElementById("4").style.background = "rgb(255,255,255)";
    document.getElementById("1").style.transform = "scale(1,1)" ;
    document.getElementById("1").style.background = "rgb(255,255,255)";
   }
}
// smily section eends

   </script>

   
</body>
</html>