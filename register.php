<?php
require_once "core.ini.php";
require_once "connect.ini.php";

function register(){
    global $connect;
    if(isset($_POST['Fname'])&&isset($_POST['Lname'])&&isset($_POST['Uname'])&&isset($_POST['email'])&&isset($_POST['pass']))
    {
        $Fname=mysqli_real_escape_string($connect,$_POST['Fname']);
        $Lname=mysqli_real_escape_string($connect,$_POST['Lname']);
        $Uname=mysqli_real_escape_string($connect,$_POST['Uname']);
        $Email=mysqli_real_escape_string($connect,$_POST['email']);
        $Pass=mysqli_real_escape_string($connect,$_POST['pass']);
        if(!empty($Fname)&&!empty($Lname)&&!empty($Uname)&&!empty($Email)&&!empty($Pass))
        {
           $checkquery="SELECT * FROM `users` WHERE `Email`='".$Email."' OR `username`='".$Uname."'";
            if($checkquery_run=mysqli_query($connect,$checkquery))
            {
                echo $Email."<br>";
                echo mysqli_num_rows($checkquery_run)."<br>";
                if(mysqli_num_rows($checkquery_run)==0)
                {
                    echo "register";
                    /* This is the final registration place, every thing verified
                     and customer can continue to be regster*/
                     /* Insert a customer here*/
                    // $insertion="INSERT INTO `users` (`id`, `username`, `password`, `Email`, `firstname`, `lastname`) VALUES ('','$Uname','$pass','$Email','$Fname','$Lname')";
                      //header("Location:index.php");

                }
                else{
                    $usernameQuery="SELECT * FROM `users` WHERE `username`='$Uname'";
                    $EmailQuery="SELECT * FROM `users` WHERE `email`='$Email'";
                    if($usercheck=mysqli_query($connect,$usernameQuery)&&$Emailcheck=mysqli_query($connect,$EmailQuery))
                    {
                        $usercheck=mysqli_query($connect,$usernameQuery);
                        $Emailcheck=mysqli_query($connect,$EmailQuery);
                        echo "row of username",mysqli_num_rows($usercheck)."<br>";
                        echo "row of email",mysqli_num_rows($Emailcheck)."<br>";
                         if(mysqli_num_rows($usercheck)!=0)
                         {
                             echo "Your username is exist! change username";
                         }
                         if(mysqli_num_rows($Emailcheck)!=0)
                         {
                             echo "You already have existed Account with this Email.";
                         }
                    }
                    else{
                        echo "query failed.";
                    }

                }
            }
            else{
                echo mysqli_error($connect);
                echo "Qurey failed";
            }

        }
        else{
            echo "All field must be filled!";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    <form action="register.php" method="POST">
    <label>FirstName</label>
    <input type="text" name="Fname" ><br>
    <label>LastName</label>
    <input type="text" name="Lname"><br>
    <label>Username</label>
    <input type="text" name="Uname"><br>
    <label>Email</label>
    <input type="text" name="email"><br>
    <label>Password</label>
    <input type="password" name="pass"> <br>
    <div id="msg"><?php register();?> <div>
    <input type="submit" value="Signup">
 
    </form>
    
</body>
</html>