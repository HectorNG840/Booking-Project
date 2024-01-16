<?php
require_once "config.php";

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST["username"]);
  $password = trim($_POST["password"]);

  $q = "SELECT COUNT(*) as count from users where username = '$username'";
  $query = mysqli_query($conn, $q);
  $array = mysqli_fetch_array($query);

  if ($array['count'] > 0) {
      $error_message = "Username already exists. Please choose a different username.";
  } else {
      $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";

      if (mysqli_query($conn, $sql)) {
          header("location: login.php");
          exit();
      } else {
          $error_message = "Something went wrong: " . mysqli_error($conn);
      }
  }
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="bg-info d-flex justify-content-center align-items-center vh-100">
<div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
    <div class="d-flex justify-content-center">
        <img src="assets/login-icon.svg" alt="login-icon" style="height: 7rem" />
    </div>
    <div class="text-center fs-1 fw-bold">Register</div>
    <?php
    if (!empty($error_message)) {
        echo "<div class='alert alert-danger' role='alert'>$error_message</div>";
    }
    ?>
    <form action="register.php" method="POST">
      <div class="input-group mt-4">
        <div class="input-group-text bg-info">
          <img
            src="assets/username-icon.svg"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
          class="form-control bg-light"
          type="text"
          name="username"
          placeholder="Username"
        />
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-info">
          <img
            src="assets/password-icon.svg"
            alt="password-icon"
            style="height: 1rem"
          />
        </div>
        <input
          class="form-control bg-light"
          type="password"
          name= "password"
          placeholder="Password"
        />
      </div>
      <button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" type="submit">
        Register
        </button>
        <div
    class="d-flex gap-1 justify-content-center mt-1">
    <a href="login.php" class="text-decoration-none text-info fw-semibold">Go Back</a>
</div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>