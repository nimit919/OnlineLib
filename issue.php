<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Books</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
		<header>
		<div class="logo">
			<h1 style="color: black;font-size: 30px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
			<img src="images/logo.jpeg">
		</div><br><br><br><br><br><br>
		<?php
					echo "USER ID : ".$_SESSION['id'];
				?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="iinfo.php">ISSUE-INFO</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
		</header>
		<section>
			<br>
			<div style="padding-left: 1095px">
				<form action="" method="post">
					<input type="text" name="bid" placeholder="Book id" required="">
					<br>
					<button name="submit1" style="width: 70px">Request</button>
				</form>
			</div>
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
				if(isset($_POST['submit1']))
				{
					$s=mysqli_query($db,"SELECT * FROM `books` WHERE `bid`='$_POST[bid]';");
					$r=mysqli_fetch_assoc($s);
					$count=mysqli_num_rows($s);
					if($count!=0)
					{
						mysqli_query($db,"INSERT INTO issue_book values('$_SESSION[id]', '$_POST[bid]', '', '', '','');");
				?>
						<script type="text/javascript">
							alert("Book Requested.");
							window.location="iinfo.php"
						</script>
				<?php
					}
					else
					{
				?>
					<script type="text/javascript">
						alert("Book Not Available in library.");
					</script>
				<?php
					}
				}
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