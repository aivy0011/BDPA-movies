<?php
	session_start();
	include "db.php";
	if(isset($_POST["btn"])){
		$uname = strip_tags(trim($_POST["uname"]));
		$upass = strip_tags(trim($_POST["upass"]));
		$res = mysqli_query($conn, "SELECT * FROM login where userid='$uname'");
		$row = mysqli_fetch_array($res);
		if($row["userid"] == $uname && $row["password"] == $upass){
			$_SESSION['user'] = "$uname";
			$_SESSION['id'] = $row['ID'];
			header("Location: home.php");
		} else {
			$errMsg = "You enter the wrong credentials";
		}
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body>
		<form method="post">
			<input type="text" name="uname" placeholder="Username">
			<input type="password" name="upass" placeholder="password">
			<input type="submit" value="login" name="btn"><br>
		</form>
		<button onclick="window.location.href='register.php';">Register</button>
	</body>
</html>