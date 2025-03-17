<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Viewport set to scale 1.0 -->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descriptive meta tags -->   
        <meta name="description" content="Apply page for PowerUp">
		<meta name="keywords" content="PowerUp, recruitment, IT">
		<meta name="author" content="Levenspeil Sangalang">
        <title>PowerUp &#8211; Search EOI</title>
        <!-- References to external basic CSS file -->
        <link rel="stylesheet" type="text/css" href="/styles/style.css">
        <!-- Link to script file -->
		<script src="scripts/apply.js"></script> 
        <!-- Favicon for tab -->
        <link rel="icon" type="image/x-icon" href="images/game-fill.png">
        <!-- References to web icons from Remixicon.com -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- References to external fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;400;600&family=Darker+Grotesque:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body id="applyPage">
        <main>
            <!-- Main navigation bar --> 
            <?php
                require("menu.inc")
            ?>   
                <!-- Apply top section --> 
                <section id="page-top">
                    <p>Manage <span class="mono-font">EOIs</span>.</p> 
                    <br> 
                    <h3>Locate or make changes to expressions of interest.</h3>
                    <div id="hero-left">  
                        <!-- Animated element -->
                        <div class="arrow"><i class="ri-arrow-left-down-line"></i></div>
                    </div>
                </section>
                <div class="appform">
                <aside> 
                <!-- EOI forms -->
                <?php
                require("list-eoi-form.php");
                require("search-eoi-form.php");
                require("list-ref-num-form.php");
                require("delete-eoi-form.php");
                require("change-eoi-form.php");
                ?>  
                </aside> 
                </div> 
            <!-- Footer -->
            <?php
                require("footer.inc");
            ?>
        </main>
    </body>
</html>