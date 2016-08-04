<?php
session_start();
include "db.php";
$count = mysqli_fetch_array(mysqli_query($conn, "Select COUNT(*) From tempcart"));
echo "Welcome {$_SESSION['user']}";
echo "<button onclick=\"window.location.href = 'cart.php'\">View Cart ({$count['COUNT(*)']})</button>";
echo '<a href="logoff.php">Log Off</a>';
?>

<form method="post" action="dvdinfo.php">
<?php 
	$limit = 25;
	$res = mysqli_query($conn, "SELECT DVDID,DVDTitle, Price from DVD limit 25");
	echo "<table border='1'>";
	while($values = mysqli_fetch_array($res)){
	echo "<tr><td>{$values["DVDTitle"]}</td><td>$"."{$values["Price"]}</td><td style='display: none;'></td><td><button value='{$values["DVDID"]}' name='DVDID'>View Details</button></td></tr>";
	}
	echo "</ul>";
	echo "</table>";
?>	
</form>