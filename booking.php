<?php
    include 'dbconfig.php';
  
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:login.php');
    }
?>

<?php include 'header.php'; ?>

<!-- body -->
<div class="w3-content w3-section w3-center w3-pale-red" style="flex:1;">
    <br>
    <h5 class="w3-xxlarge w3-text-red">CUSTOMER BOOKING</h5>
    <br>
    <form action="bookingprocess.php" method="POST">
        <table class="w3-table w3-border">
            <tr>
                <td>Customer Name</td>
                <td>
                    <input class="w3-input" type="text" name="customername" required>
                </td>
            </tr>
            <tr>
                <td>Customer Phone No</td>
                <td>
                    <input class="w3-input" type="text" name="customerphoneno" required>
                </td>
            </tr>
            <tr>
                <td>Room Type</td>
                <td>
                    <select class="w3-select" name="roomID" id="">
                        <option value=""></option>
                        <?php 
                        $query="SELECT * FROM room";
                        $result=mysqli_query($connect, $query);
                        $menu="";
                        while ($row=mysqli_fetch_array($result)) {
                            $menu .="<option value=". $row['roomID'] .">". $row['roomtype'] ." | RM" . $row['roomprice'] . "</option>";
                        }
                        echo $menu;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Check-In</td>
                <td>
                    <input class="w3-input" type="date" name="checkindate" required>
                </td>
            </tr>
            <tr>
                <td>Check-Out</td>
                <td>
                    <input class="w3-input" type="date" name="checkoutdate" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <button class="w3-button w3-deep-orange" type="submit" name="add">BOOK</button>
                    </center>
                </td>
            </tr>
        </table>

        <?php
        ?>
    </form>
</div>

<?php include 'footer.php'; ?>