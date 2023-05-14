<?php 

$dbLocation = "localhost:3306";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "project";

$db = mysqli_connect($dbLocation, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Sorry, an error occurred. Please try again later.");
}

$query = "SELECT * FROM Users WHERE username = ?;";

$ps = mysqli_stmt_init($db);
mysqli_stmt_prepare($ps, $query);

mysqli_stmt_bind_param($ps, 's', $_POST['username']);

$success = mysqli_stmt_execute($ps);

if($success == false){
    mysqli_close($db);    
    exit("Sorry, an error occurred. Please try again later.");
}

$result = mysqli_stmt_get_result($ps);
$numRows = mysqli_num_rows($result);
if($numRows > 0){
    mysqli_close($db); 
    exit("Sorry, that username is already in use. Please try a different username.");
}

$query2 = "INSERT INTO Users(username, password, themePref, clockPref, timezonePref) VALUES (?,?, 'light', '12hr', 'US/Central');";
$ps2 = mysqli_stmt_init($db);
mysqli_stmt_prepare($ps2, $query2);

$hashedPassword = hash('sha256', $_POST['password']);

mysqli_stmt_bind_param($ps2, 'ss', $_POST['username'], $hashedPassword);

$success2 = mysqli_stmt_execute($ps2);
if($success == false){
    mysqli_close($db);    
    exit("Sorry, an error occurred. Please try again later.");
}

echo "Registration successful! Please login with your username and password.";