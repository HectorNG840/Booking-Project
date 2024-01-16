<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>Index</title>
</head>
<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-12">
                <h2>Bookings</>
                <a href="create.php" class="btn btn-success">Make a reservation</a>
                <a href="logOut.php" class="btn btn-primary" style="float: right; margin-right: 90px; margin-top:2.5px; font-size: 0.7em;" >Exit</a>
            </div>

            <div>
            <?php
            require_once "config.php";
            session_start();
            $username = $_SESSION['username'];
            if($username == 'root' && !isset($_SESSION['loggedin'])){
                $query = "SELECT * FROM bookings";  
            }
            else{
                $query = "SELECT * FROM bookings where username = '$username'";
            }
            
            

            if ($bookings = mysqli_query($conn, $query)){
                if (mysqli_num_rows($bookings) > 0 ){
            ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Restaurant</th>
                        <th>Phone number</th>
                        <th>Notes</th>
                        <th>Operations</th>
                    </tr>
                    <tbody>
                        <?php
                        while ($booking = mysqli_fetch_array($bookings)){
                            echo "<tr>";
                            echo "<td align='center'>" . $booking["id"] . "</td>";
                            echo "<td>" . $booking["date"] . "</td>";
                            echo "<td>" . $booking["restaurant"] . "</td>";
                            echo "<td>" . $booking["phone"] . "</td>";
                            echo "<td>" . $booking["notes"] . "</td>";
                            echo "<td>
                                <center>
                                    <a href='read.php?id=". $booking["id"] ."' title='View' data='tooltip'><i class= 'fa fa-eye' style='margin-right: 20px;'></i></a>
                                    <a href='update.php?id=". $booking["id"] ."' title='Edit'data='tooltip'><i class= 'fa fa-edit' style='margin-right: 20px;'></i></a>
                                    <a href='delete.php?id=". $booking["id"] ."' title='Delete'data='tooltip'><i class= 'fa fa-trash'></i></a>
                                </center>
                            </td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </thead>
            </table>
            <?php        
                }
                else{
                    echo "<p><em>No records found.</em></>";
                }
            }
            else{
                echo "<label>ERROR: Could not execute $query" .mysqli_error($conn) ."</label>";
            }

            mysqli_close($conn);



            ?>
            </div>
        </div>
    </div>  
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>