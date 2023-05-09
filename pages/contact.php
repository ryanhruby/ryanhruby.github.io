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
      <form id="feedback-form" onsubmit="feedbackFormProcess()"> <!--may need action and method here for PHP-->
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
          <!--<div id="other-ideas">Other Ideas: <textarea id="other-ideas-input" rows="1" cols="50"></textarea></div> -->
          <input id="other-ideas" type="text" name="otherIdeasInput" size="50" maxlength="250" placeholder="Other Ideas"></input>
        </fieldset>
        <p></p>
        <fieldset class="flex-container" class="field-padding">
          <legend class="Bold">Submit &#38 Reset</legend>
          <input id="fb-submit" type="submit" value="Send Feedback" />
          <input id="fb-reset" type="reset" value="Reset Form" />
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