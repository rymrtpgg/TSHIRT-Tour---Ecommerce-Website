<?php
    require_once('vendor/autoload.php');

	$clientID = "716305721047-bqhs8stbfa0tp2j2l4alcmv62gaeejka.apps.googleusercontent.com";
	$clientSecret = "I_AYXC7JW4SVh1q7By21gKPt";

	$client = new Google_Client();
	$client->setClientId($clientID);
	$client->setClientSecret($clientSecret);
	$client->setRedirectUri("http://localhost/TSHIRT-Tour---Ecommerce-Website/index.php");
	$client->addScope('profile');
	$client->addScope('email');

	if(isset($_GET['code'])){

		$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
		$client->setAccessToken($token);

		$auth = new Google_Service_Oauth2($client);

		$google_info = $auth->userinfo->get();

		$email = $google_info->email;

		var_dump($email);exit;

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="style/index.css">
	<link rel="stylesheet" href="/style/font/fontawesome-free-5.15.3-web/css/all.css">
</head>
<body>

	<!-- Header Start -->
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
    
	<!-- Header End -->


	<!-- Body Start -->


	<div class="formBx">
		<form action="#" method="POST">
			<h1>Sign In</h1>


		</form>


	</div>


	    		 <div class="googleForm form-control">
	    		 	
	    		 	<p href="#">You don't have an account? <a href="#">Signup!</a> </p>
	    		 	<i class="fab fa-google"></i>
					<a  id="g" href=<?= $client->createAuthUrl()?> >Sign in with Google</a>
		        </div>

	<!-- Body End -->
	

	<!-- Footer Start -->
	<div class="footer">
		<div class="cat">
			<h3>Catergory 1 </h3>
			<p>Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Quisquam reiciendis laborum quas voluptatem consequatur explicabo vitae dignissimos, labore temporibus, vero quo repudiandae repellat harum dolorum, optio quidem vel nisi accusantium.</p>

		</div>
		<div class="cat">
			<h3>Catergory 1 </h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et exercitationem nihil, doloremque aperiam nulla, sed, nam commodi at consectetur cupiditate quos, dolores dolorum doloribus modi. Laborum odit voluptas, voluptatibus sapiente!</p>
		</div>
		<div class="cat">
			<h3>Catergory 1 </h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur sit quidem accusantium quod nulla, quis quasi officia a magnam rem alias! Velit voluptatum aspernatur, officiis illo ut, nobis alias fugit.</p>
		</div>
		<div class="cat">
			<h3>Catergory 1 </h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, incidunt perspiciatis rem consectetur quidem, provident labore veritatis cupiditate voluptates, hic alias corporis quae. Quisquam fugit, labore unde consequatur, repudiandae accusantium.</p>
		</div>
	</div>
	<div class="smallFooter">
		<label for="">Copyright</label>
	</div>
	<!-- Footer End -->

</body>
</html>