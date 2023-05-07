<?php 

$dbLocation = "cse.unl.edu";
$dbUsername = "rhruby";
$dbPassword = "";
$dbName = "rhruby";

$db = mysqli_connect($dbLocation, $dbUsername, $dbPassword, $dbName);

if(emailUsedRecently($db, $_POST['email'])){
    echo "The provided email has already been registered. Please submit a different email.";
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
echo "Customer successfully registered.";

function emailUsedRecently($db, $email){
    $query = "SELECT * FROM Customers WHERE email_address =  '$email'";
    $customers = mysqli_query($db, $query);
    $numRecords = mysqli_num_rows($customers);
    return ($numRecords > 0) ? true : false;
}

?>