<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <body>
        <div class="flex flex-column justify-end px-16 py-16 bg-color-1" style="height: 30vh;">
            <a class="absolute" href="index.php" style="top: 16px; left: 16px;">
                <img  src="./../res/icons/go-back-white.svg" alt="" width="36px">
            </a>
            <div class="font-18 color-2">Create Account</div>
            <div class="font-36 color-2">Welcome</div>
        </div>
        <form class="flex flex-column gap-16 px-16 py-16">
            <div>
                <div class="font-16">Full Name</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="text" placeholder="Enter your full name" name="full-name">
            </div>
            <div>
                <div class="font-16">Phone</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="number" placeholder="Enter your phone" name="phone">
            </div>
            <div>
                <div class="font-16">Email</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="email" placeholder="Enter your email" name="phone">
            </div>
            <div>
                <div class="font-16">Password</div>
                <input class="px-16 py-16 font-18 color-1 br-8 w100-percent" style="border: 2px solid #6b82a7;" type="text" placeholder="Enter your password" name="password">
            </div>
            <div>
                <input class="px-16 py-16 font-18 color-2 br-8 w100-percent" style="background-color: #6b82a7;" type="submit" value="Sign In" name="submit">
            </div>
        </form>
        <div class="flex align-center px-16" style="padding-bottom: 32px;">
            Already have an account?&nbsp;
            <a class="font-16 color-1" href="signIn.php" style="text-decoration: underline; text-decoration-color: #00245c">Sign In</a>
        </div>
    </body>
</html>