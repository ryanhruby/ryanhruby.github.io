<?php 

$dbLocation = "localhost:3306";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "project";

$db = mysqli_connect($dbLocation, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Sorry, an error occurred. Please try again later." . $db->connect_error);
}

if(emailUsedRecently($db, $_POST['email'])){
    mysqli_close($db);
    exit("The provided email was used to give feedback less than one hour ago. Please wait before providing feedback again.");
}

$timeSubmitted = time();

$query = "INSERT INTO Feedback(
    email,
    galleryPage,
    langPage,
    resumePage,
    otherIdeasInput,
    timeSubmitted) 
    VALUES ('$_POST[email]',
    '$_POST[galleryPage]',
    '$_POST[langPage]',
    '$_POST[resumePage]',
    '$_POST[otherIdeasInput]',
    $timeSubmitted);";

$success = mysqli_query($db, $query);
mysqli_close($db);
if($success){
    echo "Feedback successfully recorded.";
}
else{
    echo "Sorry, an error occurred. Please try again later.";
}

function emailUsedRecently($db, $email){
    $rangeLimit = time() - 3600;
    $query = "SELECT * FROM Feedback WHERE timeSubmitted > $rangeLimit AND email = '$email';";
    $feedbacks = mysqli_query($db, $query);
    $numRecords = mysqli_num_rows($feedbacks);
    return ($numRecords > 0) ? true : false;
}

?>