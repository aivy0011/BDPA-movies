<?php
	session_start();
	include "db.php";
	$res = mysqli_query($conn,"Delete From tempcart where tc_custid={$_SESSION["id"]}");
	session_destroy();
	header("Location: index.php");
?>