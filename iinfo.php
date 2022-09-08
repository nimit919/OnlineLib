<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Issue Info</title>
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
		<br><br><br><br><br><br>
		<?php
					echo "USER ID : ".$_SESSION['id'];
				?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="issue.php">ISSUE-BOOKS</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
		</header>
		<section>
			<br>
			<h1 style="font-size: 20px; padding-left: 50px; padding-bottom: 10px;">STATUS OF ISSUED BOOKS</h1>
			<br>
				<?php
					$q=mysqli_query($db,"SELECT * from issue_book where id='$_SESSION[id]';");
						if(mysqli_num_rows($q)==0)
						{
							echo "NO BOOKS REQUESTED";
						}
						else
						{
							echo "<table class='table table-bordered table-hover'>";
						       echo "<tr style='background-color: skyblue; border='1'>";
						//Table header
							        echo "<th>"; echo "BOOK ID";	echo "</th>";
							        echo "<th>"; echo "APPROVED";echo "</th>";
							        echo "<th>"; echo "ISSUE_DATE";  echo "</th>";
							        echo "<th>"; echo "RETURN_DATE";  echo "</th>";
						        echo "</tr>";

						    while($row=mysqli_fetch_assoc($q))
						   {
							echo "<tr style='background-color:pink;'>";
							echo "<td>"; echo $row['bid']; echo "</td>";
							echo "<td>"; echo $row['approve']; echo "</td>";
							echo "<td>"; echo $row['idate']; echo "</td>";
							echo "<td>"; echo $row['rdate']; echo "</td>";
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