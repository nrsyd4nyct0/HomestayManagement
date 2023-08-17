<!DOCTYPE html>
<html>

<head>
    <title>HBMS</title>
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
    <!--
    <div class="w3-header w3-red">
        <font size="2"><b>&nbsp; &nbsp; Font :</b></font>
        <button class="w3-button" onclick="resizeText(-1)"><font size="2">A-</font></button>
        <button class="w3-button" onclick="resizeText(1)"><font size="2">A+</font></button>

        <script type="text/javascript">
            function resizeText(multiplier) {
                if (document.body.style.fontSize == "") {
                    document.body.style.fontSize = "1.0em";
                }
                document.body.style.fontSize =parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
            }
        </script>
    </div>
    -->
    
    <div class="w3-bar w3-red" style="padding: 15px;">
        <a href="mainmenu.php" class="w3-bar-item w3-button">Main Menu</a>
        <a href="addroom.php" class="w3-bar-item w3-button">Room</a>
        <a href="roomlist.php" class="w3-bar-item w3-button">Room List</a>
        <a href="booking.php" class="w3-bar-item w3-button">Customer Booking</a>
        <a href="bookinglist.php" class="w3-bar-item w3-button">Booking List</a>
        <a href="search.php" class="w3-bar-item w3-button">Search</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
