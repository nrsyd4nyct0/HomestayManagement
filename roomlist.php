<?php
include 'dbconfig.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>

<?php include 'header.php'; ?>

<!-- body -->
<br>
<body>
    <div class="w3-container w3-border w3-center" style="flex: 1;">
        <div class="w3-panel w3-pink">
            <h5>Room List</h5>
        </div>
        <table class="w3-table w3-border w3-centered" border="1">
            <tr>
                <th>No.</th>
                <th>Room ID</th>
                <th>Room Type</th>
                <th>Room Price</th>
                <th>Update</th>
            </tr>
            <tr>
                <?php
                $sql = mysqli_query($connect, "SELECT * FROM room");
                if (mysqli_num_rows($sql) == 0) {
                    echo '<tr><td colspan="5">No record has been found!</td></tr>';
                } else {
                    $no = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $row['roomid'] . '</td>';
                        echo '<td>' . $row['roomtype'] . '</td>';
                        echo '<td>RM ' . $row['roomprice'] . '</td>';
                        echo '<td><a href="roomupdate.php?id=' . $row['roomid'] . '">UPDATE</a></td>';
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