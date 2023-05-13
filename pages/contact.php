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
    <script src="../scripts/feedbackFormProcess.js"></script>
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
    <!-- Feedback form -->
    <p></p>
    <h2>Contact</h2>
    <p>Feel free to contact me on <a id="linkedin" href="https://www.linkedin.com/in/ryan-hruby/">LinkedIn</a> or using the Feedback Form below.</p>
    <p></p>
    <div>
      <h3 id="feedback-header">Feedback Form</h3>
    </div>
    <div id="form-div">
      <form id="feedback-form" onsubmit="feedbackFormProcess()">
        <fieldset>
          <legend class="Bold">Your E-mail</legend>
          <input style="margin-left: 12px; font-size: medium; padding: 5px;" type="text" name="email" maxLength="190" size="40" placeholder="Your E-mail">
        </fieldset>
        <p></p>
        <fieldset class="flex-container" class="field-padding">
          <legend class="Bold">What new pages would you like to see?</legend>
          <input class="flex-item" type="checkbox" name="galleryPage" value="yes">Gallery Page</input>
          <input class="flex-item" type="checkbox" name="langPage" value="yes">Languages/Tools Used Page</input>
          <input class="flex-item" type="checkbox" name="resumePage" value="yes">Resume Page</input>
          <input id="other-ideas" type="text" name="otherIdeasInput" size="50" maxlength="250" placeholder="Other Ideas"></input>
        </fieldset>
        <p></p>
        <fieldset class="flex-container" class="field-padding">
          <legend class="Bold">Submit &#38 Reset</legend>
          <input class="fb-submit" type="submit" value="Send Feedback" />
          <input class="fb-reset" type="reset" value="Reset Form" />
        </fieldset>
        <p></p>
      </form>
    </div>
  </body>
  <!-- Easy access rating form footer on all pages -->
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

</html>