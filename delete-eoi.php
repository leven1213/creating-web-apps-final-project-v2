<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Viewport set to scale 1.0 for responsiveness -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descriptive meta tags for SEO -->
    <meta name="description" content="Delete EOI processor for PowerUp">
    <meta name="keywords" content="PowerUp, delete, EOI">
    <meta name="author" content="Levenspeil Sangalang">
    <title>PowerUp &#8211; Delete EOI</title>
    <!-- Link to external CSS file for styling -->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <!-- Favicon for browser tab -->
    <link rel="icon" type="image/x-icon" href="images/game-fill.png">
    <!-- Import Remixicon icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Import Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;400;600&family=Darker+Grotesque:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <main>
        <?php
        // Include navigation and search header
        require("menu.inc");
        require("header-search.inc");
        require_once("settings.php"); // Database connection settings
        
        // Establish database connection
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        // Check if the connection was successful
        if (!$conn) {
            // Display an error message if the connection fails
            echo "<p>Database connection failure</p>"; // Debugging message (remove in production)
        } else {
            // Set the table name
            $sql_table = "eoi";

            // Retrieve and sanitize user input
            $delete = trim($_POST["deleteEOI"]);

            // SQL query to delete a record based on job reference number
            $deletequery = "DELETE FROM $sql_table WHERE jobrefnum LIKE '$delete'";

            // Execute the query
            $deleteresult = mysqli_query($conn, $deletequery);

            // Check if query execution was successful
            if (!$deleteresult) {
                echo "<div class=\"app-form\">\n"
                    . "<section class=\"job-top\">\n"
                    . "<div id=\"center-col\">\n"
                    . "<h2>Something is wrong with ", $deletequery, "</h2>"
                    . "</div>\n"
                    . "</section>\n"
                    . "</div>\n";
            } else {
                // Confirmation message for successful deletion
                echo "<div class=\"app-form\">\n"
                    . "<section class=\"job-top\">\n"
                    . "<h2>Record for ", $delete, " has been deleted.</h2>\n"
                    . "</section>\n"
                    . "</div>\n";
            }

            // Close the database connection
            mysqli_close($conn);
        }
        ?>

        <!-- Include the form again for convenience -->
        <section class="padding-spacer">
            <aside>
                <?php require("delete-eoi-form.php"); ?>
            </aside>
        </section>

        <!-- Include the footer -->
        <?php require("footer.inc"); ?>
    </main>
</body>

</html>