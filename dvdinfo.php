<?php
	session_start();
	include 'db.php';
	if(isset($_POST["DVDID"])){
	$_SESSION['dvdid'] = strip_tags(trim($_POST["DVDID"]));
	}
	$DVD = mysqli_query($conn, "SELECT * FROM DVD where DVD.dvdid={$_SESSION['dvdid']}");
	$Actor = mysqli_query($conn, "SELECT * FROM Actorname inner join Actorindex on Actorname.idActorName=Actorindex.ActorID inner join DVD on Actorindex.DVDList_id=DVD.DVDID inner join Directorindex on DVD.DVDID=Directorindex.DVDList_id inner join Directorname on Directorindex.Director_id=Directorname.id where DVD.dvdid={$_SESSION['dvdid']}");
	$rowd = mysqli_fetch_array($DVD);
	$rowa = mysqli_fetch_array($Actor);
	$iduser = strip_tags(trim($_SESSION['id']));
	if(isset($_POST['btn'])){
		mysqli_query($conn,"Insert into tempcart (tc_custid,tc_dvdid) value ({$iduser}, {$_SESSION['dvdid']})");
		header("Location: home.php");
	}
?>
<form method="post">
<table border="1">
<?php
echo "<tr><td>Title:</td><td>{$rowd["DVDTitle"]}</td></tr>";
echo "<tr><td>Genre:</td><td>{$rowd["Genre"]}</td></tr>";
echo "<tr><td>Actor:</td><td>{$rowa["Actor"]}</td></tr>";
echo "<tr><td>Director:</td><td>{$rowa["Director"]}</td></tr>";
echo "<tr><td>Price:</td><td>{$rowd["Price"]}</td></tr>";
echo "<tr><td>Cart:</td><td><input type='submit' value='Add to Cart' name='btn'></td></tr>"
?>
</table>
</form>