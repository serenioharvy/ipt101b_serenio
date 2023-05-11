<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<script>
	function validateForm() {
	  var name = document.getElementById("name").value;
	  var email = document.getElementById("email").value;
	  var password = document.getElementById("password").value;

	  if (name == "" || email == "" || password == "") {
	    alert("Please enter your name, email, and password.");
	    return false;
	  }
	}
	</script>
</head>
<body>

<?php
// Check if the form has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Escape user inputs for security
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Check if all fields are filled out
	if (empty($name) || empty($email) || empty($password)) {
		echo '<div class="alert alert-danger" role="alert">Please enter your name, email, and password.</div>';
	} else {

		// Create table if it doesn't exist
		$sql = "CREATE TABLE IF NOT EXISTS users (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			email VARCHAR(50),
			password VARCHAR(50)
		)";
		mysqli_query($conn, $sql);

		// Check if the user already exists in the database
		$sql = "SELECT * FROM users WHERE name='$name' OR email='$email'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			echo '<div class="alert alert-danger" role="alert">Error: Name or email is already in use. Please try another.</div>';
		} else {

			// Insert new user into the database
			$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
			if(mysqli_query($conn, $sql)) {
				// Redirect to login.php with success message and email
				header("Location: login.php?success=1&email=$email");
				exit;
			} else {
				echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . "<br>" . mysqli_error($conn) . '</div>';
			}
		}
	}

	// Close database connection
	mysqli_close($conn);
}
?>

<div class="d-flex justify-content-center">
	<div class="col-md-6">
		<h2>Registration Form</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm();">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<p>Already have an account? <a href="login.php">Log in here</a>.</p>
		</form>
	</div>
</div>

</body>
</html>
