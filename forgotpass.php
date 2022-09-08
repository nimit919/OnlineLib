<?php
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
		<header>
		<div class="logo">
			<h1 style="color: black;font-size: 30px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
			<img src="images/logo.jpeg">
		</div>
			<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="signup.php">SIGN-UP</a></li>
						<li><a href="login.php">LOGIN</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<br><br><br><br><br>
			<div class="box">
				<br>
				<h1 style="text-align: center; font-size: 20px; color: white; word-spacing: 10px;">CHANGE YOUR PASSWORD</h1>
			    <form action="" method="post">
			        <div class="login">
			  	  		<br><br>
			  	  		<input type="text" name="id" placeholder="Student_id" required=""><br><br>
			  	  		<input type="text" name="email" placeholder="Email" required=""><br><br>
			  	  		<input type="text" name="pass" placeholder="New Password" required=""><br><br>
			  	  		<button type="submit" name="submit">Update</button>
			    	</div>
			  	</form>
			  	</p>
			</div>	
			<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE student SET pass='$_POST[pass]' WHERE id='$_POST[id]'
			AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
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
</body>
</html>