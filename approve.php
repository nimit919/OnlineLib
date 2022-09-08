<?php
	include "connection.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
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
						<li><a href="req.php">ISSUE-BOOKS</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="sinfo.php">STUDENT-INFO</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
		</header>
		<section>
			<br><br><br><br><br>
			<div class="box1">
				<br><br>
				<h1 style="text-align: center; font-size: 40px; color: white; word-spacing: 10px;">APPROVE BOOK REQUEST</h1>
			    <form name="login" action="" method="post">
			        <div class="login">
			  	  		<br><br>
			  	  		<input type="text" name="approve" placeholder="Yes or No" required=""><br><br>
			  	  		<input type="text" name="idate" placeholder="Issue date yyyy-mm-dd" required=""><br><br>
			  	  		<input type="text" name="rdate" placeholder="Return date yyyy-mm-dd" required=""><br><br>
			  	  		<button name="submit" style="width: 65px">Approve</button>
			    	</div>
			  	</form>
			</div>
		<?php
  			if(isset($_POST['submit']))
  			{
    		mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `idate` =  '$_POST[idate]', `rdate` =  '$_POST[rdate]' WHERE id='$_SESSION[id]' and bid='$_SESSION[bid]';");

    		mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");

    		$res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid];");

    			while($row=mysqli_fetch_assoc($res))
    			{
      				if($row['quantity']==0)
      				{
        				mysqli_query($db,"UPDATE books SET status='Not-Available' where bid='$_SESSION[bid]';");
     				}
   			 	}
    		?>
      			<script type="text/javascript">
        		alert("Updated successfully.");
        		window.location="req.php"
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