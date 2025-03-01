<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
$contactno=$_POST['contactno'];
$email=$_POST['email'];
$query=mysqli_query($con,"select id from  doctors where contactno='$contactno' and docEmail='$email'");
$row=mysqli_num_rows($query);
if($row>0){

$_SESSION['cnumber']=$contactno;
$_SESSION['email']=$email;
header('location:reset-password.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Password Recovery</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Raleway:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color">

    <style>
        body.login {
            background: #f3f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Lato', sans-serif;
        }

        .main-login {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo h2 {
            font-weight: bold;
            color: #34495e;
        }

        .box-login {
            padding: 20px;
        }

        .form-login input[type="text"], .form-login input[type="email"] {
            border-radius: 50px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .form-actions button {
            background: #3498db;
            border: none;
            color: #fff;
            padding: 10px 25px;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .form-actions button:hover {
            background: #2980b9;
        }

        .copyright {
            text-align: center;
            color: #777;
            margin-top: 15px;
        }
    </style>
</head>
<body class="login">
    <div class="main-login">
        <div class="logo">
            <a href="../../index.php">
                <h2>PHI | Doctor Password Recovery</h2>
            </a>
        </div>

        <div class="box-login">
            <form class="form-login" method="post">
                <fieldset>
                    <legend>Doctor Password Recovery</legend>
                    <p>Please enter your contact number and email to recover your password.</p>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="contactno" placeholder="Registered Contact Number" required>
                            <i class="fa fa-phone"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="email" class="form-control" name="email" placeholder="Registered Email" required>
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary pull-right" name="submit">
                            Reset <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                    <div class="new-account">
                        Already have an account? 
                        <a href="index.php">Log-in</a>
                    </div>
                </fieldset>
            </form>
            <div class="copyright">
                &copy; <span class="text-bold text-uppercase">HealthInsight</span>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>
</body>
</html>