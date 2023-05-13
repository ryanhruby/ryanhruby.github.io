<?php

session_start();

$currentTheme = $_SESSION['currTheme'];

if($_SESSION['currTheme'] == "light"){
    $_SESSION['currTheme'] = "dark";
} else{
    $_SESSION['currTheme'] = "light";
}

echo $_SESSION['currTheme'];

?>