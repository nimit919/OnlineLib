<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
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
				</ul>
			</nav>
		</header>
		<section>
			<br><br><br><br><br>
			<div class="box">
				<br>
				<h1 style="text-align: center; font-size: 30px; color: white; word-spacing: 20px;">ADMIN LOGIN</h1>
			    <form name="login" action="" method="post">
			        <div class="login">
			  	  		<br><br>			  	  		<input type="text" name="aid" placeholder="Admin_id" required=""><br><br>
			  	  		<input type="password" name="pass" placeholder="Password" required=""><br><br>
			  	  		<button type="submit" name="submit">Login</button>
			    	</div>
			  	</form>
			  		<br><br><a style="color:white;padding-left: 290px" href="login.php">Student login</a>
			</div>		

			<?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE aid='$_POST[aid]' && pass='$_POST[pass]';");
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <div class="alert alert-danger" style="width: 243px; margin-left: 600px ;background-color: pink">
            <strong>The id and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
      	$id=$_POST['aid'];
        $_SESSION['aid'] = $id; 

        ?>
          <script type="text/javascript">
            window.location="index.php"
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