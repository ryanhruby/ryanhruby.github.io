<?php

session_start();

$_SESSION['loggedIn'] = false;
echo "Login status:" . $_SESSION['loggedIn'];

?>