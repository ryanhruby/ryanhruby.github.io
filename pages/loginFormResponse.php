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
if($numRows > 0){
    mysqli_close($db); 
    exit("The username or password entered is incorrect. Please try again.");
}

$_SESSION['loggedIn'] = true;

//SESSION variables loaded from DB

echo "Success";

?>