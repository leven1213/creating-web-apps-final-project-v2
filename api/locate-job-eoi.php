<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Viewport set to scale 1.0 -->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descriptive meta tags -->   
        <meta name="description" content="Locate job ref num EOIs processing PHP for PowerUp">
		<meta name="keywords" content="PowerUp, job reference number, EOI">
		<meta name="author" content="Levenspeil Sangalang">
        <title>PowerUp &#8211; Job Reference EOIs</title>
        <!-- References to external basic CSS file -->
        <link rel="stylesheet" type="text/css" href="styles/style.css">
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
            <?php  
                require("menu.inc");
                require("header-search.inc");
                require_once("settings.php"); // Connection info
                $conn = @mysqli_connect($host,
                    $user,
                    $pwd,
                    $sql_db
                );
                // Checks if connection is successful 
                if (!$conn) {
                    // Displays an error message
                    echo "<p>Database connection failure</p>"; // Not in production script 
                }
                else {
                    // Upon successful connection
                    $sql_table = "eoi";
                    $locatejobEOI = trim($_POST["locatejobEOI"]);  

                    $locatejobquery = "select * from $sql_table where jobrefnum like '$locatejobEOI'";
                    // Execute the query to check if the database exists
                    $locatejobresult = mysqli_query($conn, $locatejobquery);
                    // Checks if the execution was successful
                        if (!$locatejobresult) {
                            echo "<div class=\"app-form\">\n"
                            ."<section class=\"job-top\">\n"   
                            ."<div id=\"center-col2\">\n"
                            ."<h1 class=\"center-align\">Something is wrong with ", $locatejobquery, "</h1>"
                            ."</div>\n"
                            ."</section>\n"
                            ."</div>\n"; 
                        } else {
                            // Display the retrieved records 
                            echo "<div class=\"app-form\">\n"
                                ."<section class=\"job-top\">\n"   
                                ."<h1 class=\"center-align\">Showing results for '", $locatejobEOI,"'</h1>\n" 
                                ."<div id=\"center-col2\">\n"
                                ."<div class=\"roundbox\">\n"  
                                ."<table>\n"  
                                ."<thead>\n" 
                                    ."<tr>\n"
                                        ."<th scope=\"col\">EOI no.</th>\n" 
                                        ."<th scope=\"col\">Job reference no.</th>\n" 
                                        ."<th scope=\"col\">First name</th>\n" 
                                        ."<th scope=\"col\">Last name</th>\n" 
                                        ."<th scope=\"col\">Street</th>\n" 
                                        ."<th scope=\"col\">Town</th>\n" 
                                        ."<th scope=\"col\">State</th>\n" 
                                        ."<th scope=\"col\">Postcode</th>\n" 
                                        ."<th scope=\"col\">Email</th>\n" 
                                        ."<th scope=\"col\">Phone</th>\n" 
                                        ."<th scope=\"col\">Skills</th>\n" 
                                        ."<th scope=\"col\">Other skills</th>\n" 
                                    ."</tr>\n"
                                ."</thead>\n"; 
                        // Retrieve current records pointed by result pointer
                        while ($row = mysqli_fetch_assoc($locatejobresult)) {
                            echo "<tr>\n ";
                            echo "<td>", $row["eoinum"], "</td>\n"; 
                            echo "<td>", $row["jobrefnum"],"</td>\n "; 
                            echo "<td>", $row["givenname"], "</td>\n"; 
                            echo "<td>", $row["familyname"], "</td>\n"; 
                            echo "<td>", $row["street"], "</td>\n";
                            echo "<td>", $row["town"], "</td>\n";
                            echo "<td>", $row["state"], "</td>\n";
                            echo "<td>", $row["postcode"], "</td>\n";
                            echo "<td>", $row["email"], "</td>\n";
                            echo "<td>", $row["phonenum"], "</td>\n";
                            echo "<td>", $row["skill"], "</td>\n";
                            echo "<td>", $row["commentskills"], "</td>\n";
                            echo "</tr>\n";
                        }
                        echo "</table>\n"
                        ."</div>\n" 
                        ."</div>\n"    
                        ."</section>\n" 
                        ."</div>\n";
                        // Frees up the memory, after using the result 
                        mysqli_free_result($locatejobresult);
                    } // if successful query operation
                    // close the database connection 
                    mysqli_close($conn);
                } // if successful database connection   
            ?> 
            <!-- Same form for easy access -->
            <section class="padding-spacer">
                <aside>
                    <?php require("list-ref-num-form.php");?> 
                </aside> 
                <br> 
                <br>
                <a href="manage.php">Return to page</a>
            </section>
            <!-- Footer -->
            <?php require("footer.inc");?> 
        </main> 
    </body>
</html>