<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Viewport set to scale 1.0 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descriptive meta tags -->
    <meta name="description" content="Change EOI processing PHP for PowerUp">
    <meta name="keywords" content="PowerUp, change status, IT">
    <meta name="author" content="Levenspeil Sangalang">
    <title>PowerUp &#8211; Change EOI Status</title>
    <!-- References to external basic CSS file -->
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <!-- Favicon for tab -->
    <link rel="icon" type="image/x-icon" href="images/game-fill.png">
    <!-- References to web icons from Remixicon.com -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- References to external fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;400;600&family=Darker+Grotesque:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <main>
        <!-- Include the navigation menu -->
        <?php
        require("menu.inc");
        require("header-search.inc"); // Include search bar
        require_once("settings.php"); // Database connection settings

        // Establish database connection
        $conn = @mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );

        // Check if connection was successful
        if (!$conn) {
            echo "<p>Database connection failure</p>"; // Debugging message (remove in production)
        } else {
            // Set the table name
            $sql_table = "eoi";

            // Retrieve and sanitize user input
            $set = trim($_POST["change_table-1"]);
            $change = trim($_POST["change_table-2"]);

            // SQL query to update the status based on matching fields
            $changequery = "UPDATE $sql_table SET status = '$change' 
                            WHERE givenname LIKE '$set%' 
                            OR familyname LIKE '$set%' 
                            OR jobrefnum LIKE '$set%' 
                            OR eoinum LIKE '$set%'";

            // Execute the query
            $changeresult = mysqli_query($conn, $changequery);

            // Check if query execution was successful
            if (!$changeresult) {
                echo "<div class=\"app-form\">\n"
                    . "<section class=\"job-top\">\n"
                    . "<div id=\"center-col\">\n"
                    . "<h2>Something is wrong with ", $changequery, "</h2>"
                    . "</div>\n"
                    . "</section>\n"
                    . "</div>\n";
            } else {
                // Confirmation message for successful update
                echo "<section class=\"job-top\">\n"
                    . "<h2>Successfully updated Status to '", $change, "'</h2>\n"
                    . "<div id=\"center-col\">\n"
                    . "</section>\n";
            }

            // Close the database connection
            mysqli_close($conn);
        }
        ?>

        <!-- Include the change EOI form for easy access -->
        <section class="padding-spacer">
            <aside>
                <?php require("change-eoi-form.php"); ?>
            </aside>
            <br>
            <br>
            <a href="manage.php">Return to page</a>
        </section>

        <!-- Include the footer -->
        <?php require("footer.inc"); ?>
    </main>
</body>

</html>