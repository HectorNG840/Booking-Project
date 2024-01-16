<?php
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    require_once "config.php";
    $id = $_POST["id"];

    $query = "DELETE FROM bookings WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("location: index.php");
    } else {
         echo "Something went wrong. Please try again later.";
    }

    mysqli_close($conn);
} else {
    if (empty(trim($_GET["id"]))) {
        echo "Something went wrong. Please try again later.";
        header("location: list.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>Delete Record</title>
</head>
<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 26rem"
    >
    <div style= "text-align:center;">
    <h1>Delete Record</h1>
    </div>
    <br>
    <form action="delete.php" method="post">
        <div style= "text-align:center;">
            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
            <p>Are you sure you want to delete this record?</p>
            <p>
                <input type="submit" class="btn btn-danger" value="Yes" style= "margin-right: 15px;">
                <a href="index.php" class="btn btn-primary" style= "margin-right: 15px;">No</a>
            </p>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>