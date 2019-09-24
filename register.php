<?php
  error_reporting(E_ALL & ~E_NOTICE);
  require 'conn.php';

  // $email = "";
  // $password = "";
  $result = '';

  // if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone'])){

        $flag = 0;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $query = "SELECT email FROM user where email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->store_result();

        $ereg = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";

        $preg = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})^";
        $phreg = "/^[6-9]\d{9}$/";
        

          if($stmt->num_rows != 0){
            $flag++;
            $result = "<div class='form-group'>
                    <h6 class='font-weight-light' style='color : red'>This email is already registered</h6>
                  </div><br>";
          }
          if (!preg_match($ereg, $email)) {
            $flag++;
            $result = $result."<div class='form-group'>
                    <h6 class='font-weight-light' style='color : red'>Please enter a valid email address</h6>
                  </div><br>";
          }
          if (!preg_match($preg, $password)) {
        // die("HII");
            $flag++;
            $result = $result."<div class='form-group'>
                    <h6 class='font-weight-light' style='color : red'>Password must contain at least 1 lowercase, 1 uppercase letter and numeric and special symbols and must be of minimum 8 characters long.</h6>
                  </div><br>";
          }

          if (!preg_match($phreg, $phone)) {
            $flag++;
            $result = $result."<div class='form-group'>
                    <h6 class='font-weight-light' style='color : red'>Please enter a valid Mobile Number</h6>
                  </div><br>";
          }
        
        if($flag === 0){
            $query1 = "INSERT INTO user (name, email, password, phoneNo) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query1);
            $stmt->bind_param("ssss", $name, $email, $password, $phone);
            $stmt->execute();

            header("location: index.php");

        }
        else{

        }
}
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
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
                <!-- <img src="../../images/logo.svg" alt="logo"> -->
                <h2>P.A.N.U.</h2>
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                  <i class="ti-user text-primary"></i>
                    </span>
                  <input type="text" class="form-control form-control-lg border-left-0" id="name" name="name" placeholder="Name" value="<?php echo $_POST['name']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                  <i class="ti-email text-primary"></i>
                    </span>
                  <input type="email" class="form-control form-control-lg border-left-0" id="email" name="email" placeholder="Email" value="<?php echo $_POST['email']; ?>" >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                  <i class="ti-lock text-primary"></i>
                    </span>
                  <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" placeholder="Password">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                  <i class="ti-mobile text-primary"></i>
                    </span>
                  <input type="text" class="form-control form-control-lg border-left-0" id="phone" name="phone" placeholder="Contact No" value="<?php echo $_POST['phone']; ?>" maxlength="10" >
                  
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <!-- <span class="input-group-text bg-transparent border-right-0"> -->
                  <!-- <i class="ti-mobile text-primary"></i> -->
                    <!-- </span> -->
                  <!-- <input type="text" class="form-control form-control-lg border-left-0" id="phone" name="phone" placeholder="Contact No"> -->
                  
                    </div>
                  </div>
                </div>
                    <?php echo $result; ?>
                <!-- <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div> -->
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
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
