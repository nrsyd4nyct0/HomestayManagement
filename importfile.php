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
    <div style="flex: 1;">
        <div class="w3-card-4 w3-center" style="width: 40%; margin: 0px auto;">
            <div class="w3-red">
                <h5 style="padding-top: 20px;">Import Data</h5>
                <hr>
            </div>
            <div class="w3-pale-red" style="padding: 5px;">
                <form action="" class="w3-panel w3-pale-red" method="POST" enctype="multipart/form-data">
                    <label for="">CSV file only</label>
                    <input type="file" class="w3-input w3-border" name="file">
                    <br>
                    <button class="w3-btn w3-deep-orange" type="submit" name="import">IMPORT</button>
                    <hr>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['import'])) {
        if ($_FILES['file']['name']) {
            $filename = explode(".", $_FILES['file']['name']);
            if ($filename[1] == 'csv') {
                $handle = fopen($_FILES['file']['tmp_name'], "r");
                fgetcsv($handle);
                while ($data = fgetcsv($handle)) {
                    $query = "INSERT INTO room VALUES ('$data[0]', '$data[1]', '$data[2]')";
                    mysqli_query($connect, $query);
                }
                fclose($handle);
                echo "<script>alert('Successfully recorded!');</script>";
            }
        }
    }
    ?>

</body>

<?php include 'footer.php'; ?>