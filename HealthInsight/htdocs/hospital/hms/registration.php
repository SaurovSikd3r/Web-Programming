<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	//header('location:user-login.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

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

        .form-login input[type="text"], 
        .form-login input[type="password"], 
        .form-login input[type="email"] {
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
            <h2>User Registration</h2>
        </div>

        <div class="box-login">
            <form class="form-login" method="post" name="registration" id="registration" onSubmit="return valid();">
                <fieldset>
                    <legend>Create a New Account</legend>
                    <p>Please fill in the details below to create an account.</p>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="address" placeholder="Address" required>
                            <i class="fa fa-map-marker"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="city" placeholder="City" required>
                            <i class="fa fa-building"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="block">Gender</label>
                        <div class="clip-radio radio-primary">
                            <input type="radio" id="rg-female" name="gender" value="female">
                            <label for="rg-female">Female</label>
                            <input type="radio" id="rg-male" name="gender" value="male">
                            <label for="rg-male">Male</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="phone number" class="form-control" name="phone number" placeholder="Phone Number" required>
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="password" class="form-control" name="password_again" placeholder="Confirm Password" required>
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div class="form-actions">
                        <p>Already have an account? <a href="user-login.php">Log in</a></p>
                        <button type="submit" class="btn btn-primary pull-right" name="submit">Register <i class="fa fa-arrow-circle-right"></i></button>
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

        function valid() {
            if (document.registration.password.value != document.registration.password_again.value) {
                alert("Password and Confirm Password do not match!");
                document.registration.password_again.focus();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>