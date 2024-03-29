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
<html lang="en" id="html">
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
    <!-- Educational history -->
    <p></p>
    <h2>Education</h2>
    <div id="body-text-div">
      <p>I am a senior undergraduate student at the University of Nebraska-Lincoln. I'm majoring in computer science and mathematics with a  
      minor in business. My hope is that combining knowledge and skills from these three areas will allow me to utilize technology efficiently and
      to solve business problems.</p> 
      <p>As a computer science student, I've taken classes on Programming, Software Engineering, Operating Systems, Data Structures and Algorithms,
      Cybersecurity, and more. I have a solid grasp of good software engineering principles with a foundation of computer science theory. I've taken several
      courses regarding cryptography and cybersecurity theory as well as how to implement proper cybersecurity practices.</p>
      <p>As a mathematics student, I've taken classes on Calculus, Statistics, Linear Algebra, Modern Algebra and Modular Arithmetic, Discrete Math, Systems Operations,
      and more. These courses have provided the necessary knowledge for understanding how algorithms and programs work efficiently and, in turn,
      how to design my own algorithms and program to work efficiently too.</p>
      <p>As a business student, I've taken classes on Economics, Management, Business Law, Accounting, Finance, and Marketing. These courses have given me an understanding
      of how businesses operate and make profit. My biggest takeaway was that if a business can successfully leverage technology, it can achieve
      its objectives quickly and profitably.
      </p>
    </div>
    <img id="nebraska_logo" src="../images/nebraska_logo.png" alt="UNL Logo" width="200" height="200">
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