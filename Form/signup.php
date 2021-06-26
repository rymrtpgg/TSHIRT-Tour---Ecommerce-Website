<?php
 //    require_once('vendor/autoload.php');

	// $clientID = "716305721047-bqhs8stbfa0tp2j2l4alcmv62gaeejka.apps.googleusercontent.com";
	// $clientSecret = "I_AYXC7JW4SVh1q7By21gKPt";

	// $client = new Google_Client();
	// $client->setClientId($clientID);
	// $client->setClientSecret($clientSecret);
	// $client->setRedirectUri("http://localhost/TSHIRT-Tour---Ecommerce-Website/index.php");
	// $client->addScope('profile');
	// $client->addScope('email');

	// if(isset($_GET['code'])){

	// 	$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
	// 	$client->setAccessToken($token);

	// 	$auth = new Google_Service_Oauth2($client);

	// 	$google_info = $auth->userinfo->get();

	// 	$email = $google_info->email;

	// 	var_dump($email);exit;

	// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="../style/index.css">
	<!-- Start icon link -->
	<script src="https://kit.fontawesome.com/70196224ec.js" crossorigin="anonymous"></script>
	<!-End fontawsome link-  -->
	<!-- jQuery start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <!-- jQuery End -->

</head>
<body>

	<!-- Header Start -->
	<div class="navBx">
	    <div class="header">
	        <!-- Logo -->
	        <div class="logo">
	            <h1>Logo</h1>
	        </div>
	    </div>

	    <!-- Categories -->
	    <div class="category">
	        <ul>
	            <li><a href="#">WOMEN</a></li>
	            <li><a href="#">MEN</a></li>
	            <li><a href="#">KIDS GIRL</a></li>
	            <li><a href="#">KIDS BOY</a></li>
	            <li><a href="#">BRANDS</a></li>
	        </ul>
	    </div>		
	</div>

    
	<!-- Header End -->


	<!-- Body Start -->


	<div class="formBx">
		<form id="form2" action="signup.php" method="POST">
			<h1>Sign Up</h1>

	            <div class="form-control">
	                <!-- <label for="username">Username</label> -->
	                <input type="text" name="username" class="username" id="username" placeholder="Username">
	            </div>

	            <div class="form-control">
	                <!-- <label for="username">Username</label> -->
	                <input type="email" name="email" class="email" id="email" placeholder="Email@xxx.com">
	            </div>

	            <div class="form-control">
	                <!-- <label for="password">Password</label> -->
	                <input type="password" name="password" class="password" id="password" placeholder="Password">
	            </div>

	            <div class="form-control">
	                <!-- <label for="password">Password</label> -->
	                <input type="password" name="conf_password" class="conf_password" id="conf_password" placeholder="Conf-Password">
	            </div>

	            <div class="form-control">
					<input type="button" value="Signup" name="login" class="login">	
	            </div>

	            <div class="separator"></div>

	            <div class="form-control">
	    		 	<p href="#">You have an account? <a href="../index.php">Signin!</a> </p>
	    		 	<span>or</span>
	
	            </div>
	            
		</form>


	</div>

	<!-- Body End -->
	

	<!-- Footer Start -->
	<div class="footerBx">
		<div class="footer">
			<div class="cat">
				<h1>TShirt Tour</h1>
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Quisquam reiciendis laborum quas voluptatem consequatur explicabo vitae dignissimos, labore temporibus, vero quo repudiandae repellat harum dolorum, optio quidem vel nisi accusantium.</p>

			</div>
			<div class="cat">
				<h3>Customer Service</h3>
				<!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et exercitationem nihil, doloremque aperiam nulla, sed, nam commodi at consectetur cupiditate quos, dolores dolorum doloribus modi. Laborum odit voluptas, voluptatibus sapiente!</p> -->
				<br>
				<ul class="customer">
					<li><a href="#">FAQ </a></li>
					<li><a href="#">Size Guide </a></li>
					<li><a href="#">Exchanges & Returns </a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div>
			<div class="cat">
				<h3>About Us</h3>
				<br>
				<ul class="customer">
					<li><a href="#">Who We Are </a></li>
					<li><a href="#">Terms & Condtions </a></li>
					<li><a href="#">Privacy & Policy</a></li>
				</ul>
			</div>
			<div class="cat">
				<h3>Social Media</h3>
				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>

			</div>
		</div>
		<div class="smallFooter">
			<label for="">© Tshirt Tour 2021</label>
		</div>		
	</div>
	<!-- Footer End -->
<style>
  .error {
    color: red;
  }
</style>
<script type="text/javascript" src="../frontendvalidation/verifySignup.js"></script>

</body>
<script>
	$(document).ready(function(){

		form = $("#form2")

		form.on("click",function(e) {

        	e.preventDefault();

			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var conf_password = $('#conf_password').val();
			

			if(username && email && password && conf_password){
				return false;
			}else{

				$.ajax({
					url: "http://localhost/TSHIRT-TOUR---ECOMMERCE-WEBSITE/api/user/signup.php",
					type: "POST",
					data:{
						"username": username,
						"email": email,
						"password": password,
						"conf_password": conf_password,
					},
					success: function(response){
						console.log(response);
					},
					error: function(response){
						console.log(response);
					}
				});

			}

		});

	});
</script>
</html>