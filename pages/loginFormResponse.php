<?php

session_start();

$dbLocation = "localhost:3306";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "project";

$db = mysqli_connect($dbLocation, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Sorry, an error occurred. Please try again later.");
}

$query = "SELECT * FROM Users WHERE username = ? AND password = ?;";

$ps = mysqli_stmt_init($db);
mysqli_stmt_prepare($ps, $query);

$hashedPassword = hash('sha256', $_POST['password']);

mysqli_stmt_bind_param($ps, 'ss', $_POST['username'], $hashedPassword);

$success = mysqli_stmt_execute($ps);

if($success == false){
    mysqli_close($db);    
    exit("Sorry, an error occurred. Please try again later.");
}

$result = mysqli_stmt_get_result($ps);
$numRows = mysqli_num_rows($result);
if($numRows == 0){
    mysqli_close($db); 
    exit("The username or password entered is incorrect. Please try again.");
}

$_SESSION['loggedIn'] = true;

$_SESSION['username'] = $_POST['username'];

$query2 = "SELECT timezonePref, themePref, clockPref FROM Users WHERE username = ?;";

$ps2 = mysqli_stmt_init($db);
mysqli_stmt_prepare($ps2, $query2);

mysqli_stmt_bind_param($ps2, 's', $_SESSION['username']);

$success2 = mysqli_stmt_execute($ps2);

if($success2 == false){
    mysqli_close($db);    
    exit("Sorry, an error occurred. Please try again later.");
}

$result = mysqli_stmt_get_result($ps2);
$row = mysqli_fetch_row($result);

$_SESSION["timezone"] = $row[0];
$_SESSION["prefTheme"] = $row[1];
$_SESSION["currTheme"] = $row[1];
$_SESSION["prefClock"] = $row[2];

mysqli_close($db);

echo "Successfully logged in.";

?>