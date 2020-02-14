<?php
require_once "core.ini.php";
require_once "connect.ini.php";
function log_in()
{
    global $connect;
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        if(!empty($_POST['username'])&&!empty($_POST['password']))
        {
            $username=mysqli_real_escape_string($connect,$_POST['username']);
            $password=mysqli_real_escape_string($connect,$_POST['password']);
            $password_hash=md5($password);
            $query="SELECT `ID`,`email`,`username`, `firstname`, `lastname` FROM `users` WHERE `username`='$username' AND `password`='$password_hash'";

            if($query_run=mysqli_query($connect,$query))
            {
                $num=mysqli_num_rows($query_run);
                if($num==1)
                {
                    $row=mysqli_fetch_assoc($query_run);
                    $row['email'];
                    $user_Id=$row['ID'];
                    $row['username'];
                    $row['firstname'];
                    $row['lastname'];
                    $_SESSION['user_id']=$user_Id;
                    header("Location:Home.php");
            
                }
                else{
                    echo "Invalid username and password";
                }

            }
            else{
                echo "Query run failed";
            }
        }
        else
        {
            echo "you must fill all the fields";
        }
    }
}

?>
<?php

if(Loggedin())
{
    header("Location:Home.php");
}
else
{


?>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Practice project" content="Width-device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="prg_style.css">
    <title>Journeyinreality</title>
</head>

<body>
    <div>
    <header>
            
            <h1>Journey Reality</h1>
    </header>
    <section class="sec_A">

        <form action="index.php" method="POST">
            <h3>LOGIN</h3>
            <p>Username:<input type="text" name="username" /></p>
            <p>Password:<input type="password" name="password" /></p>
            <?php //log_in();?>
            <p><input type="submit" value="LOGIN"/></p>
        </form>

    </section>
    <section>

    </section>
    </div>

</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>titleoftheweb</title>
</head>
<body>
    <div id="container-big">

        <div class="header">

            <div class="logo">
                <img src="./imgs/randlog.png" alt="">
            </div>

            <div class="button">
                <button id="home">Home</button>
                <button id="about">About</button>
                <button id="service">Service</button>
            </div>

            <div class="reg">
                <button id=""><a href="register.php">Register<a></button>
            </div>
            
        </div>

        <div class="section">
            <!-- section A,B,C sub group-->

            <div class="section-A" > 
                <div class="register">
                    
                </div>
            </div>
			
			<!--  Seciton-B  -->
            <div class="section-B">
                <div class ="login">
                    <form action="index.php" method="POST">
                        <h1>Login</h1>
                        <div id="msg"><?php log_in();?></div>
                        <div> 
                            <label>Username or Email: </label>
                            <input type="text" name="username">
                        </div>
                        <div>
                            <lable>Password: </lable>
                            <input type="password" name="password">
                        </div> 
                        <input class="btn" type="submit" value="LOGIN">

                    </form>
                </div>
            </div>
			
			<!--  Seciton-C  -->
            <div class="section-C">
                <div class="other">
                  
                </div>
            </div>

        </div>

        <div class="section-2">
            <div class="box box1">1</div>
            <div class="box box2">2</div>
            <div class="box box3">3</div>
            <div class="box box4">4</div>
            <div class="box box5">5</div>
            <div class="box box6">6</div>
        </div>


        <div class="footer">

        </div>

    </div>
    <script src="main.js"></script>
</body>
</html>

<?php

}

?>