<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<h1 style="color: black;font-size: 30px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
			<img src="images/logo.jpeg">
		</div>

		<?php
		if(isset($_SESSION['aid']))
		{
			?>
			<br><br><br><br><br>
			<div>
				<?php
					echo "USER ID : ".$_SESSION['aid'];
				?>
				<nav>
					<ul>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="req.php">ISSUE-BOOKS</a></li>
						<li><a href="sinfo.php">STUDENT-INFO</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
			<?php
		}
		elseif(isset($_SESSION['id']))
		{
			?>
			<br><br><br><br><br>
			<div>
				<?php
					echo "USER ID : ".$_SESSION['id'];
				?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="signup.php">SIGN-UP</a></li>
						<li><a href="login.php">LOGIN</a></li>
					</ul>
				</nav>
		<?php
		}
			
		?>	
		</header>
		<section>
			<br><br><br><br><br>
			<div class="box">
				<br><br><br><br><br><br><br><br>
				<h1 style="text-align: center; font-size: 40px; color: white;">WELCOME !</h1>
			</div>
		</section>
		<footer>
			<p style="color:black;  text-align: center; ">
				<br>
				CONTACT US:<br>
				Email: abc@gmail.com <br>
				Mobile: +88********
			</p>
		</footer>
	</div>
</body>

</html>