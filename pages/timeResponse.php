<?php

session_start();

date_default_timezone_set($_SESSION["timezone"]);

if($_SESSION['prefClock'] == '12hr'){
    echo date('h:iA e');
}
elseif($_SESSION['prefClock'] == '24hr'){
    echo date('H:i e');
}
else{
    echo "00:00";
}

?>