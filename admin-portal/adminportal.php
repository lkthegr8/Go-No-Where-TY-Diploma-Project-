<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
      header("location:../AdminLogin.php");
    }
    include("../pages/dbcon.php");

?>

<?PHP
if (isset($_POST["accept"])) {
  $sql="UPDATE `service-provider` SET `admin-check`=1 WHERE `id`=".$_POST["id1"].";";
  $run=mysqli_query($con,$sql);
}elseif (isset($_POST["reject"])) {
  $sql="DELETE FROM `service-provider` WHERE `id`=".$_POST["id1"].";";
  $run=mysqli_query($con,$sql);
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../images/LOGO.PNG" type="image/x-icon">

   <title>ADMIN DASHBOARD</title> 

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../addons/bootstrap.min.css" >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./NEW_ADMIN.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../addons/fontawesome/css/all.min.css">
    <!-- Chartist -->
    <link rel="stylesheet" href="../addons/charts/chartist.min.css">
    <!-- jQuery -->
    <script src="../addons/jquery-3.4.1.min.js"></script>
    <!-- chartist -->
    <script src="../addons/charts/chartist.js"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
             <a href="">   <i class="fas fa-chart-bar fa-fw fa-4x"></i>   <h3> ADMIN DASHBOARD</h3></a>
            </div>

            <ul class="list-unstyled components">
                <p>&nbsp;&nbsp;Contents</p>
                <li class="active">
                    <a href="#homeSubmenu" onclick="overview()">&nbsp;&nbsp;  <i class="fas fa-home px-2"></i>OverView</a>
                </li>
                <li>
                    <a href="#" onclick="confirmation()">&nbsp;&nbsp; <i class="fas fa-users-cog px-2"></i> Confirmation</a>
                </li>
                <li>
                    <a href="#pageSubmenu" onclick="survey()">&nbsp;&nbsp;   <i class="fas fa-tv px-2"></i> Survey</a>
                   
                </li>
                <li>
                    <a href="#pageSubmenu" onclick="monitor()">&nbsp;&nbsp;   <i class="fas fa-tv px-2"></i> Monitor</a>
                   
                </li>
              
            </ul>

          
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                        <ul class="nav navbar-nav my-auto">
                            <li class="nav-item active">
                          
                                <a href="#" class="navbar-brand text-faded">&nbsp; &nbsp;
                                <a href="#"><img src="../images/LOGO.png" width="90px" height="70px"></a>

                                GoNoWhere!
                            </li>
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                           
                             <li class="nav-item" >
                                <a href="../pages/logout.php" class="nav-link btn btn-light px-2" >
                                    <i class="fas fa-sign-out-alt"></i>logout
                                    </a>
                             </li>
                
                        </ul>
                </div>
            </nav>
            


   <!--show on body-->





<!--
   confirmation  content
-->

<div class="card" id="con" style="display: none;">
  
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name List</th>
            <th scope="col" style="text-align:center;">Accept / Reject</th>
            <th scope="col">list info</th>
          </tr>
        </thead>
        <tbody>
        
        
        <?PHP
    $sql="SELECT * FROM `service-provider` WHERE `admin-check`=0";
    $run=mysqli_query($con,$sql);
    $i=1;
    while (($data=mysqli_fetch_assoc($run))) {
            echo '<tr>
            <th scope="row">'.$i.'</th>
            <td>'.$data["name"].'</td>
            <td align="center">
            <form method="post" action="./adminportal.php"> <input type="hidden" name="id1" value="'. $data["id"].'"><button class="btn btn-sm btn-success w-50" name="accept"><i class="far fa-edit"></i> Accept</button></form>
            <form method="post" action="./adminportal.php"> <input type="hidden" name="id1" value="'.$data["id"].'"><button class="btn btn-sm btn-danger w-50" name="reject"><i class="fas fa-trash-alt"></i> Reject</button></form>

                    
            </td>
            <td><form method="post" action="./"> <input type="hidden" name="id1" value="'.$data["id"].'"><button class="btn btn-sm btn-info" ><i class="fas fa-info-circle"></i> Details</button></form> </td>
            
          </tr>';
          $i++;
         }
        ?>


        </tbody>
      </table>
</div>

<!-- monitor moduule -->

<div class="card" id="monitor" style="display: none;">
  
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Request From</th>
            <th scope="col" style="text-align:center;">Request To</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        
        
        <?PHP
    $sql="SELECT * FROM `request` ORDER BY `id` DESC;";
    $run=mysqli_query($con,$sql);
    $i=1;
    while (($data=mysqli_fetch_assoc($run))) {
      $sql="SELECT * FROM `client-register` WHERE `id`=\"".$data["cid"]."\";";
      $run1=mysqli_query($con,$sql);
      $data1=mysqli_fetch_assoc($run1);
      $sql="SELECT * FROM `service-provider` WHERE `id`=\"".$data["sid"]."\";";
      $run2=mysqli_query($con,$sql);
      $data2=mysqli_fetch_assoc($run2);
            echo '<tr>
            <th scope="row">'.$i.'</th>
            <td>'.$data1["username"].'</td>
            <td align="center">'.$data2["name"].'</td>
            <td>'.$data["accepted"].'</td>
            
          </tr>';
          $i++;
         }
        ?>


        </tbody>
      </table>
</div>


<!-- hjbfghobsdfj -->
<?PHP
    $sql="SELECT * FROM `service-provider` WHERE `admin-check`=1;";
    $run=mysqli_query($con,$sql);
    $professionals= mysqli_num_rows($run);



    $sql="SELECT * FROM `client-register`;";
    $run=mysqli_query($con,$sql);
    $clients= mysqli_num_rows($run);





?>

<!-- survey div -->
<div id="survey" style="display: none;"> 
<div class="container bootstrap snippet my-5" >
    <div class="row">
      <div class="col-lg-5 col-sm-6">
        <div class="circle-tile ">
          <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
          <div class="circle-tile-content dark-blue">
            <div class="circle-tile-description text-faded"> Users</div>
            <div class="circle-tile-number text-faded "><?php echo $clients;?></div>
            <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div>
       
      <div class="col-lg-5 col-sm-6">
        <div class="circle-tile ">
          <a href="#"><div class="circle-tile-heading red"><i class="fas fa-user-tie fa-fw fa-3x"></i></div></a>
          <div class="circle-tile-content red">
            <div class="circle-tile-description text-faded"> Professionals </div>
            <div class="circle-tile-number text-faded "><?php echo $professionals ;?></div>
            <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div> 
    </div> 
  </div> 
</div>


<!-- survey div ends -->




<!-- overview div -->
<div id="overview" > 
<div class="container bootstrap snippet my-5" >
    <div class="row">


      <div class="col-lg-5 col-sm-6">
      <h4>Chart</h4>
        <div class="circle-tile ">
        <div class="ct-chart ct-perfect-fourth" id="chart1"></div>


          <script>
          var data = {
  // A labels array that can contain any sort of values
  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
  // Our series array that contains series objects or in this case series data arrays
  series: [
    [5, 2, 4, 2, 0]
  ]
};

// As options we currently only set a static size of 300x200 px. We can also omit this and use aspect ratio containers
// as you saw in the previous example
var options = {
  width: 300,
  height: 200
};

// Create a new line chart object where as first parameter we pass in a selector
// that is resolving to our chart container element. The Second parameter
// is the actual data object. As a third parameter we pass in our custom options.
new Chartist.Line('#chart1', data, options);
          
          
          </script>
        </div>
      </div>
       
      <div class="col-lg-5 col-sm-6">
        <h4>chart</h4>
        <div class="circle-tile ">
        <div class="ct-chart ct-perfect-fourth" id="chart2"></div>


        <script>
        var data = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    series: [
    [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
    [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
  ]
};

var options = {
  seriesBarDistance: 15
};

var responsiveOptions = [
  ['screen and (min-width: 641px) and (max-width: 1024px)', {
    seriesBarDistance: 10,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value;
      }
    }
  }],
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
      }
    }
  }]
];

