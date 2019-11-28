<?php
  // session_start();
  require 'conn.php';

  @$email = "";
  @$password = "";
  $result = '';

  // if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['email'], $_POST['password'])){
        // echo "HII";
        
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $query = "SELECT userId, email, password FROM user where email = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        // $stmt->store_result();
        $res1 = $stmt->get_result();
        $row = $res1->fetch_assoc();
        if($res1->num_rows === 0){
          $result = "<div class='form-group'>
                  <h6 class='font-weight-light' style='color : red'>Incorrect email or password</h6>
                </div>";
        }
        else{
            $_SESSION['uid'] = $row['userId'];
            // die("HI");
            header("location: index.php");
        }
}
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h2>PANU</h2><!-- <img src="images/logo.svg" alt="logo"> -->
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" action="">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div>
                  <?php echo $result; ?>
                  
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      
                    </label>
                  </div>

                </div>
                <div  class="text-center mt-4 font-weight-light">
                  <a href="fgpwd.php"><label>Forgot password?</label></a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
