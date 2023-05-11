<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<script>
	function validateForm() {
	  var email = document.getElementById("email").value;
	  var password = document.getElementById("password").value;

	  if (email == "" || password == "") {
	    alert("Please enter your email and password.");
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
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Check if all fields are filled out
	if (empty($email) || empty($password)) {
		echo '<div class="alert alert-danger" role="alert">Please enter your email and password.</div>';
	} else {

		// Check if the user exists in the database
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1) {
			// start session
			session_start();
			// set session variables
			$_SESSION['email'] = $email;
			// redirect to index.php because we must follow the order.
			header('Location: index.php');
			exit;
		} else {
			echo '<div class="alert alert-danger" role="alert">Invalid email or password</div>';
		}
	}

	// Close database connection
	mysqli_close($conn);
}
?>

<div class="d-flex justify-content-center">
	<div class="col-md-6">
		<h2>Login Form</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm();">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<p>Already have an account? <a href="register.php">Register here</a>.</p>
		</form>
	</div>
</div>

</body>
</html>
