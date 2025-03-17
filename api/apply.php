<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Viewport set to scale 1.0 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descriptive meta tags for SEO and page information -->
    <meta name="description" content="Apply page for PowerUp">
    <meta name="keywords" content="PowerUp, recruitment, IT">
    <meta name="author" content="Levenspeil Sangalang">
    <title>PowerUp &#8211; Apply</title>
    <!-- References an external CSS file for styling -->
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <!-- Link to script file -->
    <script src="scripts/apply.js"></script>
    <!-- Favicon for the browser tab -->
    <link rel="icon" type="image/x-icon" href="images/game-fill.png">
    <!-- References web icons from Remixicon.com -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- References external Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;400;600&family=Darker+Grotesque:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <main>
        <!-- Include navigation bar from external PHP file -->
        <?php require("menu.inc"); ?>

        <!-- Apply top section with introduction text and arrow -->
        <section id="page-top">
            <p>Hit the <span class="mono-font">brick</span> road.</p>
            <br>
            <h3>Time to take it. Just fill up the form below.</h3>
            <div id="hero-left">
                <!-- Animated arrow pointing left -->
                <div class="arrow"><i class="ri-arrow-left-down-line"></i></div>
            </div>
        </section>

        <!-- Application form container -->
        <div class="appform">
            <aside>
                <!-- Job application form -->
                <form id="jobform" method="post" autocomplete="off" action="process-eoi.php" novalidate>

                    <!-- Job Reference Number -->
                    <label for="jobrefnum">JOB REFERENCE NO.<i class="ri-asterisk"></i></label>
                    <span id="set_jobrefnum"><input type="text" name="jobrefnum" id="jobrefnum" maxlength="5" size="10"
                            required></span>
                    <br>

                    <!-- First Name and Last Name Fields -->
                    <div class="field-left1">
                        <label for="givenname">FIRST NAME<i class="ri-asterisk"></i></label>
                        <span id="set_givenname" class="result"><input type="text" name="givenname" id="givenname"
                                maxlength="20" size="15" pattern="^[a-zA-Z ]+$" required></span>
                    </div>
                    <div class="field-right1">
                        <label for="familyname">LAST NAME<i class="ri-asterisk"></i></label>
                        <span id="set_familyname" class="result"><input type="text" name="familyname" id="familyname"
                                maxlength="20" size="15" pattern="^[a-zA-Z ]+$" required></span>
                    </div>

                    <!-- Date of Birth Field -->
                    <label for="dob" id="birthday">DATE OF BIRTH<i class="ri-asterisk"></i></label><span
                        id="dob-error"></span>
                    <span id="set_birthday" class="result"><input type="text" name="dob" id="dob"
                            placeholder="DD/MM/YYYY" required></span>

                    <!-- Gender Selection -->
                    <fieldset class="gender-box">
                        <legend>GENDER<i class="ri-asterisk"></i></legend>
                        <input type="radio" name="gender" value="male" id="male" required>
                        <label for="male">Male&nbsp;</label>
                        <input type="radio" name="gender" value="female" id="female" required>
                        <label for="female">Female&nbsp;</label>
                        <input type="radio" name="gender" value="nonbin" id="nonbin" required>
                        <label for="nonbin">Non-binary&nbsp;</label>
                        <input type="radio" name="gender" value="other" id="other" required>
                        <label for="other">Other&nbsp;</label>
                        <input type="radio" name="gender" value="none" id="none" required>
                        <label for="none">Prefer to not say&nbsp;</label>
                    </fieldset>

                    <!-- Address Fields -->
                    <label for="street">STREET ADDRESS<i class="ri-asterisk"></i></label>
                    <span id="set_street" class="result"><input type="text" name="street" id="street" maxlength="40"
                            size="15" required></span>
                    <label for="town">SUBURB/TOWN<i class="ri-asterisk"></i></label>
                    <span id="set_town" class="result"><input type="text" name="town" id="town" maxlength="40" size="15"
                            required></span>

                    <!-- State Dropdown -->
                    <div class="field-left2">
                        <label for="state">STATE<i class="ri-asterisk"></i></label>
                        <select name="state" id="state" required>
                            <option value="">Please select...</option>
                            <option id="vic" value="vic">VIC</option>
                            <option id="nsw" value="nsw">NSW</option>
                            <option id="qld" value="qld">QLD</option>
                            <option id="nt" value="nt">NT</option>
                            <option id="wa" value="wa">WA</option>
                            <option id="sa" value="sa">SA</option>
                            <option id="tas" value="tas">TAS</option>
                            <option id="act" value="act">ACT</option>
                        </select>
                    </div>

                    <!-- Skills Selection -->
                    <fieldset class="skill-box">
                        <legend>SKILLS<i class="ri-asterisk"></i></legend>
                        <input type="checkbox" id="html" name="skill" value="html">
                        <label for="html">HTML</label>
                        <input type="checkbox" id="css" name="skill" value="css">
                        <label for="css">CSS</label>
                        <input type="checkbox" id="js" name="skill" value="js">
                        <label for="js">Javascript</label>
                    </fieldset>

                    <!-- Form Buttons -->
                    <h1 class="center-align teal">Ready to power up?</h1>
                    <div class="field-left3">
                        <input type="reset" value="Reset form">
                    </div>
                    <div class="field-right3">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </aside>
        </div>

        <!-- Include footer from external PHP file -->
        <?php require("footer.inc"); ?>
    </main>
</body>

</html>