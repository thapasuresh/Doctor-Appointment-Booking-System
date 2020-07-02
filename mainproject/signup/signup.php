<?php
	session_start();
	require_once('../dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Register To Book A Doctor</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Register To Book A Doctor,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Bellefair&amp;subset=hebrew,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!--header-->
	<h1>
		<span>R</span>egister
		<span>T</span>o
		<span>B</span>ook
		<span>Y</span>our
		<span>D</span>octor
	</h1>
	<!--//header-->
	<!-- content -->
	<div class="main-content-agile">
		<div class="sub-main-w3">
			<form action="#" method="post">
				<div class="form-style-agile">
					<label>Username</label>
					<div class="pom-agile">
						<span class="fa fa-user-o" aria-hidden="true"></span>
						<input placeholder="User Name" name="username" type="text" required="">
					</div>
				</div>

				<div class="form-style-agile">
					<label>Email</label>
					<div class="pom-agile">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<input placeholder="Email" name="email" type="email" required="">
					</div>
				</div>

				<div class="form-style-agile">
					<label>Password</label>
					<div class="pom-agile">
						<span class="fa fa-key" aria-hidden="true"></span>
						<input placeholder="Password" name="password" type="password" id="password1" required="">
					</div>
				</div>
				<div class="form-style-agile">
					<label>Confirm Password</label>
					<div class="pom-agile">
						<span class="fa fa-key" aria-hidden="true"></span>
						<input placeholder="Confirm Password" name="cpassword" type="password" id="password2" required="">
					</div>
				</div>
				<input type="submit" name="register" value="Register">
				
				<a href= "../login/main.php" >Already have account</a>
				
			</form>
		</div>
	</div>

<?php
			if(isset($_POST['register']))
			{   
				@$username=$_POST['username'];
				@$email=$_POST['email'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from users where username='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$quey = "insert into users values('$username','$email','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: ../login/profile.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>





	
	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>

</body>

</html>