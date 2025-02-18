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
        <?php include("./sideNavigation.php") ?>
        <div class="container relative">
            <div style="margin-top: 64px; margin-bottom: 32px;">
                <div class="flex align-center font-28 color-2">Buses >&nbsp;<div class="font-14">View Lineups</div></div>
                <div class="font-14 color-2">Manage your bus lineups here</div>
            </div>
            <div class="flex flex-column gap-16">
                <?php
                    $query = "SELECT * FROM `bus_lineup_master`";
                    $data = mysqli_query($connection, $query);
                    while($ar = mysqli_fetch_array($data))
                    {
                ?>
                        <div class="flex align-center gap-16 px-16 py-8 br-8 bs-8 bg-color-2">
                            <div class="flex flex-column gap-8 w100-percent">
                                <div class="flex justify-between align-center">
                                    <div class="font-20">Color: <?php echo $ar['color']; ?></div>
                                    <div class="font-16">Bus Count: <?php echo $ar['count']; ?></div>
                                </div>
                                <div class="flex justify-between align-center">
                                    <div class="flex align-center gap-8">
                                        <div class="marker color-1"><?php echo $ar['fuel_type']; ?></div>
                                        <div class="marker color-1"><?php echo $ar['bus_type']; ?></div>
                                    </div>
                                </div>
                                <div class="font-14">Capacity: <?php echo $ar['capacity']; ?></div>
                            </div>
                            <div>
                                <img src="./../res/icons/edit.svg" alt="" width="24px">
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    <body>
</html>