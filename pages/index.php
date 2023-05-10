<?php 
session_start();
if(!isset($_SESSION["ratingSubmitted"])) $_SESSION["ratingSubmitted"] = false;
if(!isset($_SESSION["rating"])) $_SESSION["rating"] = 0;
if(!isset($_SESSION["prefTheme"])) $_SESSION["prefTheme"] = "light";
if(!isset($_SESSION["currTheme"])) $_SESSION["currTheme"] = "light";

$_SESSION["currTheme"] = "light";
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
    <title>Ryan Hruby's Personal Website</title>
  </head>
  <body>
    <!-- Page header, nav bar, and theme selector-->
    <header>
      <div>
          <h1 id="page-header">Ryan Hruby's Personal Website</h1>
          <p>developed by Ryan Hruby.</p>
          <button id="theme-selector" value="Enable Dark Mode" onclick="switchMode()">Enable Dark Mode</button>
          <?php 
          if($_SESSION["prefTheme"] != $_SESSION["currTheme"]){
            echo "<script>switchMode()</script>";
          }
          ?>
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
    <!-- Biography and headshot image in body -->
    <p></p>
    <h2>Biography</h2>
    <div id="body-text-div">
      <p>My name is Ryan Hruby, and I am a senior computer science and mathematics major at the University of Nebraska-Lincoln. 
      I enjoy problem-solving in the context of computers - designing programs and algorithms for tasks and solutions excites me the most. 
      This is why I am currently pursuing a degree in Computer Science; I want to learn the skills required to tackle these problems in real-life situations.</p> 
      <p>My past work experience includes internships at Nelnet and American Century Investments, where I developed frontend web-applications that relied on backend APIs.</p>
      <p>I'm looking to build my network and explore interesting and new opportunities that connect to my passion of computer science.</p>
      <p>Check out the different pages to learn more about my experiences and education! If you like the website, feel free to leave a rating below or give feedback on the Contact page.</p>
    </div>
    <img id="ryan_head_profile" src="../images/ryan_head_profile.JPG" alt="Ryan's Head Profile" width="188" height="235">
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
