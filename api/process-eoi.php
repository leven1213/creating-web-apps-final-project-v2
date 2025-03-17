<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Viewport set to scale 1.0 -->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descriptive meta tags -->   
        <meta name="description" content="Form processing PHP for PowerUp">
		<meta name="keywords" content="PowerUp, application form, IT">
		<meta name="author" content="Levenspeil Sangalang">
        <title>PowerUp &#8211; Process EOI</title>
        <!-- References to external basic CSS file -->
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
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
        <main>
            <!-- Top section -->  
            <!-- Begin processing-->
            <?php
                require("menu.inc"); 
                require_once ("settings.php");
                $SendData = true;

                // Sanitisation function definitions
                if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
                    // Error input header and styles inclusion begins 
                    require("invalid-eoi-header.inc"); 
                    require("error-open.inc");  
                    
                    function sanitise_input($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    } 
                    // First name
                    if (isset ($_POST["givenname"])){
                        $givenname = $_POST["givenname"];
                        $givenname = sanitise_input($givenname); 

                        if ($givenname==""){ 
                            echo "<h3>☼ First name is empty. Kindly enter.</h3>\n";  // User error message
                            $SendData = false;
                        }
                        else if (!preg_match ("/^[a-zA-Z]*$/ ", $givenname)){
                            echo "<h3>☼ First name should only have alpha characters.</h3>\n"; 
                            $SendData = false;
                        }
                        else if (strlen($givenname) > 20){
                            echo "<h3>☼ First name should have a maximum of 20 alpha characters.</h3>\n"; 
                            $SendData = false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }
                    // Last name
                    if (isset ($_POST["familyname"])){
                        $familyname = $_POST["familyname"];
                        $familyname = sanitise_input($familyname); 
                        if ($familyname==""){ 
                            echo "<h3>☼ Last name is empty. Kindly enter.</h3>\n";  // User error message
                            $SendData = false;
                        }
                        else if (!preg_match ("/^[a-zA-Z]*$/ ", $familyname)){ 
                            echo "<h3>☼ Last name should only have alpha characters.</h3>\n"; 
                            $SendData = false;
                        }
                        else if (strlen($familyname) > 20){ 
                            echo "<h3>☼ Last name should have a maximum of 20 alpha characters.</h3>\n"; 
                            $SendData = false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }
                    // Birthday
                    if (isset ($_POST["dob"])){
                        $dob = $_POST["dob"];
                        $dob = sanitise_input($dob); 
                        function dateMatch($dstring) {
                            $dmatch = array();
                            $dpattern = "/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/";
                            if (!preg_match($dpattern, $dstring, $dmatch)) return false;
                            if (!checkdate($dmatch[2], $dmatch[1], $dmatch[3])) return false;
                            return true;
                        }
                    
                        if (!dateMatch($dob)) { 
                            echo "<h3>☼ Date of birth should follow the DD/MM/YYYY format.</h3>\n";  // User error message
                            $SendData = false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }
                    // Street address
                    if (isset ($_POST["street"])){
                        $street = $_POST["street"];
                        $street = sanitise_input($street); 
                        if ($street == ""){ 
                            echo "<h3>☼ Street address is empty. Kindly enter.</h3>\n";  // User error message
                            $SendData = false;
                        }
                        else if (strlen($street) > 40){ 
                            echo "<h3>☼ Street address should have a maximum of 40 characters.</h3>\n";  
                            $SendData = false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }   
                    // Suburb/town
                    if (isset ($_POST["town"])){
                        $town = $_POST["town"];
                        $town = sanitise_input($town); 
                        if ($town ==""){ 
                            echo "<h3>☼ Suburb/town is empty. Kindly enter.</h3>\n";  // User error message
                            $SendData = false;
                        }
                        else if (strlen($town) > 40){ 
                            echo "<h3>☼ Suburb/town should have a maximum of 40 characters.</h3>\n"; 
                            $SendData = false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }
                    // Postcode
                    if (isset ($_POST["postcode"])){
                        $postcode = $_POST["postcode"];
                        $postcode = sanitise_input($postcode); 
                        if ($postcode ==""){ 
                            echo "<h3>☼ Postcode is empty. Kindly enter.</h3>\n";  // User error message
                            $SendData = false;
                        }
                        else if (strlen($postcode) != 4){ 
                            echo "<h3>☼ Postcode should be exactly 4 digits.</h3>\n"; 
                            $SendData = false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }
                    // State
                    if (isset ($_POST["state"])){
                        $state = $_POST["state"];
                        $state = sanitise_input($state); 
                        if ($state == "vic"){
                        if (!preg_match ("/^[3|8]+/", $postcode)){ 
                                echo "<h3>☼ Victoria postcode should be valid.<h3>\n";  // User error message
                                $SendData = false;
                            }
                        }
                        if ($state == "nsw"){
                        if (!preg_match ("/^[1|2]+/", $postcode)){ 
                                echo "<h3>☼ New South Wales postcode should be valid.</h3>\n"; 
                                $SendData = false;
                        }
                        }
                        if ($state == "qld"){
                            if (!preg_match ("/^[4|9]+/", $postcode)){ 
                                echo "<h3>☼ Queensland postcode should be valid.</h3>\n"; 
                                $SendData = false;
                            }
                        }
                        if ($state == "nt"){
                            if (!preg_match ("/^[0]+/", $postcode)){ 
                                echo "<h3>☼ Northern Territory postcode should be valid.</h3>\n"; 
                                $SendData = false;
                            }
                        }
                        if ($state == "wa"){
                            if (!preg_match ("/^[6]+/", $postcode)){ 
                                echo "<h3>☼ Western Australia postcode should be valid.<h3>\n"; 
                                $SendData = false;
                            }
                        }
                        if ($state == "sa"){
                            if (!preg_match ("/^[5]+/", $postcode)){ 
                                echo "<h3>☼ Southern Australia postcode should be valid.<h3>\n"; 
                                $SendData = false;
                            }
                        }
                        if ($state == "tas"){
                            if (!preg_match ("/^[7]+/", $postcode)){ 
                                echo "<h3>☼ Tasmania postcode should be valid.<h3>\n"; 
                                $SendData = false;
                            }
                        }
                        if ($state == "act"){
                            if (!preg_match ("/^[0]+/", $postcode)){ 
                                echo "<h3>☼ Australian Capital Territory postcode should be valid.</h3>\n"; 
                                $SendData = false;
                            }
                        } 
                    }						
                    else {
                        header ("location: apply.php");
                    }
                    // Email
                    if (isset ($_POST["email"])){
                        $email = $_POST["email"];
                        $email = sanitise_input($email); 
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                            echo "<h3>☼ Email should follow the 'username@email.com' format.</h3>\n";  // User error message
                            $SendData= false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }
                    // Phone number
                    if (isset ($_POST["phonenum"])){
                        $phonenum = $_POST["phonenum"];
                        $phonenum = sanitise_input($phonenum); 
                        if ($phonenum == ""){ 
                            echo "<h3>☼ Phone number is empty. Kindly enter.</h3>\n";  // User error message
                            $SendData = false;
                        }
                    else if (!preg_match ("/^[0-9 ]{8,12}$/", $phonenum)){ 
                            echo "<h3>☼ Phone number should have 8-12 digits, spaces allowed.</h3>\n"; 
                            $SendData = false;
                        }
                    }
                    else {
                        header ("location: apply.php");
                    }
                    // Other skills
                    if(!empty($_POST["skill"])) {  
                        $skill = $_POST["skill"];
                        if ($skill == "others"){
                            if(empty($_POST["commentskills"])){ 
                                echo "<h3>☼ Other skills is checked. Kindly enter them.</h3>\n";  // User error message
                                $SendData = false;	
                            }
                        }
                    }
                    // Error input header and styles ends
                    require("error-close.inc"); 
                } // Validation and sanitisation processing stops

                if ($SendData){
                    $conn = @mysqli_connect ($host, 
                    $user, 
                    $pwd, 
                    $sql_db);
                    // Checks if connection is successful
                    if (!$conn) {
                    // Displays an error message
                        echo "<p>Database connection failure</p>"; 
                    // not in production script 
                    } else {
                    // Upon successful connection 
                        $sql_table = "eoi"; 
                        $jobrefnum = trim($_POST["jobrefnum"]); 
                        $givenname = trim($_POST["givenname"]); 
                        $familyname = trim($_POST["familyname"]); 
                        $dob = trim($_POST["dob"]);  
                        $street = trim($_POST["street"]); 
                        $town = trim($_POST["town"]); 
                        $state = trim($_POST["state"]);
                        $postcode = trim($_POST["postcode"]); 
                        $email = trim($_POST["email"]);
                        $phonenum = trim($_POST["phonenum"]); 
                        $skill = trim($_POST["skill"]);
                        $commentskills = trim($_POST["commentskills"]);  
                        
                        // Defines fields for create table function 
                        $fieldsDef="eoinum INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        jobrefnum VARCHAR(5) NOT NULL,
                        givenname VARCHAR(20) NOT NULL,
                        familyname VARCHAR(20) NOT NULL,
                        street VARCHAR(40) NOT NULL,
                        town VARCHAR(40) NOT NULL,
                        state VARCHAR(3) NOT NULL,
                        postcode INT(4) NOT NULL,
                        email VARCHAR(254) NOT NULL, 
                        phonenum INT(15) NOT NULL,
                        skill VARCHAR(5) NOT NULL,
                        commentskills VARCHAR(250),
                        status VARCHAR(20) NOT NULL";
                        
                        // Cross-checks and creates a table if it does not exist
                        $sqlString = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
                        // execute the query and store result into the result 
                        $maketable = @mysqli_query($conn, $sqlString);
    
                        // Confirms if any tables have the same name
                        if(mysqli_num_rows($maketable)==0) {
                            echo "<h6>This table does not exist - create table $sql_table</h6>"; // Might not show in a production script 
                            $sqlString = "create table " . $sql_table . "(" . $fieldsDef . ")";; 
                            $maketable2 = @mysqli_query($conn, $sqlString);
                            // Checks if the table creation was successful. Hidden text
                            if($maketable2===false) {
                                echo "<h6 class=\"wrong\">Sorry, we're unable to create table $sql_table.". msqli_errno($conn) . ":". mysqli_error($conn) ." </h6>"; //Would not show in a production script 
                            } else {
                            // Hidden text for successful table creation
                            echo "<h6 class=\"ok\">The table $sql_table is created</h6>"; //Would not show in a production script 
                            }
                
                        } else {
                            // Prints a successful message
                            echo ""; // Would not show in a production script 
                        }  

                        // Updates status to 'Current' for every past record
                        $updatestatus = "UPDATE $sql_table SET status='Current' WHERE eoinum >=1";
                        $statusresult = mysqli_query($conn, $updatestatus);

                        // Sets up the SQL command to query or add data into the table
                        $query = "INSERT INTO $sql_table (jobrefnum, givenname, familyname, street, town, state, postcode, email, phonenum, skill, commentskills, status) 
                        VALUES ('$jobrefnum', '$givenname', '$familyname', '$street', '$town', '$state', '$postcode', '$email', '$phonenum', '$skill', '$commentskills', 'New')";
                        $result = mysqli_query($conn, $query);

                        $eoiget = "SELECT max(eoinum) AS eoinum FROM $sql_table";
                        $eoivalue = mysqli_query($conn, $eoiget); 
                        $row = @mysqli_fetch_assoc($eoivalue);  

                        // Checks if the execution was successful
                        if (!$result) {
                            echo "<div class=\"app-form\">\n"
                            ."<section class=\"job-top\">\n"   
                            ."<div id=\"center-col\">\n"
                            ."<p class=\"wrong\"> Something is wrong with ", $query, "</p>"
                            ."</div>\n"
                            ."</section>\n"
                            ."</div>\n"; 
                        } 

                        else{
                            require ("successEOI-header.php"); // Header inclusion for success
                            echo "<div class=\"app-form\">\n"
                                ."<section class=\"job-top\">\n"   
                                ."<div id=\"center-col\">\n" // Displays retrieved EOI and other details starts
                                ."<p class=\"ok\"><h3>Kindly note that your unique EOI ID is ", $row["eoinum"] ,".</h3></p>\n" 
                                ."<h3>Best of luck $givenname $familyname!</h3>\n" 
                                ."</div>\n"
                                ."</section>\n"
                                ."</div>\n"; 
                        }
                    
                        // Closes the database connection 
                        mysqli_close($conn);
                    } 
                }
                // Footer
                require("footer.inc")
            ?>  
        </main>
    </body>
</html>