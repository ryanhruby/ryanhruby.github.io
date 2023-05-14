<?php 
session_start();
if(!isset($_SESSION["ratingSubmitted"])) $_SESSION["ratingSubmitted"] = false;
if(!isset($_SESSION["rating"])) $_SESSION["rating"] = 0;
if(!isset($_SESSION["currTheme"])) $_SESSION["currTheme"] = "light";
if(!isset($_SESSION["prefTheme"])) $_SESSION["prefTheme"] = "light";
if(!isset($_SESSION["prefClock"])) $_SESSION["prefClock"] = "12hr";
if(!isset($_SESSION["timezone"])) $_SESSION["timezone"] = "US/Central";
if(!isset($_SESSION["loggedIn"])) $_SESSION["loggedIn"] = false;
if(!isset($_SESSION["username"])) $_SESSION["username"] = "user";
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
    <script src="../scripts/accountFormsProcess.js"></script>
    <script src="../scripts/timeProcess.js"></script>
    <script src="../scripts/saveSettingsProcess.js"></script>
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
    <!-- Login form -->
    <div id="loginDiv">
        <p></p>
        <h2>Login or Register</h2>
        <form id="login-form" class="settings-forms" onsubmit="loginFormProcess()">
        <fieldset class="field-padding">
          <legend class="Bold">Login</legend>
          <label class="settings-input">Username:</label>
          <input name="username" class="settings-input" type="text" minlength="5" maxlength="26"></input><br>
          <label class="settings-input">Password:</label>
          <input name="password" class="settings-input" type="password" minlength="5" maxlength="12"></input><br>
          <input class="fb-submit" class="settings-input" type="submit" value="Login" />
        </fieldset>
        </form>
        <form id="register-form" class="settings-forms" onsubmit="regFormProcess()">
        <fieldset class="field-padding">
          <legend class="Bold">Create an Account</legend>
          <label class="settings-input">Username:</label>
          <input name="username" class="settings-input" type="text" minlength="5" maxlength="26"></input><br>
          <label class="settings-input">Password:</label>
          <input name="password" class="settings-input" type="password" minlength="5" maxlength="12"></input><br>
          <label class="settings-input">Confirm Password:</label>
          <input name="confirm_password" class="settings-input" type="password" minlength="5" maxlength="12"></input><br>
          <input class="fb-submit" class="settings-input" type="submit" value="Register" />
        </fieldset>
        </form>
    </div>
    <!-- Settings form -->
    <div id="settingsDiv" hidden>
        <p style="padding: 10px;"></p>
        <p>Hello, <?php echo $_SESSION['username']?>. Click here to logout:
          <button class="fb-submit" type="button" onclick="logoutProcess()">Logout</button>
        </p>
        <h2>Settings</h2>
        <form id="settings-form" class="settings-forms" onsubmit="saveSettingsProcess()">
          <fieldset style="border: 0px;" class="field-padding">
          <label class="settings-input">Preferred Timezone:</label>
          <select id="prefTimezone" name="prefTimezone">
            <option id="US/Mountain" value="US/Mountain">US/Mountain</option>
            <option id="US/Central" value="US/Central">US/Central</option>
            <option id="US/Pacific" value="US/Pacific">US/Pacific</option>
            <option id="US/Eastern" value="US/Eastern">US/Eastern</option>
          </select>
          <br>
          <label class="settings-input">Preferred Clock Format:</label>
          <select id="prefClockFormat" name="prefClockFormat">
            <option id="12hr" value="12hr">12 Hour AM/PM</option>
            <option id="24hr" value="24hr">24 Hour</option>
          </select>
          <br>
          <label class="settings-input">Preferred Theme:</label>
          <select id="prefTheme" name="prefTheme">
            <option id="light" value="light">Light</option>
            <option id="dark" value="dark">Dark</option>
          </select>
          <br><br>
          <input class="fb-submit" type="submit" value="Save & Apply" />
          </fieldset>
        </form>
        <?php
          echo '<script>document.getElementById("' . $_SESSION["timezone"] . '").setAttribute("selected", "");
          document.getElementById("' . $_SESSION["prefClock"] . '").setAttribute("selected", "");
          document.getElementById("' . $_SESSION["prefTheme"] . '").setAttribute("selected", "");
          </script>'
        ?>
    </div>
    <?php 
      if($_SESSION['loggedIn'] == true){
        echo '<script>document.getElementById("loginDiv").setAttribute("hidden", ""); document.getElementById("settingsDiv").removeAttribute("hidden");</script>';
      }
    ?>
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