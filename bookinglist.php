<?php
include 'dbconfig.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>

<?php include 'header.php'; ?>

<!-- body -->

<body>
    <br>
    <div class="w3-container w3-border w3-center" style="flex: 1;">
        <div class="w3-panel w3-pink">
            <h5>Booking List</h5>
        </div>
        <table class="w3-table w3-border w3-centered" border="1">
            <tr>
                <th>No</th>
                <th>Booking No</th>
                <th>Customer Name</th>
                <th>Customer Phone No</th>
                <th>Room Type</th>
                <th>Check in</th>
                <th>Check out</th>
                <th>Duration (day)</th>
                <th>Cancel Booking</th>
            </tr>
            <tr>
                <?php
                $sql = mysqli_query($connect, "SELECT booking.*, room.* FROM booking, room WHERE booking.roomID = room.roomID");
                if (mysqli_num_rows($sql) == 0) {
                    echo '<tr><td>No record has been found!</td></tr>';
                } else {
                    $no = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                        echo '<tr>';
                        echo '<td><a href="customerreceipt.php?id=' . $row['bookingID'] . '">' . $row['bookingID'] . '</a></td>';
                        echo '<td> ' . $row['customername'] . ' </td>';
                        echo '<td> ' . $row['customerphoneno'] . ' </td>';
                        echo '<td> ' . $row['roomtype'] . ' </td>';
                        echo '<td> ' . date('d.m.Y', strtotime($row['checkindate'])) . ' </td>';
                        echo '<td> ' . date('d.m.Y', strtotime($row['checkoutdate'])) . ' </td>';
                        echo '<td> ' . $row['duration'] . ' </td>';
                        echo '<td><a href="delete.php?id=' . $row['bookingID'] . '">DELETE</a></td>';
                        echo '<tr>';
                        $no++;
                    }
                }
                ?>
            </tr>
        </table>
        <br>
    </div>
</body>

<?php include 'footer.php'; ?>