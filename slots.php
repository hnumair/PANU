<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("location: login.php");
}
require 'conn.php';

$query = "select * from slots";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->store_result();
$result = $stmt->num_rows;
$stmt->bind_result($sid, $vacant);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>P.A.N.U</title>
<style type="text/css">
    :root{
      --color:#C06C84;
    }

    .mybtn {
  display: inline-flex;
  align-items: center;
  background: transparent;
  border: 4px solid;
  /* border-color: #C06C84; */
  box-shadow: 0 3px 2px 0 rgba(0,0,0,0.1);
  border-radius: 5px;
  height: 45px;
  padding: 0 30px;
  color: #fff;
  font-family: Lato, Arial, sans-serif;
  text-transform: uppercase;
  text-decoration: none;
  transition: background .3s, transform .3s, box-shadow .3s;
   will-change: transform;
   transition: all 0.3s ease-in-out;
   -webkit-transition: all 0.3s ease-in-out;
   -o-transition: all 0.3s ease-in-out;
}  
  .mybtn:hover {
    /*background: darken(#C06C84,10%);*/
    box-shadow: 0px 0px 10px var(--color);
    transform: translate3d(0, -2px, 0);
  }
  .mybtn:active {
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.1);
    transform: translate3d(0, 1px, 0);
  }


.pulse {
  position: relative;
  
  &:before, &:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,.4);
    border-radius: 50%;
    width: 20px;
    height: 20px;
    opacity: 0;
    margin: auto;
  }

  &:hover:before, &:hover:after {
    display: none;
  }
}


body {
  /*display:flex;*/
  /*align-items: center;*/
  /*justify-content: center;*/
  background: #272822;
}
</style>
 <script type="text/javascript">
    var count = 0;
    var butt2;
    function setColor(mybtn) {
        // var butt = document.getElementById('mybtn');
        // alert(mybtn);
        butt2 = mybtn;
        var butt = document.getElementById(mybtn);
        // alert(window.getComputedStyle(butt, null));

        if (butt.style.color == "rgb(52, 73, 94)") {
            
            butt.style.color = "#C06C84";
            butt.style.backgroundColor = "#ffffff00";
            butt.style.borderColor = "#C06C84";
            count--;        
        }
        else if(butt.style.color == "rgb(192, 108, 132)"){
        // alert(butt);  
        // alert(butt.style.color);
            count++;

            butt.setAttribute("hidden", "true");
            butt.style.color = "#34495e";
            butt.style.borderColor = "#34495e";
            butt.style.backgroundColor = "#34495e";
            butt.style.boxShadow = "0px 0px 10px #34495e";

        }
        // alert(count);
        if(count>1){
          document.getElementById('sbtn').disabled = true;
        }
        else{
          document.getElementById('sbtn').disabled = false;
        }
        document.getElementById('txt').innerHTML = butt2;
    }

    // function sendid(){
    //     // alert(butt2);
    //     window.location.href = "login.php?id="+butt2;

    // }

  </script>
  <?php

 ?>

  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/Logo.jpg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/Logo.jpg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          
           <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/17773.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="settings.php">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="slots.php">
              <i class="ti-car menu-icon"></i>
              <span class="menu-title">Slots</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="settings.php">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>

 </ul>
      </nav> 


      <!-- partial -->
     
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Slots</h4>
                </div>
                </div>
              </div>
            </div>
          
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div  class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <div id="targeto" name="targeto">
                    <!-- <button id="mybtn" class="mybtn"></button> -->
                    <!-- <button id="mybtn" class="mybtn"></button> -->
                    <!-- <button id="mybtn" class="mybtn"></button> -->
                    <!-- <button id="mybtn" class="mybtn"></button> -->
                    <!-- <button id = "yy" class="mybtn" onclick="setColor()"></button> -->
                    <form method="post" style="bottom: 0%;">
                      <p id = "txt" name="butt" hiddden = "true"></p>
                    <!-- <button id = "mybtn" class="btn" onclick="setColor()"></button> --> 
                 <script type="text/javascript">
                  var n = <?php echo $result; ?>;
                  var tar = document.getElementById(mybtn);
                  // alert(tar);
                  <?php
                    while($stmt->fetch()){


                  ?>
                    var vac = <?php echo $vacant; ?>;
                    var i = <?php echo $sid; ?>;
                    // document.writeln(i);
                    var mybtn = document.createElement("BUTTON");
                    mybtn.setAttribute("id","btn"+i);
                    mybtn.setAttribute("name","btn"+i);
                    mybtn.setAttribute("class","mybtn");
                    mybtn.setAttribute("onclick","setColor(id)");
                    if(vac == 1){
                      mybtn.style.color = "#C06C84";

                    }else{
                      mybtn.style.color = "#34495e";
                      mybtn.setAttribute("disabled","true");                      
                    }
                    // ("borderColor","red");
                    document.getElementById('targeto').appendChild(mybtn);
                  
                <?php }?>
                  // var count = 0;
                </script>
                    <input type = "submit" name="sbtn" id ="sbtn" value = "Submit" >                    
                    </form>

                                    <!-- <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3> -->
                    <!-- <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> -->
                  </div>
                  </div>   

                </div>
              </div>
            </div>
          </div>
          <div class="row">
          

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="index.php" target="_blank">P.A.N.U</a>. All rights reserved.</span>
<!--             <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->

  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

