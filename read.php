<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>View Record</title>
</head>
<body class="bg-info d-flex justify-content-center align-items-center vh-100">
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM bookings WHERE ID = '$id'");

        if ($booking = mysqli_fetch_assoc($query)) {
            $date   = $booking["date"];
            $restaurant  = $booking["restaurant"];
            $phone  = $booking["phone"];
            $notes  = $booking["notes"];
        } else {
            header("location: read.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 22rem"
    >
    <div style= "text-align:center;">
    <h1> Reservation View</h1>
    </div>
    <div>
        <br>
        <label>Date: <?php echo $date ?></p>
    </div>
    <div class="form-group">
        <label>Restaurant: <?php echo $restaurant ?></p>
        <label>Phone: <?php echo $phone ?></p>
        <label>Notes: <?php echo $notes ?></p>
    </div>
    <div style= "text-align:center;">
        <br>
        <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>