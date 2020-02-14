<?php
// The need to be modified based on the database name
$host="localhost";
$DB_username="root";
$DB_password="";
$DB_name="journey_database";

$connect=mysqli_connect($host,$DB_username,$DB_password,$DB_name);
if(mysqli_connect_error())
{
    echo mysqli_connect_error();
    die();
}


?>