<!--- login is the index page -->

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>HBMS - Login</title>
    <link rel="stylesheet" href="css/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Domine" rel="stylesheet">

    <style>
        .w3-Domine {
            font-family: 'Domine', serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="w3-container w3-center" style="width:50%; margin: 0px auto; flex: 1;">
        <h2 class="w3-domine w3-jumbo">HBMS</h2>
        <div class="w3-border">
            <div class="w3-container w3-margin w3-deep-orange">
                <h3>LOGIN</h3>
                <hr>
                <form action="loginprocess.php" method="POST">
                    <label for="name">Name: </label>
                    <input class="w3-input w3-center" type="text" name="name" placeholder="Enter your name here.">
                    <br>
                    <label for="password">Password: </label>
                    <input class="w3-input w3-center" type="password" name="pass" placeholder="Enter your password here.">
                    <br>
                    <button class="w3-btn w3-blue" type="submit" name="login">LOGIN</button>
                    <hr>
                    <h6>
                        <a href="registerstaff.php">Register New Staff?</a>
                    </h6>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'footer.php'; ?>