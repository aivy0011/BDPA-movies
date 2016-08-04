<?php
	include "db.php";
	if(isset($_POST["b"])){
		$uname = strip_tags(trim($_POST["uname"]));
		$upass = strip_tags(trim($_POST["upass"]));
		$confirm = strip_tags(trim($_POST["confirm"]));
		if($confirm == $upass){
				mysqli_query($conn,"Insert into login (userid,password) values ('$uname','$upass')");
				header("Location: index.php");
		} else {
			$err = "Your password is not consistent";
		}
	}
?>
<form method="post">
	<span>Username:</span><input type="text" name="uname"><br>
	<span>Password:</span><input type="password" name="upass"><br>
	<span>Password Confirmation:</span><input type="password" name="confirm"><br>
	<input type="submit" value="register" name="b">
</form>
<?php if(isset($err)){echo $err;} ?>