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
    <script src="../scripts/checkersProcess.js"></script>
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
    <!-- Checkers Game -->
    <p></p>
    <h2>Checkers</h2>
    <table id="board">
        <tr>
          <td class="white-background"></td>
          <td id="sp01" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp01" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp02" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp02" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp03" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp03" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp04" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp04" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
        </tr>
        <tr>
          <td id="sp05" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp05" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp06" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp06" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp07" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp07" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp08" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp08" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
        </tr>
        <tr>
          <td class="white-background"></td>
          <td id="sp09" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp09" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp10" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp10" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp11" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp11" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp12" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="bp12" draggable ondrag="drag()" src="../images/black_piece.png" width="75" height="75"></td>
        </tr>
        <tr>
          <td id="sp13" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
          <td class="white-background"></td>
          <td id="sp14" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
          <td class="white-background"></td>
          <td id="sp15" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
          <td class="white-background"></td>
          <td id="sp16" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
          <td class="white-background"></td>
        </tr>
        <tr>
          <td class="white-background"></td>
          <td id="sp17" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
          <td class="white-background"></td>
          <td id="sp18" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
          <td class="white-background"></td>
          <td id="sp19" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
          <td class="white-background"></td>
          <td id="sp20" class="blue-background" ondragover="checkDrag()" ondrop="drop()"></td>
        </tr>
        <tr>
          <td id="sp21" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp01" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp22" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp02" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp23" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp03" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp24" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp04" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
        </tr>
        <tr>
          <td class="white-background"></td>
          <td id="sp25" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp05" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp26" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp06" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp27" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp07" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp28" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp08" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
        </tr>
        <tr>
          <td id="sp29" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp09" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp30" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp10" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp31" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp11" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
          <td id="sp32" class="blue-background" ondragover="checkDrag()" ondrop="drop()"><img id="wp12" draggable ondrag="drag()" src="../images/white_piece.png" width="75" height="75"></td>
          <td class="white-background"></td>
        </tr>
    </table>
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