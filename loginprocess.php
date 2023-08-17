<!-- Sebagai file untuk memproses login -->

<?php 
include 'dbconfig.php';
session_start();

$name = $_POST['name'];
$pwd = $_POST['pass'];

$query=mysqli_query($connect, "SELECT * FROM staff WHERE staffName='".$name."' AND staffPass='".$pwd."' ");

if ($user = mysqli_fetch_array($query)) {
    $_SESSION['user'] = $user['staffID'];
    header("Location: mainmenu.php");
} else {
    echo "<script>alert('Failed to login. Please try again later!')</script>";
    header("Location: login.php");
}

?>