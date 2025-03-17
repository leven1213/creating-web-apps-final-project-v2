<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Viewport set to scale 1.0 -->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descriptive meta tags -->   
        <meta name="description" content="About page for PowerUp">
		<meta name="keywords" content="PowerUp, recruitment, IT">
		<meta name="author" content="Levenspeil Sangalang">
        <title>PowerUp &#8211; About</title>
        <!-- References to external basic CSS file -->
        <link rel="stylesheet" type="text/css" href="/styles/style.css">
        <!-- Favicon for tab -->
        <link rel="icon" type="image/x-icon" href="images/game-fill.png">
        <!-- References to web icons from Remixicon.com -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- References to external fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;400;600&family=Darker+Grotesque:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body> 
        <!-- Begin processing-->
        <?php
            function sanitise_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            // Checks if process was triggered by a form submit, if not display an error message
            if (isset ($_POST["firstname"])){
                $firstname = $_POST["firstname"];
                $firstname = sanitise_input($firstname); 
            }
            else {
                // Redirect to form, if process not triggered by a form submit
                header ("location: register.html");
            }
            if (isset ($_POST["lastname"])){
                $lastname = $_POST["lastname"];
                $lastname = sanitise_input($lastname); 
            }
            else {
                header ("location: register.html");
            }
            if (isset ($_POST["species"])){
                $species = $_POST["species"];
                $species = sanitise_input($species); 
            }
            else {
                header ("location: register.html");
            }
            if (isset ($_POST["age"])){
                $age = $_POST["age"];
                $age = sanitise_input($age); 
            }
            else {
                header ("location: register.html");
            }
            $tour = "";
            if (isset ($_POST["1day"])) $tour = $tour."one-day tour; ";
            if (isset ($_POST["4day"])) $tour = $tour."four-day tour; ";
            if (isset ($_POST["10day"])) $tour = $tour."ten-day tour; ";
            
            if (isset ($_POST["food"])){
                $food = $_POST["food"];
                $food = sanitise_input($food); 
            }
            else {
                header ("location: register.html");
            }
            if (isset ($_POST["partySize"])){
                $partySize = $_POST["partySize"];
                $partySize = sanitise_input($partySize); 
            }
            else {
                header ("location: register.html");
            }
            $errMsg = "";
            if ($firstname==""){
                $errMsg .= "<p>Please enter your first name.</p>";
            }
            else if (!preg_match ("/^[a-zA-Z]*$/ ", $firstname)){
                $errMsg .= "<p>We only allow alpha letters for your first name.</p>";
            }
            if ($lastname==""){
                $errMsg .= "<p>Please enter your last name.</p>";
            }
            else if (!preg_match ("/^[a-zA-Z]*$/ ", $lastname)){
                $errMsg .= "<p>We only allow alpha letters for your last name.</p>";
            }
            if (!is_numeric($age)){
                $errMsg .= "<p>Please enter a valid number.</p>";
            }
            else if ($age < 10 || $age > 10000){
                $errMsg .= "<p>Only ages between 10 to 10,000 years old are permitted.</p>";
            }
            if ($errMsg !==""){
                echo "<p>$errMsg</p>";
            }
            else{
                echo "<hr>
                    <p><h3>Welcome $firstname $lastname!</h3> 
                    You are now booked on the <b>$tour</b>
                    <br>Species: <b>$species</b>
                    <br>Age: <b>$age</b>
                    <br>Meal Preference: <b>$food</b>
                    <br> Number of Travellers: <b>$partySize</b></p>";
            }
        ?>
    </body>
</html>