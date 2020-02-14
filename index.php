<?php
require 'core.ini.php';
require 'connect.ini.php';


if(loggedin())
{
   header("Location:Home.php");
}
else
{
    include "Login.php";
}

?>