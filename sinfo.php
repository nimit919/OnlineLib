<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student info</title>
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
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>

					</ul>
				</nav>
		</header>
		<section>
			<br>
			<h1 style="font-size: 20px; padding-left: 80px; padding-bottom: 10px;">LIST OF STUDENTS</h2>
			<br>
			<div class="search">
				<form name="search" action="" method="post">
					<input type="text" name="search" placeholder="Search" required="">
					<br>
					<button name="submit">Search</button>
				</form>
			</div>
			<br>
				<?php

					if(isset($_POST['submit']))
					{
						$q=mysqli_query($db,"SELECT `full`, `reg`, `email`, `id` FROM `student` where full like '%$_POST[search]%'");
						if(mysqli_num_rows($q)==0)
						{
							echo "NO STUDENTS FOUND";
						}
						else
						{
							echo "<table class='table table-bordered table-hover'>";
						       echo "<tr style='background-color: skyblue; border='1'>";
						//Table header
							        echo "<th>"; echo "NAME";	echo "</th>";
							        echo "<th>"; echo "REG NO";  echo "</th>";
							        echo "<th>"; echo "EMAIL";  echo "</th>";
							        echo "<th>"; echo "ID";  echo "</th>";
						        echo "</tr>";

						    while($row=mysqli_fetch_assoc($q))
						   {
							echo "<tr style='background-color:pink;'>";
							echo "<td>"; echo $row['full']; echo "</td>";
							echo "<td>"; echo $row['reg']; echo "</td>";
							echo "<td>"; echo $row['email']; echo "</td>";
							echo "<td>"; echo $row['id']; echo "</td>";
							echo "</tr>";	
						    }
					        echo"</table>";
						}
					}
					else
					{
					$result=mysqli_query($db,"SELECT `full`, `reg`, `email`, `id` FROM `student` ORDER BY `student`.`full` ASC;");
					echo "<table class='table table-bordered table-hover'>";
						echo "<tr style='background-color: skyblue; border='1'>";
						//Table header
							echo "<th>"; echo "NAME";	echo "</th>";
							        echo "<th>"; echo "REG NO";  echo "</th>";
							        echo "<th>"; echo "EMAIL";  echo "</th>";
							        echo "<th>"; echo "ID";  echo "</th>";
						echo "</tr>";

						while($row=mysqli_fetch_assoc($result))
						{
							echo "<tr style='background-color:pink;'>";
							echo "<td>"; echo $row['full']; echo "</td>";
							echo "<td>"; echo $row['reg']; echo "</td>";
							echo "<td>"; echo $row['email']; echo "</td>";
							echo "<td>"; echo $row['id']; echo "</td>";

							echo "</tr>";	
						}
					echo"</table>";
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