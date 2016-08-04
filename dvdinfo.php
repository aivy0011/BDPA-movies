<?php
	session_start();
	include 'db.php';
	if(isset($_POST["DVDID"])){
	$_SESSION['dvdid'] = strip_tags(trim($_POST["DVDID"]));
	}
	$res = mysqli_query($conn, "SELECT * FROM DVD where dvdid={$_SESSION['dvdid']}");
	$row = mysqli_fetch_array($res);
	$iduser = strip_tags(trim($_SESSION['id']));
	if(isset($_POST['btn'])){
		mysqli_query($conn,"Insert into tempcart (tc_custid,tc_dvdid) value ({$iduser}, {$_SESSION['dvdid']})");
		header("Location: home.php");
	}
?>
<form method="post">
<table border="1">
<?php
echo "<tr><td>Title:</td><td>{$row["DVDTitle"]}</td></tr>";
echo "<tr><td>Genre:</td><td>{$row["Genre"]}</td></tr>";
echo "<tr><td>Price:</td><td>{$row["Price"]}</td></tr>";
echo "<tr><td>Add:</td><td><input type='submit' value='Add to Cart' name='btn'></td></tr>"
?>
</table>
</form>