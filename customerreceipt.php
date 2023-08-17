<?php
include 'dbconfig.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

$query = mysqli_query($connect, "SELECT booking.*, FROM booking INNER JOIN room ON booking.roomID = room.roomID WHERE bookingID = '" . $_GET['bookingID'] . "' ");
$result = mysqli_fetch_array($query);
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

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }
    </style>
</head>
<body>
    <div class="w3-container w3-center" style="flex: 1;">
        <h5 class="w3-domine w3-jumbo">Customer Receipt</h5>
        <div class="w3-border">
            <h6>Booking ID: <b><?php echo $result['bookingID'] ?></b></h6>
            <h6>Name: <b><?php echo $result['customername'] ?></b></h6>
            <h6>Phone No: <b><?php echo $result['customerphoneno'] ?></b></h6>
            <h6><b><?php echo $result['roomtype'] ?></b></h6>
            <h6>Check in: <b><?php echo date('d.m.Y', strtotime($result['checkindate'])) ?></b> | Check out: <b><?php echo date('d.m.Y', strtotime($result['checkoutdate']))?></h6>
            <h6>Price: <b>RM <?php echo $result['roomprice'] ?></b> x <b><?php echo $result['duration'] ?> hari</b></h6>
            <h6>Total price: <b>RM <?php echo $result['totalprice'] ?></b></h6>
            <br>
            <h6>Thank you. Please come again.</h6>
        </div>
    </div>
    <hr>
    <center>
        <input type="button" class="w3-btn w3-border" value="PRINT" onclick="window.print()">
        <a href="mainmenu.php"><button class="w3-btn w3-border">MAIN MENU</button></a>
    </center>
</body>

</html>

<?php include 'footer.php'; ?>