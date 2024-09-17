<?php
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: ./index.php");
        exit();
    }
    include("./../connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <body>
        <div class="background-panel absolute bg-color-1"></div>
        <?php include("./topNavigation.php") ?>
        <div class="container relative">
            <div style="margin-top: 64px; margin-bottom: 32px;">
                <div class="font-28 color-2">Crews</div>
                <div class="font-14 color-2">Manage your driver and conductors here</div>
            </div>
            <div class="flex flex-column gap-32">
                <div class="flex flex-column gap-8">
                    <div class="font-22" style="line-height: 20px;">Drivers</div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div class="flex flex-wrap gap-8">
                        <div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2" onclick="toggleOverlay(0)">Register Driver</div>
                        <div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2">View Drivers</div>
                    </div>
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-22" style="line-height: 20px;">Conductors</div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div class="flex flex-wrap gap-8">
                        <div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2" onclick="toggleOverlay(1)">Register Conductor</div>
                        <div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2">View Conductors</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay flex align-center justify-center absolute">
            <form class="base-form flex flex-column gap-16 px-16 py-16 br-8 bs-8" method="POST">
                <input type="hidden" name="reg-type" value='1'>
                <div class="font-28 color-1">Add Driver</div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">First Name</div>
                    <input class="input-field font-16" type="text" name="first-name" placeholder="Enter first name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Middle Name</div>
                    <input class="input-field font-16" type="text" name="middle-name" placeholder="Enter middle name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Last Name</div>
                    <input class="input-field font-16" type="text" name="last-name" placeholder="Enter last name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Phone</div>
                    <input class="input-field font-16" type="number" name="phone" placeholder="Enter phone number">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Password</div>
                    <input class="input-field font-16" type="text" name="password" placeholder="Enter password">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Date of Birth</div>
                    <input class="input-field font-16" type="date" name="dob">
                </div>
                <input class="input-field font-16" type="submit" name="submit">
                <input class="input-field font-16" type="button" value="Cancel" onclick="toggleOverlay(0)">
            </form>
        </div>
        <div class="overlay flex align-center justify-center absolute">
            <form class="base-form flex flex-column gap-16 px-16 py-16 br-8 bs-8" method="POST">
                <input type="hidden" name="reg-type" value='2'>
                <div class="font-28 color-1">Add Conductor</div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">First Name</div>
                    <input class="input-field font-16" type="text" name="first-name" placeholder="Enter first name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Middle Name</div>
                    <input class="input-field font-16" type="text" name="middle-name" placeholder="Enter middle name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Last Name</div>
                    <input class="input-field font-16" type="text" name="last-name" placeholder="Enter last name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Phone</div>
                    <input class="input-field font-16" type="number" name="phone" placeholder="Enter phone number">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Password</div>
                    <input class="input-field font-16" type="text" name="password" placeholder="Enter password">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Date of Birth</div>
                    <input class="input-field font-16" type="date" name="dob">
                </div>
                <input class="input-field font-16" type="submit" name="submit">
                <input class="input-field font-16" type="button" value="Cancel" onclick="toggleOverlay(1)">
            </form>
        </div>
    </body>
    <script src="./../js/script.js"></script>
</html>