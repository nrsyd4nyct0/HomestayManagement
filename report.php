<?php
include 'dbconfig.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>HBMS</title>
    <link rel="stylesheet" href="D:/Bitnami for XAMPP/htdocs/HomestayBookingManagementSystem/css/w3.css">    
    <link href="https://fonts.googleapis.com/css2?family=Domine:wght@500&family=Inter:wght@200;500&display=swap" rel="stylesheet">

    <style>
        .w3-Domine {
            font-family: 'Domine', serif;
        }
    </style>
</head>
<body>
    <div class="w3-container w3-center">
        <p class="w3-domine w3-jumbo">HBMS</p>
        <?php 
            $search = $_POST['search'];

            $month = $search;
            $monthname = date('F', mktime(0, 0, 0, $month,  10));
        ?>
        <hr>
        <h4><?php echo $monthname ?> Booking Record</h4>
        <table class="w3-table w3-border w3-centered" border="1">
            <tr>
                <th>#</th>
                <th>Booking ID</th>
                <th>Name</th>
                <th>Room Type</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Duration</th>
                <th>Room Price</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <?php 
                    $sql = mysqli_query($connect, "SELECT booking.*, room.* FROM booking INNER JOIN room ON booking.roomID = room.roomID WHERE MONTH(checkoutdate) = '".$search."' ");
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<tr><td colspan="10">No record has been found!</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                            echo '<tr>';
                            echo '<td>' .$no. '</td>';
                            echo '<td>' .$row['bookingID']. '</td>';
                            echo '<td>' .$row['customername']. '</td>';
                            echo '<td>' .$row['customerphoneno']. '</td>';
                            echo '<td>' .$row['roomtype']. '</td>';
                            echo '<td>' .$row['checkindate']. '</td>';
                            echo '<td>' .$row['checkoutdate']. '</td>';
                            echo '<td>' .$row['duration']. '</td>';
                            echo '<td>RM ' .$row['price']. '</td>';
                            echo '<td>RM ' .$row['totalprice']. '</td>';
                            echo '<tr>';
                            $no++;
                        }
                    }
                ?>
            </tr>
            <tr>
                <?php
                $query = mysqli_query($connect, "SELECT SUM(totalprice) AS total FROM booking WHERE MONTH(checkoutdate) = '".$search."' ");
                $rm = mysqli_fetch_array($query); 
                ?>
                <td colspan="9">Total Price</td>
                <td colspan="10"><?php echo $rm['total'] ?></td>
            </tr>
        </table>
    </div>
    <hr>
    <center>
        <input type="button" class="w3-btn w3-border" value="PRINT" onclick="window.print()">
        <a href="mainmenu.php">
            <button class="w3-btn w3-border">MAIN MENU</button>
        </a>
    </center>
</body>

</html>

<?php include 'footer.php'; ?>