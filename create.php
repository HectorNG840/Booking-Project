<?php
require_once "config.php";

session_start();

$date = $restaurant = $phone = $notes = $username  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = trim($_POST["date"]);

    $restaurant = trim($_POST["restaurants"]);

    $phone = trim($_POST["phone"]);

    $notes = trim($_POST["notes"]);


    $username = $_SESSION['username'];


          $sql = "INSERT INTO `bookings` (`date`, `restaurant`, `phone`,`notes`,`username`) VALUES ('$date', '$restaurant','$phone','$notes','$username')";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
               echo "Something went wrong: $sql";
          }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>Make a reservation</title>
</head>
<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 22rem"
    >
    <div style= "text-align:center;">
    <h2>Make a reservation</h2>
    </div>
    <form action="create.php" method="post" id= "booking">
        <div>
        <br>
            <label style="margin-right:10px;">Date</label>
            <input type="datetime-local" name="date" value="">
        </div>
        <div>
        <br>
            <label style="margin-right:10px;">Restaurant</label>
            <select name="restaurants" id="restaurants">
                <option value="Pita">Pita</option>
                <option value="Sushi Panda">Sushi Panda</option>
                <option value="Pizzeria Carlos">Pizzeria Carlos</option>
                <option value="Makalu">Makalu</option>
            </select>
        </div>
        <div>
        <br>
            <label style="margin-right:10px;">Phone</label>
            <input type="tel" name="phone" value="">
        </div>
        <br>
        <label style="margin-bottom: 5px;">Notes</label>
        <div>
        <textarea rows="4" cols="30" name="notes" form="booking">Enter text here...</textarea>
        </div>
        <br>
        <div style= "text-align:center;">
        <input type="submit" class="btn btn-success" value="Submit" style= "margin-right: 15px;">
        <a href="index.php" class="btn btn-primary" style= "margin-right: 15px;">Back</a>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>