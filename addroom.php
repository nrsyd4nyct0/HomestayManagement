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
    <div class="w3-content w3-section w3-center w3-pale-red" style="flex: 1;">
        <div class="w3-content w3-section w3-center">
            <div>
                <br>
                <h5 class="w3-xxlarge w3-text-pink">REGISTER NEW HOMESTAY</h5>
                <br>
                <form action="addroom.php" method="POST">
                    <table class="w3-table w3-border">
                        <tr>
                            <td>Room Type</td>
                            <td>
                                <input class="w3-input" type="text" name="roomtype" placeholder="Add room type here." required>
                            </td>
                        </tr>
                        <tr>
                            <td>Room Price</td>
                            <td>
                                <input class="w3-input" type="text" name="roomprice" placeholder="Add room price here." required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button class="w3-button w3-deep-orange" type="submit" name="add">ADD ROOM</button>
                                </center>
                            </td>
                        </tr>
                    </table>
                </form>
                <br>
                <a href="importfile.php">
                    <button class="w3-button w3-deep-orange">IMPORT DATA</button>
                </a>
            </div>
        </div>
    </div>
</body>

<!-- masukkan rekod ke database -->
<?php
if (isset($_POST['add'])) {
    $roomtype = $_POST['roomtype'];
    $roomprice = $_POST['roomprice'];

    $query = "INSERT INTO room VALUES('', '" . $roomtype . "', '" . $roomprice . "')";
    $result = mysqli_query($connect, $query);

    if ($result == TRUE) {
        echo '<script>alert("Room information has successfully been added!")</script>';
    } else {
        echo '<script>alert("Please retry.")</script>';
    }
}
?>

<?php include 'footer.php'; ?>