new Chartist.Bar('#chart2', data, options, responsiveOptions);
        </script>
          </div>
        </div>











        <div class="col-lg-5 col-sm-6">
        <h4>chart</h4>
        <div class="circle-tile ">
        <div class="ct-chart ct-perfect-fourth" id="chart3"></div>


        <script>
        var chart = new Chartist.Pie('#chart3', {
  series: [10, 20, 50, 20, 5, 50, 15],
  labels: [1, 2, 3, 4, 5, 6, 7]
}, {
  donut: true,
  showLabel: false
});

chart.on('draw', function(data) {
  if(data.type === 'slice') {
    // Get the total path length in order to use for dash array animation
    var pathLength = data.element._node.getTotalLength();

    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
    data.element.attr({
      'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
    });

    // Create animation definition while also assigning an ID to the animation for later sync usage
    var animationDefinition = {
      'stroke-dashoffset': {
        id: 'anim' + data.index,
        dur: 1000,
        from: -pathLength + 'px',
        to:  '0px',
        easing: Chartist.Svg.Easing.easeOutQuint,
        // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
        fill: 'freeze'
      }
    };

    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
    if(data.index !== 0) {
      animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
    }

    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
    data.element.attr({
      'stroke-dashoffset': -pathLength + 'px'
    });

    // We can't use guided mode as the animations need to rely on setting begin manually
    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
    data.element.animate(animationDefinition, false);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 8 seconds
chart.on('created', function() {
  if(window.__anim21278907124) {
    clearTimeout(window.__anim21278907124);
    window.__anim21278907124 = null;
  }
  window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
});
        </script>
          </div>
        </div>






















      
    </div> 
  </div> 
</div>
<!-- overview div ends -->



























            
      
</div>   
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>



<script>


// function confirm()
// {
// var x=document.getElementById("dis");
// document.getElementById("monibox").style.display = "none";
// if (x.style.display === "none") {
//     x.style.display = "block";
//   } 
// }


// function moni()
// {
// var x=document.getElementById("monibox");
// document.getElementById("dis").style.display = "none";
// if (x.style.display === "none") {
//     x.style.display = "block";
//   } 
// }

function overview()
{
    $("#overview").show();
    $("#con").hide();
    $("#survey").hide();
    $("#monitor").hide();
}
function confirmation()
{
    $("#con").show();
    $("#survey").hide();
    $("#monitor").hide();
    $("#overview").hide();
}
function survey()
{
    $("#survey").show();
    $("#con").hide();
    $("#monitor").hide();
    $("#overview").hide();
}
function monitor()
{
    $("#monitor").show();
    $("#survey").hide();
    $("#con").hide();
    $("#overview").hide();
}




</script>
</html>