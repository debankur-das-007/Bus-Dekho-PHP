<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <body>
        <div class="flex align-end px-16 py-16 bg-color-1" style="height: 65vh;">
            <div class="flex align-center justify-between px-16 py-16 absolute w100-percent" style="top: 0px; left: 0px;">
                <div></div>
                <a class="color-2" href="./bus.php">
                    <img src="./../res/icons/skip.svg" alt="" height="36px">
                </a>
            </div>
            <div class="font-36 color-2">Welcome</div>
        </div>
        <div class="flex flex-column gap-16 px-16 py-16">
            <a href="signIn.php">
                <div class="flex justify-center px-16 py-16 font-20 color-2 br-8" style="background-color: #6b82a7;">Sign In</div>
            </a>
            <a href="signUp.php">
                <div class="flex justify-center px-16 py-16 font-20 color-1 br-8" style="border: 2px solid #6b82a7;">Create Account</div>
            </a>
        </div>
    </body>
</html>