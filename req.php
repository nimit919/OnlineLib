<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Info</title>
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
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="sinfo.php">STUDENT-INFO</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
		</header>
		<section>
			<br>
			<div style="padding-left: 1095px">
				<form action="" method="post">
					<input type="text" name="id" placeholder="Student id" required=""><br><br>
					<input type="text" name="bid" placeholder="Book id" required="">
					<br><br>
					<button name="submit" style="width: 65px">Approve</button>
				</form>
			</div>
			<?php
			if(isset($_POST['submit']))
			{
				$_SESSION['id']=$_POST['id'];
				$_SESSION['bid']=$_POST['bid'];

			?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
			<?php
			}
			?>
			<div style="background-color: white;height:50px;width:350px">
				<br>
			<h1 style="font-size: 18px; padding-left: 30px; padding-bottom: 10px;">BOOKS REQUESTED BY STUDENTS</h1>
			</div>
			<br><br>
				<?php
					$sql= "SELECT student.id,full,books.bid,name,status FROM student inner join issue_book ON student.id=issue_book.id inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
					$result= mysqli_query($db,$sql);
					if(mysqli_num_rows($result)==0)
					{
				?>
						<div style="background-color:red;height:20px;width:300px;padding-left: 50px">
				<?php
						echo "<h2><b>";
						echo "There's no pending request.";
						echo "</h2></b>";
				?>
						</div>
				<?php
					}
					else
					{
						echo "<table class='table table-bordered' >";
						echo "<tr style='background-color:skyblue;'>";
				//Table header
				
						echo "<th>"; echo "STUDENT ID";  echo "</th>";
						echo "<th>"; echo "STUDENT NAME";  echo "</th>";
						echo "<th>"; echo "BOOK ID";  echo "</th>";
						echo "<th>"; echo "BOOK NAME";  echo "</th>";
						echo "<th>"; echo "BOOK STATUS";  echo "</th>";
						echo "</tr>";	

					while($row=mysqli_fetch_assoc($result))
					{
						echo "<tr style='background-color:pink;'>";
						echo "<td>"; echo $row['id']; echo "</td>";
						echo "<td>"; echo $row['full']; echo "</td>";
						echo "<td>"; echo $row['bid']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['status']; echo "</td>";
				
						echo "</tr>";
					}
						echo "</table>";
					}
				?>
				<br><br><br><br><br>
				<button style="float: right;height: 70px;width: 170px;font-size: 15px"><a href="aiinfo.php">INFORMATION OF ISSUED BOOKS</a></button>
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