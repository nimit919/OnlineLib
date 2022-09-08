<?php
	include "connection.php";
?>

<html>
<head>
	<title>Sign up</title>
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
					<li><a href="login.php">LOGIN</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<br><br><br><br><br>
			<div class="box1">
				<br>
				<h1 style="text-align: center; font-size: 30px; color: white; word-spacing: 10px;">STUDENT SIGN UP</h1>
			    <form name="login" action="" method="post">
			        <div class="login">
			  	  		<br><br>
			  	  		<input type="text" name="full" placeholder="Full name" required=""><br><br>
			  	  		<input type="text" name="reg" placeholder="Registeration number" required=""><br><br>
			  	  		<input type="text" name="email" placeholder="Email" required=""><br><br>
			  	  		<input type="text" name="id" placeholder="Student_id" required=""><br><br>
			  	  		<input type="password" name="pass" placeholder="Password" required=""><br><br>
			  	  		<button name="submit" style="width:80px">Sign up</button>
			    	</div>
			  	</form>
			</div>		
		</section>
			<?php

				if(isset($_POST['submit']))
				{
					$count=0;
					$sql="SELECT `id` FROM `student`";
					$result=mysqli_query($db,$sql);

					while($row=mysqli_fetch_assoc($result))
					{
						if($row['id']==$_POST['id'])
						{
							$count=$count+1;
						}
					}
				   if($count==0)
						{	
							mysqli_query($db,"INSERT INTO `student` VALUES ('$_POST[full]', '$_POST[reg]', '$_POST[email]', '$_POST[id]', '$_POST[pass]');");
			?>
						<script type="text/javascript">
						alert("Registeration Successful !")
						</script>
			<?php
				
						}
			    		else
			    		{
			?>
						<script type="text/javascript">
						alert("Student_id already taken.")
						</script>
			<?php
			    		}
 
			    }

			?>
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