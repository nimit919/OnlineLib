<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add books</title>
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
			<br><br><br><br><br>
			<div>
				<?php
					echo "USER ID : ".$_SESSION['aid'];
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="del.php">DEL-BOOKS</a></li>
						<li><a href="sinfo.php">STUDENT-INFO</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
		</header>
		<section>
			<br>
			<div>
				<br>
				<h1 style="font-size: 30px; color: black; word-spacing: 10px; padding-left: 130px">ADD BOOKS</h1>
			    <form action="" method="post">
			        <div class="login">
			  	  		<br>
			  	  		<input type="text" name="bid" placeholder="BOOK ID" required=""><br><br>
			  	  		<input type="text" name="subject" placeholder="SUBJECT" required=""><br><br>
			  	  		<input type="text" name="name" placeholder="BOOK NAME" required=""><br><br>
			  	  		<input type="text" name="authors" placeholder="Authors" required=""><br><br>
			  	  		<input type="text" name="edition" placeholder="EDITION" required=""><br><br>
			  	  		<input type="text" name="department" placeholder="DEPARTMENT" required=""><br><br>
			  	  		<input type="text" name="quantity" placeholder="QUANTITY" required=""><br><br>
			  	  		<input type="text" name="status" placeholder="STATUS" required=""><br><br>
			  	  		<button name="submit">ADD</button>
			    	</div>
			  	</form>
			</div>	
<?php
    if(isset($_POST['submit']))
    {
        mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]','$_POST[subject]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]','$_POST[department]','$_POST[quantity]','$_POST[status]') ;");
        ?>
          <script type="text/javascript">
            alert("Book Added Successfully.");
          </script>

        <?php

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