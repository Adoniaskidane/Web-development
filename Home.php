<?php
require 'core.ini.php';

if(loggedin())
{

    //every thing  after logged here
    echo "Welcome to out website currently you are logged in: <br>";
    echo $current_page."<br>";
}
else
{
    header("Location:index.php");
}


?>

<form action="Logout.php" method="POST">
<input type='submit' value="Signout">
</form>
