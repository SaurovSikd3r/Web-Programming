<?php
session_start();
include("include/config.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$dpassword=md5($_POST['password']);	
$ret=mysqli_query($con,"SELECT * FROM doctors WHERE docEmail='$uname' and password='$dpassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uid=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
//Code Logs
$log=mysqli_query($con,"insert into doctorslog(uid,username,userip,status) values('$uid','$uname','$uip','$status')");

header("location:dashboard.php");
}
else
{

$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into doctorslog(username,userip,status) values('$uname','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
header("location:index.php");

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>

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

        .form-login input[type="text"], .form-login input[type="password"] {
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

        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body class="login">
    <div class="main-login">
        <div class="logo">
            <a href="../../index.php">
                <h2>PHI | Doctor Login</h2>
            </a>
        </div>

        <div class="box-login">
            <form class="form-login" method="post">
                <fieldset>
                    <legend>Sign in to your account</legend>
                    <p>Please enter your username and password to log in.</p>
                    <span class="error-message">
                        <?php echo $_SESSION['errmsg']; ?>
                        <?php echo $_SESSION['errmsg'] = ""; ?>
                    </span>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <i class="fa fa-lock"></i>
                        </span>
                        <a href="forgot-password.php">Forgot Password?</a>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary pull-right" name="submit">
                            Login <i class="fa fa-arrow-circle-right"></i>
                        </button>
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
