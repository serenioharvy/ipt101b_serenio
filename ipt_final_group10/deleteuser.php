<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete User</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    /* Center the form horizontally and vertically */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      
      <?php
        $conn = mysqli_connect("localhost", "root", "", "myDB");
        $id = $_POST['id'];
        
        if(isset($_POST['delete'])) {
          $query = "DELETE FROM users WHERE id=$id";
        
          if (mysqli_query($conn, $query)) {
              echo "<p class='alert alert-success'>User deleted successfully</p>";
          } else {
              echo "<p class='alert alert-danger'>Error deleting user: " . mysqli_error($conn) . "</p>";
          }
        
          header("Location: viewuser.php");
          exit();
        }
      ?>

<form method="POST" action="deleteuser.php">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <p>Are you sure you want to delete this user?</p>
  <button type="submit" name="delete" class="btn btn-danger">Yes</button>
  <a href="viewuser.php" class="btn btn-primary">No</a>
</form>
      
    </div>
  </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>






