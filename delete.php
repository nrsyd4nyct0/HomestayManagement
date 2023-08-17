<?php
    include 'dbconfig.php';
  
    session_start();

    if(isset($_GET['bookingID'])) {
        $booking_ID = $_GET['bookingID'];

        mysqli_query($connect,"DELETE FROM booking WHERE bookingID = '".$booking_ID."' ");
        echo "<script>alert('Successfully delete!');
        window.location='bookinglist.php'</script>";
    } else {
        echo "<script>alert('Please try again later!');
        window.location='bookinglist.php'</script>";
    }
?>

<?php include 'footer.php'; ?>