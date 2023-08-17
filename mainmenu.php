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
<div class="w3-container w3-border w3-center w3-pale-red" style="flex: 1;">
    <h5 class="w3-xxlarge w3-text-pink w3-pale-red">MAIN MENU</h5>
    <img src="/HomestayBookingManagementSystem/images/1 (1).jpg" width="360" height="240" style="display: inline; margin: 0 2px; padding-bottom: 5px;" alt="">
    <img src="/HomestayBookingManagementSystem/images/2 (1).jpg" width="360" height="240" style="display: inline; margin: 0 2px; padding-bottom: 5px;" alt="">
    <img src="/HomestayBookingManagementSystem/images/3 (1).jpg" width="360" height="240" style="display: inline; margin: 0 2px; padding-bottom: 5px;" alt="">
    <img src="/HomestayBookingManagementSystem/images/7.jpg" width="360" height="240" style="display: inline; margin: 0 2px; padding-top: 5px;" alt="">
    <img src="/HomestayBookingManagementSystem/images/10.jpg" width="360" height="240" style="display: inline; margin: 0 2px; padding-top: 5px;" alt="">
    <img src="/HomestayBookingManagementSystem/images/13.jpg" width="360" height="240" style="display: inline; margin: 0 2px; padding-top: 5px;" alt="">
</div>

<?php include 'footer.php'; ?>