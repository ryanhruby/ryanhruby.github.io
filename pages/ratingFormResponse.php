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

if($_SESSION['ratingSubmitted'] == true){
    mysqli_close($db);
    exit("-2");
}

$timeSubmitted = time();

$query = "INSERT INTO Ratings(
    rating,
    timeSubmitted)
    VALUES (?,?);";

$ps = mysqli_stmt_init($db);
mysqli_stmt_prepare($ps, $query);

mysqli_stmt_bind_param($ps, 'ss', $_GET['rating'], $timeSubmitted);

$success = mysqli_stmt_execute($ps);

mysqli_close($db);
if($success){
    $_SESSION['ratingSubmitted'] = true;
    $_SESSION['rating'] = $_GET['rating'];
    echo $_GET['rating'];
}
else{
    echo '-1';
}

?>