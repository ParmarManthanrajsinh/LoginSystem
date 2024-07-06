<?php
$login = false;
$showerror = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$exist = false;
	include "components/_dbconnect.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	// $sql = "SELECT * from users WHERE username='$username' AND password='$password'; ";
	$sql = "SELECT * from users WHERE username='$username'; ";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);

	if ($num == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			if (password_verify($password, $row['password'])) {
				$login = true;
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header("location: home.php");
			} else {
				$showerror = "Invalid Password and Username";
			}
		}


	} else {
		$showerror = "Invalid Password and Username";
	}

}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="style.css">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<?php require 'components\_navbar.php'; ?>

	<!-- Alert success -->
	<?php
	if ($login) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Success!</strong> You successfully login account.
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	} elseif ($showerror) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Error!</strong> ' . $showerror . '
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	}
	?>

	<br><br>

	<!-- login form -->
	<div class="container border" style="width: 40%">
		<form action="#" method="post">
			<h1 style="margin: 10px 0 50px 0px;" class="text-center">Login to our Website</h1>
			<div class="mb-3">
				<label class="form-label">Username</label>
				<input type="text" class="form-control" id="username" name="username" required>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" maxlength="10" required>
			</div>
			<button type="submit" class="btn btn-primary">login</button>
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