<?php
    include 'dbconfig.php';
  
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:index.php');
    }
?>

<?php include 'header.php'; ?>

<!-- body -->

<?php include 'footer.php'; ?>