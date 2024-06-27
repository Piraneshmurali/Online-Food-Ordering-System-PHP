<?php
if (isset($_POST['sub'])) {

	if ($_POST['pass'] == "") {
		echo "<script> alert('Password Empty'); </script>";
	} else if ($_POST['pass'] != $_POST['confirm_pass']) {
		echo "<script> alert('Password Not Match'); </script>";
	} else {
		$con = new mysqli("localhost", "root", "", "food order");
		$id = $_POST['user_id'];
		$psw = ($_POST['pass']);
		$ph = $_POST['phone'];
		$add = $_POST['user_add'];
		$select = "select * from delivery";
		$res = $con->query($select);


		$insert = "insert into delivery(username,userpass,phone,address) values('" . $id . "','" . $psw . "'," . $ph . ",'" . $add . "')";
		if ($con->query($insert)) {
			echo "<script> alert('Your Account Is Sucessfully Created Login To Continue!'); </script> ";
			header("Location:signin.php");
		} else {
			echo "<script> alert('User Registration Failed'); </script>";
		}
	}
	$con->close();
}
?>

<html>

<head>
	<link rel="stylesheet" href="deli.css">
</head>

<body>
	<section class="container">
		<h3>Registration</h3>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="user_id" placeholder="Enter Your Name" class="box" required><br>
			<input type="password" name="pass" placeholder="Enter Your Password" class="box" required><br>
			<input type="password" name="confirm_pass" placeholder="Renter Your Password" class="box" required><br>
			<textarea name="user_add" placeholder="Enter Your Address" rows="4" cols="45" class="box" required></textarea><br>
			<input type="tel" name="phone" placeholder="Enter Your Phone Number" class="box" required><br>
			<center><input type="submit" name="sub" value="Register" class="btn"></center>
		</form>
		<p>Already have an account? <a href="signin.php">Sign In</a></p>
	</section>
</body>

</html>