<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
						<li><a href="req.php">ISSUE-BOOKS</a></li>
						<li><a href="sinfo.php">STUDENT-INFO</a></li>
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
			<br>
			<div class="container">
				<form action="" method="post">
					<button name="submit1" style="float:right">Edit</button>
				</form>
			<div class="box">
				<?php
				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 					if(isset($_SESSION['aid']))
 					{
					$q=mysqli_query($db,"SELECT * FROM admin WHERE aid='$_SESSION[aid]';");
				?>
					<br>
					<h2 style="text-align: center; color: white;font-size: 40px">My Profile</h2><br><br><br>
					<div style="padding-left: 100px;">
				<?php
						$row=mysqli_fetch_assoc($q);
						echo "<table class='table table-bordered'>";
	 					echo "<tr style='color: white;'>";
	 						echo "<td>";
	 							echo "<b> Name: </b>";
	 						echo "</td>";

	 						echo "<td>";
	 							echo $row['full'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> Reg No: </b>";
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['reg'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> Email: </b>";
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['email'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> ID: </b>";
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['aid'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> Password: </b>";	
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['pass'];
	 						echo "</td>";
	 					echo "</tr>";
						echo "</table>"; 
					}
					elseif(isset($_SESSION['id'])) 
					{
					$q=mysqli_query($db,"SELECT * FROM student WHERE id='$_SESSION[id]';");
					?>
						<br>
						<h2 style="text-align: center; color: white;font-size: 40px">MY PROFILE</h2><br><br><br>
						<div style="padding-left: 100px;">
				<?php
						$row=mysqli_fetch_assoc($q);
						echo "<table class='table table-bordered'>";
	 					echo "<tr style='color: white;'>";
	 						echo "<td>";
	 							echo "<b> Name: </b>";
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['full'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> Reg No: </b>";
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['reg'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> Email: </b>";
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['email'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> ID: </b>";
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['id'];
	 						echo "</td>";
	 					echo "</tr>";

	 					echo "<tr style='color:white;'>";
	 						echo "<td>";
	 							echo "<b> Password: </b>";	
	 						echo "</td>";
	 						echo "<td>";
	 							echo $row['pass'];
	 						echo "</td>";
	 					echo "</tr>";
						echo "</table>";
					}
				?>
			</div>
			</div>
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