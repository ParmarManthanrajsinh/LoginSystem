<!doctype html>
<html lang="en">

<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
	header("location: login.php");
	exit;
}

include "components\_dbconnect.php";

$username = $_SESSION["username"];
$user_id = 0;

$sql = "SELECT * from users WHERE username='$username'; ";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);
	$user_id = $row['id'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

	if (isset($_POST['deletebutton'])) {
		$id = $_POST['id'];

		// Prepare the SQL statement to prevent SQL injection
		$stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
		$stmt->bind_param("i", $id);

		// Execute the statement
		if ($stmt->execute()) {
			// Fetch the image name before deletion
			$stmt = $conn->prepare("SELECT img_name FROM student WHERE id = ?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($img_name);
			$stmt->fetch();

			// Delete the image file if it exists
			if ($img_name && file_exists("uploads/" . $img_name)) {
				unlink("uploads/" . $img_name);
			}

			// Confirm the deletion
			echo "<script>alert('Student deleted successfully!')</script>";
		} else {
			echo "<script>alert('Error deleting student.')</script>";
		}

		// Close the statement
		$stmt->close();
	} elseif (isset($_POST['update'])) {
		$id = $_POST['id'];
		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$target_file = "lol";

		// Handling file upload
		$allowed_file_types = ['image/png', 'image/jpeg'];
		$max_file_size = 10 * 1024 * 1024; // 10MB in bytes

		if (isset($_FILES['img_name']) && $_FILES['img_name']['error'] == 0) {
			$img_name = $_FILES['img_name']['name'];
			$file_size = $_FILES['img_name']['size'];
			$file_type = mime_content_type($_FILES['img_name']['tmp_name']);
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($img_name);

			if (!in_array($file_type, $allowed_file_types)) {
				echo "Invalid file type. Only PNG and JPEG files are allowed.";
				exit();
			}
			if ($file_size > $max_file_size) {
				echo "File size exceeds the 10MB limit.";
				exit();
			}

			if (move_uploaded_file($_FILES['img_name']['tmp_name'], $target_file)) {
				// echo "File has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
				exit();
			}
		} else {
			echo "File upload error.";
			exit();
		}

		$stmt = $conn->prepare("UPDATE `student` SET `user_id` = ?, `first_name` = ?, `last_name` = ?, `dob` = ?, `gender` = ?, `city` = ?, `img_name` = ? WHERE `student`.`id` = ?");
		$stmt->bind_param("sssssssi", $user_id, $first_name, $last_name, $dob, $gender, $city, $target_file, $id);
		$stmt->execute();


	} else {

		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$target_file = "lol";

		// Handling file upload
		$allowed_file_types = ['image/png', 'image/jpeg'];
		$max_file_size = 10 * 1024 * 1024; // 10MB in bytes

		if (isset($_FILES['img_name']) && $_FILES['img_name']['error'] == 0) {
			$img_name = $_FILES['img_name']['name'];
			$file_size = $_FILES['img_name']['size'];
			$file_type = mime_content_type($_FILES['img_name']['tmp_name']);
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($img_name);

			if (!in_array($file_type, $allowed_file_types)) {
				echo "Invalid file type. Only PNG and JPEG files are allowed.";
				exit();
			}
			if ($file_size > $max_file_size) {
				echo "File size exceeds the 10MB limit.";
				exit();
			}

			if (move_uploaded_file($_FILES['img_name']['tmp_name'], $target_file)) {
				// echo "File has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
				exit();
			}
		} else {
			echo "File upload error.";
			exit();
		}

		// Prepare an SQL statement
		$stmt = $conn->prepare("INSERT INTO `student` (`user_id`, `first_name`, `last_name`, `dob`, `gender`, `city`, `img_name`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("issssss", $user_id, $first_name, $last_name, $dob, $gender, $city, $target_file);

		if ($stmt->execute()) {
			// echo "Data Inserted";
		} else {
			echo "Data Not Inserted: " . $stmt->error;
		}

		$stmt->close();
	}
}
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome <?php print $_SESSION["username"]; ?></title>

	<link rel="stylesheet" href="style.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<?php require 'components\_navbar.php'; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
		integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
		crossorigin="anonymous"></script>

	<br><br>

	<div class="container border">

		<a href="Insert_form.php">
			<button class="btn btn-primary">Add Student</button>
		</a><br>


		<?php include "components\_table.php"; ?>
	</div>

	<br><br>
</body>

</html>