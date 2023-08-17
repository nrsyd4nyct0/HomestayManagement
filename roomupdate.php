<?php
    include 'dbconfig.php';
  
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:login.php');
    }

    $id = $_GET['id'];
?>

<?php include 'header.php'; ?>

<!-- body -->
<?php 
$query = mysqli_query($connect, "SELECT * FROM room WHERE roomID = '".$roomID."' ");
$row = mysqli_fetch_array($query);
?>

<div class="w3-content w3-center">
    <br>
    <h5>REGISTER ROOM</h5>
    <br>
    <form action="roomupdate.php" method="POST">
        <table class="w3-table w3-border">
            <tr>
                <td>Room ID</td>
                <td>
                    <input class="w3-input" type="text" name="up_roomID" value="<?php echo $row['roomID']?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Room Type</td>
                <td>
                    <input class="w3-input" type="text" name="up_roomtype" value="<?php echo $row['roomtype']?>">
                </td>
            </tr>
            <tr>
                <td>Room Price</td>
                <td>
                    <input class="w3-input" type="text" name="up_roomprice" value="<?php echo $row['roomprice']?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <button class="w3-button w3-deep-orange" type="submit" name="update">UPDATE</button>
                    </center>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <?php 
        if (isset($_POST['update'])) {
            $up_roomID = $_POST['up_roomID'];
            $up_roomtype = $_POST['up_roomtype'];
            $up_roomprice = $_POST['up_roomprice'];

            $updatequery = mysqli_query($connect, "UPDATE room SET roomID='".$up_roomID."', roomtype='".$up_roomtype."', roomprice='".$up_roomprice."' WHERE roomID='".$up_roomID."' ");

            echo "<script>alert('Successfully update!') window.location = 'roomlist.php'</script>";
        }
    ?>
</div>

<?php include 'footer.php'; ?>