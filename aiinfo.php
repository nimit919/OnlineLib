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
					echo "USER ID : ".$_SESSION['aid'];
				?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="req.php">ISSUE-BOOKS</a></li>
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
					<button name="submit">Return</button>
				</form>
			</div>
			<br>
			<div style="background-color: white;height:30px;width:350px">
			<h1 style="font-size: 20px; padding-left: 50px; padding-bottom: 10px;">STATUS OF ISSUED BOOKS</h1>
			</div><br>
				<?php
					$sql="SELECT student.id,full,books.bid,idate,approve,late,issue_book.rdate FROM student inner join issue_book ON student.id=issue_book.id inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' ORDER BY `issue_book`.`rdate` ASC";
        			$result=mysqli_query($db,$sql);

							echo "<table class='table table-bordered table-hover'>";
						       echo "<tr style='background-color: skyblue; border='1'>";
						//Table header
						       		echo "<th>"; echo "STUDENT ID";	echo "</th>";
						       		echo "<th>"; echo "STUDENT NAME";	echo "</th>";
							        echo "<th>"; echo "BOOK ID";	echo "</th>";
							        echo "<th>"; echo "ISSUE_DATE";  echo "</th>";
							        echo "<th>"; echo "RETURN_DATE";  echo "</th>";
							        echo "<th>"; echo "APPROVE STATUS";  echo "</th>";
						        echo "</tr>";

						    while($row=mysqli_fetch_assoc($result))
						   {
						   		$d=date("Y-m-d");
								if($d > $row['rdate'])
        							{
        							$c=0;
          							$c=$c+1;	
									mysqli_query($db,"UPDATE issue_book SET approve='Expired' where `rdate`='$row[rdate]' and approve='Yes' limit $c;");
									}
							echo "<tr style='background-color:pink;'>";
							echo "<td>"; echo $row['id']; echo "</td>";
							echo "<td>"; echo $row['full']; echo "</td>";
							echo "<td>"; echo $row['bid']; echo "</td>";
							echo "<td>"; echo $row['idate']; echo "</td>";
							echo "<td>"; echo $row['rdate']; echo "</td>";
							echo "<td>"; echo $row['approve']; echo "</td>";
							echo "</tr>";	
						    }
					        echo"</table>";

			if(isset($_POST['submit']))
			{
				 mysqli_query($db,"UPDATE issue_book SET approve='Returned' where id='$_POST[id]' and bid='$_POST[bid]' ");
				 mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
			?>
          			<script type="text/javascript">
           			 alert("Book Returned Successfully.");
           			 window.location="aiinfo.php"
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
</body>
</html>