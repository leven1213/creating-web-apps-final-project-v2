<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Viewport set to scale 1.0 -->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descriptive meta tags -->   
        <meta name="description" content="Search processing PHP for PowerUp">
		<meta name="keywords" content="PowerUp, search, IT">
		<meta name="author" content="Levenspeil Sangalang">
        <title>PowerUp &#8211; Search EOI</title>
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
                    $search = trim($_POST["searchEOI"]);  

                    $searchquery = "select * from $sql_table where givenname like '$search%' or familyname like '$search%'
                    or jobrefnum='7D1EG' like '$search%' or jobrefnum='3U1EN' like '$search%'";
                    // Execute the query to check if the database exists
                        $searchresult = mysqli_query($conn, $searchquery);
                        // Checks if the execution was successful
                        if (!$searchresult) {
                            echo "<div class=\"app-form\">\n"
                            ."<section class=\"job-top\">\n"   
                            ."<div id=\"center-col2\">\n"
                            ."<h1 class=\"center-align\">Something is wrong with ", $searchquery, "</h1>"
                            ."</div>\n"
                            ."</section>\n"
                            ."</div>\n"; 
                        } else {
                            // Display the retrieved records 
                            echo "<div class=\"app-form\">\n"
                                ."<section class=\"job-top\">\n"   
                                ."<h1 class=\"center-align\">Showing results for '", $search,"'</h1>\n" 
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
                            // Retrieve current record pointed by result pointer
                        while ($row = mysqli_fetch_assoc($searchresult)) {
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
                        mysqli_free_result($searchresult);
                    } // if successful query operation
                    // close the database connection 
                    mysqli_close($conn);
                } // if successful database connection   
            ?> 
            <!-- Same form for easy access -->
            <section class="padding-spacer">
                <aside>
                    <?php require("search-eoi-form.php");?> 
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