<?php
    session_start();
    if(isset($_REQUEST['submit']))
    {
        if(!isset($_REQUEST['phone']) || !isset($_REQUEST['password']))
        {
            header("Location: ./signIn.php");
            exit();
        }
        $phone = (int) $_REQUEST['phone'];
        $password = md5($_REQUEST['password']);
        $query = "SELECT `uid`, `name`, `phone`, `password` FROM `user_master`";
        $data = mysqli_query($connection, $query);
        while($ar = mysqli_fetch_array($data))
        {
            if($phone == $ar['phone'] && $password == $ar['password'])
            {
                $_SESSION['user'] = $ar['name'];
                header("Location: bus.php");
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
            <div class="flex align-center justify-between px-16 py-16 absolute w100-percent" style="top: 0px; left: 0px;">
                <a href="index.php">
                    <img  src="./../res/icons/go-back-white.svg" alt="" height="36px">
                </a>
                <a class="color-2" href="bus.php">
                    <img src="./../res/icons/skip.svg" alt="" height="36px">
                </a>
            </div>
            <div class="font-18 color-2">Sign In</div>
            <div class="font-36 color-2">Welcome Back</div>
        </div>
        <form class="flex flex-column gap-16 px-16 py-16">
            <div>
                <div class="font-16">Phone</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="number" placeholder="Enter your phone" name="phone">
            </div>
            <div>
                <div class="font-16">Password</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="text" placeholder="Enter your password" name="password">
            </div>
            <div>
                <input class="px-16 py-16 font-18 color-2 br-8 w100-percent" style="background-color: #6b82a7;" type="submit" value="Sign In" name="submit">
            </div>
        </form>
        <div class="flex align-center justify-between px-16">
            <a href="signUp.php" style="text-decoration: underline; text-decoration-color: #00245c"><div class="font-16 color-1">Create Account</div></a>
            <a href="#" style="text-decoration: underline; text-decoration-color: #00245c"><div class="font-16 color-1">Forgot Password?</div></a>
        </div>
    </body>
</html>