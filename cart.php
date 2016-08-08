<?php
	session_start();
	include 'db.php';
	$res = mysqli_query($conn, "SELECT tempcart.tc_id ,DVD.dvdtitle, DVD.price, login.userid from DVD inner join tempcart on DVD.dvdid = tempcart.tc_dvdid inner join login on tempcart.tc_custid = login.id where login.userid='{$_SESSION['user']}'");
	$total_price = 0;
	echo "<table>";
	while($row = mysqli_fetch_array($res)){
		echo "<tr><td style='text-align: left'>" . $row["dvdtitle"]."</td><td>". $row["price"] ."</td></tr>";
		$total_price += $row["price"];
	} 
	echo "</table>";
	echo "Subtotal: $total_price <br>";
	$tax = ($total_price * .05);
	echo "Tax: $tax <br>";
?>
<a href="home.php">Add more movies</a><a href="checkout.php">Checkout</a>