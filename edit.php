<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
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
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
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
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
		<?php
		}
			
		?>
		</header>
		<section>
			<br><br><br><br><br>
			<div class="box1">
				<br><br>
				<h1 style="text-align: center; font-size: 30px; color: white; word-spacing: 10px;">EDIT PROFILE</h1>
			    <form action="" method="post">
			        <div class="login">
			  	  		<br><br>
			  	  		<input type="text" name="full" placeholder="Full Name" required=""><br><br>
			  	  		<input type="text" name="reg" placeholder="Registration Number" required=""><br><br>
			  	  		<input type="text" name="email" placeholder="Email" required=""><br><br>
			  	  		<input type="text" name="pass" placeholder="Password" required=""><br><br>
			  	  		<button name="submit">Save</button>
			    	</div>
			  	</form>
			</div>
			<?php 

		if(isset($_POST['submit']))
		{
			$full=$_POST['full'];
			$reg=$_POST['reg'];
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			if(isset($_SESSION['aid']))
			{
			$sql1= "UPDATE admin SET full='$full', reg='$reg',  email='$email', pass='$pass' WHERE aid='".$_SESSION['aid']."';";
			}
			elseif(isset($_SESSION['id'])) 
			{
				$sql1= "UPDATE student SET full='$full', reg='$reg',  email='$email', pass='$pass' WHERE id='".$_SESSION['id']."';";
			}
			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
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