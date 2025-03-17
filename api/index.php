<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Viewport set to scale 1.0 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descriptive meta tags -->
    <meta name="description" content="Homepage for PowerUp">
    <meta name="keywords" content="PowerUp, recruitment, IT">
    <meta name="author" content="Levenspeil Sangalang">
    <title>PowerUp &#8211; Home</title>
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
        <!-- Main navigation bar -->
        <?php
        require("menu.inc")
            ?>
        <!-- Hero home section -->
        <section id="hero-top">
            <h1 id="grey">WIDENING CAREER PROSPECTS</h1>
            <p>Let's unleash the <span class="mono-font">power up</span> you deserve.</p>
            <br>
            <div id="hero-left">
                <!-- Highlighted button element -->
                <form action="jobs.php" method="get">
                    <button id="highlight">EXPLORE JOBS</button>
                </form>
            </div>
            <div id="hero-right">
                <p>PowerUp provides opportunities to those who want to shapeshift the world of IT.</p>
            </div>
        </section>
        <!-- About preview -->
        <section class="about-top">
            <h2 class="head-title">We help you find the right job.</h2>
            <br>
            <div id="about-left">
                <!-- Image element -->
                <figure>
                    <img src="images/home-jobs.jpg" alt="PowerUp recruitment">
                    <figcaption>
                        <p class="grey">Photo by <a href="https://unsplash.com/photos/-AXDunSs-n4"
                                target="_blank">LinkedIn Sales Solutions/Unsplash</p></a>
                    </figcaption>
                </figure>
            </div>
            <div id="about-right">
                <p>We specialise in connecting aspiring IT professionals to the digital companies they potentially
                    belong to, as we guide them each step of the way. With a commitment to make ends meet, our
                    specialists can assure that applicants will hear back from their future.</p>
                <br>
                <!-- Transparent button element -->
                <form action="about.php" method="get">
                    <button>Read more</button>
                </form>
            </div>
        </section>
        <!-- Careers preview -->
        <section class="job-top">
            <h2>Find your future.</h2>
            <div id="center-col">
                <!-- Link redirects to specific job title on Careers page -->
                <a href="jobs.html#gamesprog">
                    <!-- Job 1 block -->
                    <div class="roundbox">
                        <div class="hjobs-info-left">
                            <!-- Job title -->
                            <h3>Games Programmer</h3>
                            <!-- Company and location with Remixicons  -->
                            <div class="loc">
                                <ul>
                                    <li>
                                        <p class="ri-briefcase-fill"></p>
                                        <p>Tetrix</p>
                                    </li>
                                    <li>
                                        <p class="ri-map-pin-2-fill"></p>
                                        <p>USA</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hjobs-info-right">
                            <p class="arrow">&#10513;</p>
                        </div>
                    </div>
                </a>
                <a href="jobs.php#softdev">
                    <!-- Job 2 block -->
                    <div class="roundbox">
                        <div class="hjobs-info-left">
                            <h3>Front-end Software Developer</h3>
                            <div class="loc">
                                <ul>
                                    <li>
                                        <p class="ri-briefcase-fill"></p>
                                        <p>Ally Software</p>
                                    </li>
                                    <li>
                                        <p class="ri-map-pin-2-fill"></p>
                                        <p>Australia</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hjobs-info-right">
                            <p class="arrow">&#10513;</p>
                        </div>
                    </div>
                </a>
                <!-- Button opens Apply page in a new window -->
                <form action="apply.php" method="get">
                    <button>Apply now</button>
                </form>
            </div>
        </section>
        <!-- Footer -->
        <?php
        require("footer.inc")
            ?>
    </main>
</body>

</html>