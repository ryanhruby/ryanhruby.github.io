<?php 

$dbLocation = "localhost"; //does this need the port # also?
$dbUsername = "root";
$dbPassword = "root";
$dbName = "";

$db = mysqli_connect($dbLocation, $dbUsername, $dbPassword, $dbName);

if(emailUsedRecently($db, $_POST['email'])){
    echo "The provided email was used to give feedback less than one hour ago. Please wait before providing feedback again.";
}

$query = "INSERT INTO Customers(
    email_address,
    first_name,
    last_name,
    phone_number,
    address) 
    VALUES ('$_POST[email]',
    '$_POST[firstName]',
    '$_POST[lastName]',
    '$_POST[phone]',
    '$_POST[address]');";

$success = mysqli_query($db, $query);
mysqli_close($db);
echo "Feedback successfully recorded.";

//Update to check if email was used recently (timestamp column in table)
//Get current time in PHP and then base WHERE clause off of that?
function emailUsedRecently($db, $email){
    $query = "SELECT * FROM Customers WHERE email_address =  '$email'";
    $customers = mysqli_query($db, $query);
    $numRecords = mysqli_num_rows($customers);
    return ($numRecords > 0) ? true : false;
}

?>