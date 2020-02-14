<?php
ob_start();
session_start();
$current_page=$_SERVER['SCRIPT_FILENAME'];


function loggedin()
{
    if(isset($_SESSION['user_id']))
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>