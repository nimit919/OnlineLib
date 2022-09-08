<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
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
						<li><a href="sinfo.php">STUDENT-INFO</a></li>
						<li><a href="req.php">ISSUE-BOOKS</a></li>
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
						<li><a href="signup.php">SIGN-UP</a></li>
						<li><a href="login.php">LOGIN</a></li>
					</ul>
				</nav>
		<?php
		}
			
		?>	
		</header>
		<section>
			<br>
			<h1 style="font-size: 20px; padding-left: 360px; padding-bottom: 10px;">LIST OF BOOKS</h1>
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
						$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%'");
						if(mysqli_num_rows($q)==0)
						{
							echo "NO BOOKS FOUND";
						}
						else
						{
							echo "<table class='table table-bordered table-hover'>";
						       echo "<tr style='background-color: skyblue; border='1'>";
						//Table header
							        echo "<th>"; echo "ID";	echo "</th>";
							        echo "<th>"; echo "Subject";echo "</th>";
							        echo "<th>"; echo "Book-Name";  echo "</th>";
							        echo "<th>"; echo "Authors Name";  echo "</th>";
							        echo "<th>"; echo "Edition";  echo "</th>";
							        echo "<th>"; echo "Department";  echo "</th>";
							        echo "<th>"; echo "Quantity";  echo "</th>";
							        echo "<th>"; echo "Status";  echo "</th>";
						        echo "</tr>";

						    while($row=mysqli_fetch_assoc($q))
						   {
							echo "<tr style='background-color:pink;'>";
							echo "<td>"; echo $row['bid']; echo "</td>";
							echo "<td>"; echo $row['subject']; echo "</td>";
							echo "<td>"; echo $row['name']; echo "</td>";
							echo "<td>"; echo $row['authors']; echo "</td>";
							echo "<td>"; echo $row['edition']; echo "</td>";
							echo "<td>"; echo $row['department']; echo "</td>";
							echo "<td>"; echo $row['quantity']; echo "</td>";
							echo "<td>"; echo $row['status']; echo "</td>";

							echo "</tr>";	
						    }
					        echo"</table>";
						}
					}
					else
					{
					$result=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
					echo "<table class='table table-bordered table-hover'>";
						echo "<tr style='background-color: skyblue; border='1'>";
						//Table header
							echo "<th>"; echo "ID";	echo "</th>";
							echo "<th>"; echo "Subject";	echo "</th>";
							echo "<th>"; echo "Book-Name";  echo "</th>";
							echo "<th>"; echo "Authors Name";  echo "</th>";
							echo "<th>"; echo "Edition";  echo "</th>";
							echo "<th>"; echo "Department";  echo "</th>";
							echo "<th>"; echo "Quantity";  echo "</th>";
							echo "<th>"; echo "Status";  echo "</th>";
						echo "</tr>";

						while($row=mysqli_fetch_assoc($result))
						{
							echo "<tr style='background-color:pink;'>";
							echo "<td>"; echo $row['bid']; echo "</td>";
							echo "<td>"; echo $row['subject']; echo "</td>";
							echo "<td>"; echo $row['name']; echo "</td>";
							echo "<td>"; echo $row['authors']; echo "</td>";
							echo "<td>"; echo $row['edition']; echo "</td>";
							echo "<td>"; echo $row['department']; echo "</td>";
							echo "<td>"; echo $row['quantity']; echo "</td>";
							echo "<td>"; echo $row['status']; echo "</td>";

							echo "</tr>";	
						}
					echo"</table>";
					}
		if(isset($_SESSION['aid']))
		{	
			?>
				<button style="float: right;height: 40px;width: 70px"><a href="add.php">ADD BOOKS</a></button>
				<br><br><br>
				<button style="float: right; height: 40px;width: 70px"><a href="del.php">DELETE BOOKS</a></button>s
			</div>
			<?php
		}
		elseif(isset($_SESSION['id']))
		{	
			?>
				<button style="float:right;height: 40px;width: 70px"><a href="issue.php">ISSUE BOOKS</a></button>
				<br><br><br>
				<button style="float:right;height: 40px;width: 70px"><a href="iinfo.php">ISSUE INFO</a></button>
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
</body>
</html>