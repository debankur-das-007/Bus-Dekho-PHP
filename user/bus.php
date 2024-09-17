<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <body>
        <div class="background-panel absolute bg-color-1"></div>
        <?php include("./topNavigation.php") ?>
        <?php include("./sideNavigation.php"); ?>
        <div class="container relative">
            <div class="my-16">
                <div class="font-18 color-2">Good Morning</div>
                <?php
                    if(isset($_SESSION['user']))
                    {
                ?>
                        <div class="font-28 color-2"><?php $_SESSION['user']; ?></div>
                <?php
                    }
                ?>
            </div>
            <div class="flex space-between gap-8 px-8 py-8 my-16 br-8 bs-8 bg-color-2">
                <div class="flex flex-column align-center justify-start" style="padding-top: 4px;">
                    <img src="./../res/icons/point-hollow-ellipse.svg" alt="" width="12px">
                    <div class="bg-color-1" style="width: 1px; height: 42px;"></div>
                    <img src="./../res/icons/point-hollow-ellipse.svg" alt="" width="12px">
                </div>
                <div class="flex flex-column gap-4 w100-percent">
                    <div>
                        <div class="font-14">From</div>
                        <div class="">
                            <div class="flex align-center">
                                <input class="w100-percent font-16" type="text" placeholder="Type to search">
                                <img src="./../res/icons/cross.svg" alt="" width="12px">
                            </div>
                        </div>
                    </div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div>
                        <div class="font-14">To</div>
                        <div class="">
                            <div class="flex align-center">
                                <input class="w100-percent font-16" type="text" placeholder="Type to search">
                                <img src="./../res/icons/cross.svg" alt="" width="12px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex align-center">
                    <img src="./../res/icons/up-down.svg" alt="" width="24px">
                </div>
            </div>
            <div class="flex flex-column gap-8 my-16">
                <div class="font-28">Near You</div>
                <div class="card-container flex flex-column gap-16">
                    <a href="tracking.php">
                        <div class="flex flex-column gap-4 px-16 py-8 br-8 bs-8 bg-color-2">
                            <div class="flex align-center justify-between">
                                <div class="flex align-center gap-8">
                                    <div class="font-20">DW2</div>
                                    <div class="font-14 color-green">Arriving</div>
                                </div>
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
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php include("./bottomNavigation.php"); ?>
    </body>
    <script src="./../js/script.js"></script>
</html>