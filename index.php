<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,strip_tags($_POST['username']));
      $mypassword = mysqli_real_escape_string($conn,strip_tags($_POST['Password'])); 
      $sql = "SELECT s_id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_is_registered("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: front_fee.php");
      }else {
         $error = "Your Login Name or Password is invalid";
		 header("location: index.php");
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
<title>SubLime Signup Form Flat Responsive Widget Template :: w3layouts</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="SubLime Signup Form web template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,100i,300,400,400i,500,500i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body>
	<div class="bg" data-vide-bg="video/laptop">
		<div class="center-container">
		<h1 class="agile-head text-center">Fee Management</h1>
		<div class="container">
			<div class="form_w3layouts">
				<div class="w3layouts-title">
					<h2 class="w3ls-left">Enter User_id</h2>
				
				<div class="clear"></div>
				</div>
				<form action="#" method="post" class="w3_agile_login">
				  <p>Username</p>
				  <input type="text" name="username" required="required" />
				  <p>Password</p>
				  <input type="password" name="Password"  required="required">
				  <div class="w3_agile_login">
						<input type="submit" value="Log In">
					</div> 
				</form> 
			</div>			
		</div>
		
		<div class="krishna-copyright text-center">
			<p>© 2017 &nbsp;Fee Management. All rights reserved | Design by <a href="#">Kbohare</a></p>
		</div>	
	</div>	
	</div>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});														
		});
	</script>
	<script src="js/jquery.vide.min.js"></script>
</body>
</html>

