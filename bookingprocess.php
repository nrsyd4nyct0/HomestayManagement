<?php
    include 'dbconfig.php';
  
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:login.php');
    }
?>

<?php 
if (isset($_POST['add'])) {
    $customername = $_POST['customername'];
    $customerphoneno = $_POST['$customerphoneno'];
    $roomID = $_POST['roomID'];
    $checkindate = $_POST['$checkindate'];
    $checkoutdate = $_POST['$checkoutdate'];

    $bookingID = "CZ".rand(1000000, 9999999);
    $datediff = strtotime($checkoutdate) - strtotime($checkindate);
    $duration = floor($datediff/(60*60*24));

    $sql = mysqli_query($connect, "SELECT roomprice FROM room WHERE roomID = '".$roomID."' ");
    $result = mysqli_fetch_array($sql);

    $price = $result['roomprice'];

    $totalprice = $price * $duration;

    mysqli_query($connect, "INSERT INTO booking VALUES ('".$bookingID."', '".$roomID."', '".$customername."', '".$customerphoneno."', '".$checkindate."', '".$checkoutdate."', '".$duration."', '".$totalprice."') ");
}
?>

<?php include 'header.php'; ?>

<!-- body -->
<div class="w3-content">
    <div class="w3-panel w3-blue">
        <p>Customer booking has been recorded</p>
    </div>
    <table class="w3-table w3-border w3-centered">
        <tr>
            <th>Booking No</th>
            <th>Customer Name</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Duration (day)</th>
            <th>Total Price</th>
        </tr>
        <tr>
            <td><?php echo $bookingID; ?></td>
            <td><?php echo $customername; ?></td>
            <td><?php echo date('d-M-Y', strtotime($checkindate)); ?></td>
            <td><?php echo date('d-M-Y', strtotime($checkoutdate)); ?></td>
            <td><?php echo $duration; ?></td>
            <td><?php echo $totalprice; ?></td>
        </tr>
    </table>
</div>

<?php include 'footer.php'; ?>