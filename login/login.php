<?php 
session_start();
 if(isset($_SESSION['username']))
{
	echo  "<script>alert('Successful account registration! '); </script>";
} 

require("../config/Database.php");
require("../models/model.php");
require("../models/userModel.php");

//User
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="pages/styles.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post">

                        <!-- username -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="username" name="username" class="form-control"
                                placeholder="Username">
                        </div>
                        <!-- /username -->

                        <!-- password -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="pass" class="form-control"
                                placeholder="Password">
                        </div>
                        <!-- /password -->

                        <div class="row align-items-center remember" id="ShowAndHide">
                            <i style="padding: 0px 10px 0px 25px;" class="fa fa-eye" onclick="ShowAndHide()"></i> Show
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                    <?php if(!empty($_POST['submit']))
				{
					if(isset($_POST['username']) && isset($_POST['password']))
					{
						$User = new User;
						$username = $_POST['username'];
					    $password = $_POST['password'];
					}
					$checkLogin = $User->checkLogin($username, $password);
					if($checkLogin)
					{
                        $_SESSION['role_idd']  =$checkLogin[0]['role_id'];
						$_SESSION['username'] = $username;
						if($checkLogin[0]['role_id'] == 1)	
						{
							$_SESSION['user']['username'] = $_POST['username'];
							$_SESSION['user']['user_id'] = $User->getIdByUsername($username);
							
						header("location: index.php");	
						}	
						else
						{
							
							$_SESSION['user']['username'] = $_POST['username'];
							$_SESSION['user']['user_id'] = $User->getIdByUsername($username);
							
							header("location: ../index.php");
						}													
					}
					else
					{
						echo "<p style='color: #fff; margin: 0;'><i style='padding-right: 5px;' class='fa fa-exclamation-circle'></i>Incorrect account or password</p>";
					}
				} ?>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="register.php">Register</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    var check = true;

    function ShowAndHide() {
        if (!check) {
            document.getElementById("pass").type = "password";
            document.getElementById("ShowAndHide").innerHTML =
                "<i style='padding: 0px 10px 0px 25px;' class='fa fa-eye' onclick='ShowAndHide()'></i>Show";
            check = true;
        } else {
            document.getElementById("pass").type = "text";
            document.getElementById("ShowAndHide").innerHTML =
                "<i style='padding: 0px 10px 0px 25px;' class='fa fa-eye-slash' onclick='ShowAndHide()'></i>Hide";
            check = false;
        }
    }
    </script>
</body>

</html>