<?php

session_start();

$currentTheme = $_SESSION['currTheme'];

if($_SESSION['currTheme'] == "light"){
    $_SESSION['currTheme'] = "dark";
    $_SESSION['prefTheme'] = "dark";
} else{
    $_SESSION['currTheme'] = "light";
    $_SESSION['prefTheme'] = "light";
}

echo $_SESSION['prefTheme'];

?>