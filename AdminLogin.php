<?PHP
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="shortcut icon" href="./images/LOGO.PNG" type="image/x-icon">



    <link rel="stylesheet" href="./addons/bootstrap.min.css" >
<style>
#overlay {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.7);
  z-index: -2;
  cursor: pointer;
}
</style>

  </head>
<body style="background: url(./admin-portal/background.jpg);  background-repeat: no-repeat;    background-size:100% 100%;height: 100vh;">
    
<!--  main html -->

<div id="overlay" >
</div>




<div class="d-flex justify-content-center pt-5  align-middle  w-100" >
  
   <h1 style="color: white;"> GoNoWhere! </h1>

   </div>
<div class="d-flex justify-content-center mt-3  align-middle  w-100">
<h4 style="color: white;">Welcome Admin</h4>
</div>

<div class="d-flex justify-content-center mt-5  align-middle">
<div class="card text-center shadow-lg p-3 mb-5 bg-white rounded w-auto" >
  <div>
    <form method="post" action="./AdminLogin.php">
      <!-- <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
      </div> -->
      <div class="form-group">
        <label><b> Enter Password</b></label>
        <input type="password" class="form-control" name="pass" placeholder="Password">
      </div>
      <!-- <div class="form-group">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="dropdownCheck">
          <label class="form-check-label" for="dropdownCheck">
            Remember me
          </label>
        </div>
      </div> -->
      <button type="submit" class="btn btn-primary" name="adminlogin">Sign in</button>
    </form>
    <div class="dropdown-divider"></div>
    
  </div>
  </div>
</div>


<!-- hvcjgckvcmvmcmcm -->
<?PHP
if(isset($_POST['adminlogin']))
{
if ($_POST["pass"]=="admin123") {
  $_SESSION["admin"]="logged in";
  echo "<script>location='./admin-portal/adminportal.php'</script>";
}
}

?>



</body>
</html>