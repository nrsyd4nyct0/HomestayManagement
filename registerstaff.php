<!-- Sebagai page untuk mendaftar staff baharu -->

<?php
include 'dbconfig.php';
$error = false;

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $position = $_POST['position'];
    $password = $_POST['pass'];

    if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
        $error = true;
        $username_error = "Username must contain only alphabet and space";
    }

    if (strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be more than 6 characters.";
    }

    if (strlen($password) > 12) {
        $error = true;
        $password_error = "Password must not exceeds 12 characters.";
    }

    if (!$error) {
        if (mysqli_query($connect, "INSERT INTO staff VALUES ('', '" . $username . "', '" . $position . "', '" . $password . "')")) {
            echo "<script>alert('Register staff successful! Please login. ');</script>";
        } else {
            echo "<script>alert('Failed! Please register again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>HBMS - Sign in</title>
    <link rel="stylesheet" href="css/w3.css">    
    <link href="https://fonts.googleapis.com/css2?family=Domine" rel="stylesheet">

    <style>
        .w3-Domine {
            font-family: 'Domine', serif;
            font-family: 'Inter', sans-serif;
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
        <p class="w3-domine" style="font-size:50px;">HBMS</p>
        <div class="w3-border">
            <div class="w3-container w3-margin w3-deep-orange">
                <h3>REGISTER</h3>
                <hr>
                <form action="registerstaff.php" method="POST">
                    <label for="name">Name: </label>
                    <input class="w3-input w3-center" type="text" name="username" required placeholder="Staff name here." value="<?php if($error) echo $username; ?>">
                    <span style="color:red"><?php if (isset($username_error)) echo $username_error; ?></span>
                    <br>
                    <label for="position">Position: </label>
                    <select class="w3-select w3-border w3-center" name="position" id="" style="margin-bottom: 20px;">
                        <option value="" disabled selected>Position</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                    </select>
                    <label for="password">Password: </label>
                    <input class="w3-input w3-center" type="password" name="pass" required placeholder="Password here." value="<?php if($error) echo $password; ?>">
                    <span style="color:red"><?php if(isset($password_error)) echo $password_error; ?></span>
                    <br>
                    <button class="w3-btn w3-blue" type="submit" name="register">REGISTER</button>
                    <hr>
                    <h6>
                        <a href="login.php">Login here</a>
                    </h6>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php include 'footer.php'; ?>