<?php
$showalert = false;
$showerror = false;
$stop = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	include "components/_dbconnect.php";

	if ($_POST['username'] != "" && isset($_POST['username'])) {
		$username = $_POST['username'];
	} else {
		$showerror = "Enter valid username";
		$username = NULL;
	}

	if ($_POST['password'] != "" && isset($_POST['password'])) {
		if (strlen($_POST['password']) != 10) {
			$showerror = "Password must be 10 characters long";
			$password = NULL;
		} else {
			$password = $_POST['password'];
		}
	} else {
		$showerror = "Enter valid password";
		$password = NULL;
	}

	if ($_POST['cpassword'] != "" && isset($_POST['cpassword'])) {
		$cpassword = $_POST['cpassword'];
	} else {
		$showerror = "Enter valid confirm password";
		$cpassword = NULL;
	}

	$existsql = "SELECT * FROM `users` WHERE username = '$username';";
	$result = mysqli_query($conn, $existsql);
	$numrows = mysqli_num_rows($result);

	if ($numrows > 0) {
		// $exist = true;
		$showerror = "Username already exists";

	} else {
		// $exist = false;
		if (($password == $cpassword) && ($password != NULL) && ($cpassword != NULL) && ($username != NULL)) {
			$hash = password_hash($password,PASSWORD_DEFAULT);
			$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hash');";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				$showalert = true;
			}
		} else {
			$showerror = "Password don't match";
		}
	}

}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="style.css">
	<title>SingUp</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<?php require 'components\_navbar.php'; ?>

	<!-- Alert success -->
	<?php
	if ($showalert) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> You successfully created account.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	} elseif ($showerror) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Error!</strong> ' . $showerror . '
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}
	?>

	<br><br>
	<!-- signup form -->

	<div class="container border" style="width: 40%">
		<form action="#" method="post">
			<h1 style="margin: 10px 0 50px 0px;" class="text-center">SignUp to our Website</h1>
			<div class="mb-3">
				<label class="form-label">Username</label>
				<input type="text" class="form-control" id="username" name="username" maxlength="30" required>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" maxlength="10" required>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword2" class="form-label">Confirm Password</label>
				<input type="password" class="form-control" id="cpassword" name="cpassword" maxlength="10" required>
				<div class="form-text">Make sure you enter same password</div>
			</div>
			<button type="submit" class="btn btn-primary">signup</button>
		</form>
	</div>







	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
		integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
		crossorigin="anonymous"></script>
</body>

</html>