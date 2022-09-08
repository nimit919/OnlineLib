<?php
  include "connection.php";
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
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
			<br><br><br><br><br><br>
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
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
			<?php
		}
		elseif(isset($_SESSION['id']))
		{
			?>
			<br><br><br><br><br><br>
			<div>
				<?php
					echo "USER ID : ".$_SESSION['id'];
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
		<?php
		}
			
		?>	
	</header>
	<section>
		<br>
		<div class="box2">
		<h1 style="padding: 20px; font-size: 20px; color: white;">If you have any suggestions please fill the feedback form below :</h1>
		<form name="feedback" action="" method="post">
					<div class="feed">
			  	  	<br><br><br>
			  	  	<input type="text" name="comment" placeholder="Write something..."><br><br>
			  	  	<button name="submit">Submit</button><br>
			  	  	</div>
		</form>
		<br>
		<h2 style="padding: 20px; font-size: 20px; color: white;">Feedbacks:<h2>
		<div class="scroll">
				<?php
			if(isset($_POST['submit']))
			{
				if(isset($_SESSION['aid']))
				{
				$sql="INSERT INTO `feedback`(`fname`, `comments`) VALUES('Admin', '$_POST[comment]');";
				}
				elseif(isset($_SESSION['id']))
				{
					$sql="INSERT INTO `feedback`(`fname`, `comments`) VALUES('$_SESSION[id]', '$_POST[comment]');";
				}
					if(mysqli_query($db,$sql))
					{
					$q="SELECT * FROM `feedback` ORDER BY `feedback`.`fid` DESC"; 
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered'>";
						while ($row=mysqli_fetch_assoc($res)) 
						{
						echo "<tr style='background-color: white; border='1'>";
							echo "<td>"; echo $row['fname']; echo "</td>";
							echo "<td>"; echo $row['comments']; echo "</td>";
						echo "</tr>";
						}
					echo "</table>";
					}

			}

			else
			{
				$q="SELECT * FROM `feedback` ORDER BY `feedback`.`fid` DESC"; 
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr style='background-color: white; border='1'>";
							echo "<td>"; echo $row['fname']; echo "</td>";
							echo "<td>"; echo $row['comments']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
		?>
					</div>
	</section>
		</div>
</body>
</html>