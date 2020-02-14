<?php
require "core.ini.php";

if(loggedin())
{
    session_destroy();
    echo "You have successfuly logged out<br>";
    header("Location:index.php");

}
else{
    header("Location:index.php");
}

?>