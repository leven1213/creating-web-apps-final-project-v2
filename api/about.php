<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Viewport set to scale 1.0 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descriptive meta tags for SEO and page information -->
    <meta name="description" content="About page for PowerUp">
    <meta name="keywords" content="PowerUp, recruitment, IT">
    <meta name="author" content="Levenspeil Sangalang">
    <title>PowerUp &#8211; About</title>
    <!-- References an external CSS file for styling -->
    <link rel="stylesheet" type="text/css" href="/styles/style.css">
    <!-- Favicon for the browser tab -->
    <link rel="icon" type="image/x-icon" href="images/game-fill.png">
    <!-- References web icons from Remixicon.com -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- References external Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;400;600&family=Darker+Grotesque:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <main>
        <!-- Includes the navigation menu from an external PHP file -->
        <?php
        require("menu.inc")
            ?>

        <!-- About Page Top Section -->
        <section id="page-top">
            <p>Livin' <span class="mono-font">since 1998</span>.</p>
            <br>
            <h3>Get to know the man behind the curtain.</h3>
            <div id="hero-right">
                <!-- Decorative animated star icon -->
                <div class="arrow"><i class="ri-star-smile-fill"></i></div>
            </div>
        </section>

        <!-- About Section: Bio Information and Photo -->
        <section id="blockabout">
            <h3>☼</h3>
            <!-- Definition list with personal details -->
            <section id="about-left">
                <dl>
                    <dt>My name</dt>
                    <dd>
                        <p>Levenspeil Sangalang</p>
                    </dd>
                    <dt>Student number</dt>
                    <dd>
                        <p>104328146</p>
                    </dd>
                    <dt>My tutor's name</dt>
                    <dd>
                        <p>Zeqian Dong</p>
                    </dd>
                    <dt>My course</dt>
                    <dd>
                        <p>Creating Web Applications</p>
                    </dd>
                    <dt>Get in touch</dt>
                    <dd>
                        <!-- Email button to contact via mailto link -->
                        <form action="mailto:104328146@student.swin.edu.au" method="get">
                            <button>Email me</button>
                        </form>
                    </dd>
                </dl>
            </section>

            <!-- Profile Picture Section -->
            <section id="about-right">
                <figure>
                    <img src="images/about-portrait.jpg" alt="Photo of myself">
                    <figcaption>
                        <h4>Fig.1 - A portrait of Leven</h4>
                    </figcaption>
                </figure>
            </section>
        </section>

        <!-- Timetable Section for Semester 1 -->
        <section class="job-top">
            <div id="center-col">
                <h1 class="center-align">My Swinburne timetable</h1>
                <br>
                <aside>
                    <table>
                        <!-- Table Header: Days of the week -->
                        <thead>
                            <tr>
                                <th scope="col">☼</th>
                                <th scope="col">Monday</th>
                                <th scope="col">Tuesday</th>
                                <th scope="col">Wednesday</th>
                                <th scope="col">Thursday</th>
                            </tr>
                        </thead>
                        <!-- Table Body: Weekly schedule -->
                        <tbody>
                            <tr>
                                <th scope="row">8:30am</th>
                                <td></td>
                                <td></td>
                                <td>COS60010
                                    <br>Tech Inquiry Tutorial
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">9:30am</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>COS80022
                                    <br>Software Quality Tutorial
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">11:30am</th>
                                <td></td>
                                <td>COS60010
                                    <br>Tech Inquiry Lecture
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">1:30pm</th>
                                <td></td>
                                <td></td>
                                <td>COS60009
                                    <br>Data Management Lecture
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">2:30pm</th>
                                <td></td>
                                <td>COS80022
                                    <br>Software Quality Lecture
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">5:30pm</th>
                                <td>COS60004
                                    <br>Creating Web Apps Lecture
                                </td>
                                <td>COS60004
                                    <br>Creating Web Apps Tutorial
                                </td>
                                <td>COS60009
                                    <br>Data Management Tutorial
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </aside>
            </div>
        </section>

        <!-- Includes the footer from an external PHP file -->
        <?php
        require("footer.inc")
            ?>
    </main>
</body>

</html>