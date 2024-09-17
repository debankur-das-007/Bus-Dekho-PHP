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
                <div class="flex align-center font-28 color-2">Buses >&nbsp;<div class="font-14">View Buses</div></div>
                <div class="font-14 color-2">Manage your buses here</div>
            </div>
            <div class="flex flex-column gap-16">
                <?php
                    $query = "SELECT 
                                bm.`bus_id`,
                                bm.`bus_name`,
                                bm.`registration`,
                                IFNULL(bm.`last_service_date`, '') AS last_service_date,
                                blm.`color`,
                                blm.`fuel_type`,
                                blm.`bus_type`,
                                blm.`capacity`
                            FROM `bus_master` bm
                            LEFT JOIN `bus_lineup_master` blm ON blm.`lineup_id` = bm.`lineup_id`";
                    $data = mysqli_query($connection, $query);
                    while($ar = mysqli_fetch_array($data))
                    {
                ?>
                        <div class="flex align-center gap-16 px-16 py-8 br-8 bs-8 bg-color-2">
                            <div class="flex flex-column gap-8 w100-percent">
                                <div class="flex justify-between align-center">
                                    <div class="font-20"><?php echo $ar['bus_name']; ?></div>
                                    <div class="font-16">Registration: <?php echo $ar['registration']; ?></div>
                                </div>
                                <div class="font-16">Last Service Date: <?php echo $ar['last_service_date']; ?></div>
                                <div class="flex justify-between align-center">
                                    <div class="flex align-center gap-8">
                                        <div class="marker color-1"><?php echo $ar['fuel_type']; ?></div>
                                        <div class="marker color-1"><?php echo $ar['bus_type']; ?></div>
                                    </div>
                                    <div class="marker color-1"><?php echo $ar['color']; ?> Bus</div>
                                </div>
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