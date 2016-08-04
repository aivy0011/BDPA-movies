<?php
	session_start();
	include 'db.php';
	$res = mysqli_query($conn, "SELECT DVD.dvdtitle, DVD.price, login.userid from DVD inner join tempcart on DVD.dvdid = tempcart.tc_dvdid inner join login on tempcart.tc_custid = login.id");
	while($row = mysqli_fetch_array($res)){
		echo $row["userid"] . "|". $row["dvdtitle"]. "<br>";
	}
?>
<a href="home.php">Add more movies</a>