<?php
    session_start();
    if(isset($_SESSION['admin']))
    {
        header("Location: ./dashboard.php");
        exit();
    }
    if(isset($_REQUEST['submit']))
    {
        if(!isset($_REQUEST['username']) || !isset($_REQUEST['password']))
        {
            header("Location: ./signIn.php");
            exit();
        }
        $username = $_REQUEST['username'];
        $password = md5($_REQUEST['password']);
        $query = "SELECT * FROM `admin_master`";
        include("./../connection/connection.php");
        $data = mysqli_query($connection, $query);
        while($ar = mysqli_fetch_array($data))
        {
            if($username == $ar['username'] && $password == $ar['password'])
            {
                $_SESSION['admin'] = 1;
                header("Location: ./dashboard.php");
                exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <body>
        <div class="flex flex-column justify-end px-16 py-16 bg-color-1" style="height: 40vh;">
            <div class="font-18 color-2">Admin Sign In</div>
            <div class="font-36 color-2">Welcome Back</div>
        </div>
        <form class="flex flex-column gap-16 px-16 py-16" method="POST">
            <div>
                <div class="font-16">Username</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="text" placeholder="Enter your username" name="username">
            </div>
            <div>
                <div class="font-16">Password</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="text" placeholder="Enter your password" name="password">
            </div>
            <div>
                <input class="px-16 py-16 font-18 color-2 br-8 w100-percent" style="background-color: #6b82a7;" type="submit" value="Sign In" name="submit">
            </div>
        </form>
    </body>
</html>