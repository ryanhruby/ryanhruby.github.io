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
    <title>Ryan Hruby's Personal Website</title>
  </head>
  <body>
    <!-- Page header, nav bar, and theme selector-->
    <header>
      <div>
          <h1 id="page-header">Ryan Hruby's Personal Website</h1>
          <p>developed by Ryan Hruby.</p>
          <button id="theme-selector" value="Enable Dark Mode" onclick="switchMode()">Enable Dark Mode</button>
      </div>
      <!-- Nav bar -->
      <nav>
        <ul>
          <li class="Menu-item"><a href="../index.html">Biography</a></li>
          <li class="Menu-item"><a href="experience.html">Experience</a></li>
          <li class="Menu-item"><a href="education.html">Education</a></li>
          <li class="Menu-item"><a href="checkers.html">Checkers</a></li>
          <li class="Menu-item"><a href="contact.php">Contact</a></li>
          <li class="Menu-item"><a href="settings.php">Login & Settings</a></li>
        </ul>
      </nav>
    </header>
    <!-- Feedback form -->
    <p></p>
    <h2>Settings</h2>
  </body>
  <!-- Easy access rating form footer on all pages -->
  <footer>  
    <div id="footer-div">
        <p id="rating-p">Rate this website:</p>        
        <form id="rating-form" onsubmit="ratingFormProcess()">
            <input type="radio" name="rating" value="1"> 1</input>
            <input type="radio" name="rating" value="2"> 2</input>
            <input type="radio" name="rating" value="3"> 3</input>
            <input type="radio" name="rating" value="4"> 4</input>
            <input type="radio" name="rating" value="5"> 5</input>
            <input id="submit-btn" type="submit" value="Submit" />
        </form>
    </div>
  </footer>
</html>