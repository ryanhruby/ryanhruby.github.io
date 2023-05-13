<?php 
session_start();
if(!isset($_SESSION["ratingSubmitted"])) $_SESSION["ratingSubmitted"] = false;
if(!isset($_SESSION["rating"])) $_SESSION["rating"] = 0;
if(!isset($_SESSION["currTheme"])) $_SESSION["currTheme"] = "light";
if(!isset($_SESSION["prefTheme"])) $_SESSION["prefTheme"] = "light";
if(!isset($_SESSION["prefClock"])) $_SESSION["prefClock"] = "12hr";
if(!isset($_SESSION["timezone"])) $_SESSION["timezone"] = "US/Central";
if(!isset($_SESSION["loggedIn"])) $_SESSION["loggedIn"] = false;
?>

<!DOCTYPE html>
<html lang="en" id="html"  onload="setCurrentTheme()">
  <!-- Page settings, stylesheets, and scripts -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/desktop.css" />
    <script src="../scripts/ratingFormProcess.js"></script>
    <script src="../scripts/lightingThemeProcess.js"></script>
    <script src="../scripts/timeProcess.js"></script>
    <title>Ryan Hruby's Personal Website</title>
  </head>
  <body onload="setCurrentTheme()">
    <!-- Page header, nav bar, and theme selector-->
    <header>
      <div>
          <h1 id="page-header">Ryan Hruby's Personal Website</h1>
          <p>developed by Ryan Hruby.</p>
          <p style="font-weight: bold;" id="clock">
          <?php 
          date_default_timezone_set($_SESSION["timezone"]);

          if($_SESSION['prefClock'] == '12hr'){
              echo date('h:iA e');
          }
          elseif($_SESSION['prefClock'] == '24hr'){
              echo date('H:i e');
          }
          ?>
          </p>
          <script>
            timeProcess();
            setInterval('timeProcess()', 60000)
          </script>
          <button id="theme-selector" value="Enable Dark Mode" onclick="switchMode()">Enable Dark Mode</button>
      </div>
      <!-- Nav bar -->
      <nav>
        <ul>
          <li class="Menu-item"><a href="index.php">Biography</a></li>
          <li class="Menu-item"><a href="experience.php">Experience</a></li>
          <li class="Menu-item"><a href="education.php">Education</a></li>
          <li class="Menu-item"><a href="checkers.php">Checkers</a></li>
          <li class="Menu-item"><a href="contact.php">Contact</a></li>
          <li class="Menu-item"><a href="settings.php">Login & Settings</a></li>
        </ul>
      </nav>
    </header>
    <!-- Employment history and responsibilities -->
    <p></p>
    <h2>Experience</h2>
    <p>I have had two internships as well as several on-campus employment positions</p>
    <p>In Summer 2021, I worked as an Application Developer Intern for American Century Investments. 
    During my time at American Century Investments, I developed a mobile-first web application in React to enable on-the-go decision-making for Portfolio Managers, 
    utilized JSX, React, and Fetch API to extract and display financial information on the web-app in a condensed and useful format, 
    and participated in daily tech stand-up meetings as well as weekly meetings focused on professional development.</p>
    <p>In Summer 2022, I worked as a Software Engineer Intern for Nelnet. During my time at Nelnet,
    I developed a modern and intuitive internal dashboard for securely displaying sensitive commercial and federal student loan data using Angular JavaScript, 
    collaborated with senior developers to update and restructure frontend code architecture, and 
    participated in Agile meetings with the development team, including retrospectives, sprint planning and estimation, and daily stand-up.</p>
    <p>I have also worked in the School of Computing at UNL in various teaching assistant positions. I worked as a teaching assistant
    for the introductory object-oriented programming course for three semesters and for a software engineering and software security course
    for two semesters. These roles helped cement my knowledge of both OOP and Software Engineering.</p>
  </body>
  <!-- Easy access rating form footer on all pages -->
  <footer>  
    <footer>  
      <div id="footer-div">
          <p id="rating-p">Rate this website:</p>        
          <form id="rating-form" onsubmit="ratingFormProcess()">
            <fieldset id="rating-fieldset">
              <input id="rd1" type="radio" name="rating" value="1"> 1</input>
              <input id="rd2" type="radio" name="rating" value="2"> 2</input>
              <input id="rd3" type="radio" name="rating" value="3"> 3</input>
              <input id="rd4" type="radio" name="rating" value="4"> 4</input>
              <input id="rd5" type="radio" name="rating" value="5"> 5</input>
              <input id="submit-btn" type="submit" value="Submit" />
            </fieldset>
          </form>
      </div>
    </footer>
    <script>
      if(<?php echo $_SESSION["ratingSubmitted"] ?> == true){
        disableRatingForm(<?php echo $_SESSION["rating"] ?>);
      }
    </script>
  </footer>
</html>