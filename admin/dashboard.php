<?php
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: ./index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <body>
        <div class="background-panel absolute bg-color-1"></div>
        <?php include("./topNavigation.php") ?>
        <div class="container relative">
            <div class="my-16">
                <div class="font-18 color-2">Good Morning</div>
                <div class="font-28 color-2">Admin Name</div>
            </div>
            <div class="flex justify-between gap-8">
                <a href="buses.php">
                    <div class="res-image-001 br-8 bs-8 bg-color-2">
                        <img src="./../res/icons/bus.svg" alt="">
                        <div class="font-16">Buses</div>
                    </div>
                </a>
                <a href="crews.php">
                    <div class="res-image-001 br-8 bs-8 bg-color-2">
                        <img src="./../res/icons/crews.svg" alt="">
                        <div class="font-16">Crews</div>
                    </div>
                </a>
                <a href="routes.php">
                    <div class="res-image-001 br-8 bs-8 bg-color-2">
                        <img src="./../res/icons/trips.svg" alt="">
                        <div class="font-16">Routes</div>
                    </div>
                </a>
            </div>
        </div>
    </body>
</html>