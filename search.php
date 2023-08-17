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
    <hr>
    <div class="w3-container w3-center" style="width: 50%; margin: 0px auto; flex: 1;">
        <div class="w3-border">
            <div class="w3-container w3-margin w3-pink">
                <form action="report.php" method="POST" enctype="multipart/form-data">
                    <p></p>
                    <label for="">Customer Booking Record</label>
                    <br>
                    <hr>
                    <select class="w3-search w3-border" name="search" id="">
                        <option value="">Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <input class="w3-button w3-deep-orange w3-small" type="submit" name="search" value="SEARCH">
                    <p></p>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>