<?php

session_start();

$prevTimezone = $_SESSION["timezone"];
$prevClock = $_SESSION["prefClock"];
$prevTheme = $_SESSION["prefTheme"];

$dbLocation = "localhost:3306";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "project";

$db = mysqli_connect($dbLocation, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("0:Sorry, an error occurred. Please try again later.");
}

$query = "UPDATE Users SET timezonePref = ?, clockPref = ?, themePref = ?
    WHERE username = ?";

$ps = mysqli_stmt_init($db);
mysqli_stmt_prepare($ps, $query);

mysqli_stmt_bind_param($ps, 'ssss', 
    $_POST["prefTimezone"], $_POST["prefClock"], $_POST["prefTheme"], $_SESSION["username"]);

$success = mysqli_stmt_execute($ps);

if($success == false){
    mysqli_close($db);    
    exit("0:Sorry, an error occurred. Please try again later.");
}

mysqli_close($db);

$_SESSION["timezone"] = $_POST["prefTimezone"];
$_SESSION["prefClock"] = $_POST["prefClock"];
$_SESSION["prefTheme"] = $_POST["prefTheme"];
$_SESSION["currTheme"] = $_POST["prefTheme"];

echo $prevTimezone . ":" . $_SESSION["timezone"] . ":" . $prevClock . ":" . $_SESSION["prefClock"]
    . ":" . $prevTheme . ":" . $_SESSION["prefTheme"];

?>