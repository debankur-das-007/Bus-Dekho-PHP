<?php
    session_start();
    if(!isset($_SESSION['driver']))
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
                <?php
                    if(isset($_SESSION['driver']))
                    {
                ?>
                        <div class="font-28 color-2"><?php echo $_SESSION['driver']; ?></div>
                <?php
                    }
                ?>
            </div>
            <div class="flex justify-between gap-8">
                <div class="res-image-001 br-8 bs-8 bg-color-2">
                    <img class="res-image-001" src="./../res/icons/schedule.svg" alt="">
                    <div class="font-16">Schedule</div>
                </div>
                <div class="res-image-001 br-8 bs-8 bg-color-2">
                    <img class="" src="./../res/icons/temp-qr-code.svg" alt="">
                    <div class="font-16">Start Trip</div>
                </div>
                <div class="res-image-001 br-8 bs-8 bg-color-2">
                    <img class="res-image-001" src="./../res/icons/trips.svg" alt="">
                    <div class="font-16">Trips</div>
                </div>
            </div>
            <div class="flex flex-column gap-8 my-16">
                <div>
                    <div class="font-14 color-1">Today's</div>
                    <div class="font-28">Upcoming Trips</div>
                </div>
                <div class="card-container flex flex-column gap-16">
                    <a href="tracking.php">
                        <div class="flex flex-column gap-4 px-16 py-8 br-8 bs-8 bg-color-2">
                            <div class="flex align-center justify-between">
                                <div class="font-20">DW2</div>
                                <div class="marker font-14 color-green">
                                    10:30 AM
                                </div>
                            </div>
                            <div class="flex align-center gap-8">
                                <div class="flex font-14">
                                    From:&nbsp;<div class="color-gray">Demo Origin</div>
                                </div>
                                <img src="./../res/icons/right-long-arrow.svg" alt="" width="20px">
                                <div class="flex font-14">
                                    To:&nbsp;<div class="color-gray">Demo Destination</div>
                                </div>
                            </div>
                            <div class="flex align-center gap-8">
                                <div class="marker color-1">EV</div>
                                <div class="marker color-1">AC</div>
                            </div>
                            <div class="flex font-18 color-gray">License Plate Number:&nbsp;<div class="color-1">WB1215</div></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php include("./bottomNavigation.php"); ?>
    </body>
</html>