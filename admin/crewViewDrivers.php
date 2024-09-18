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
                <div class="flex align-center font-28 color-2">Crews >&nbsp;<div class="font-14">View Drivers</div></div>
                <div class="font-14 color-2">Manage your drivers here</div>
            </div>
            <div class="flex flex-column gap-16">
                <?php
                    $query = "SELECT * FROM `driver_master`";
                    $data = mysqli_query($connection, $query);
                    while($ar = mysqli_fetch_array($data))
                    {
                ?>
                        <div class="flex align-center gap-16 px-16 py-8 br-8 bs-8 bg-color-2">
                            <div class="flex flex-column gap-8 w100-percent">
                                <div class="font-18"><span class="color-1">Name:</span> <?php echo $ar['first_name']." ".$ar['middle_name']." ".$ar['last_name']; ?></div>
                                <div class="font-16"><span class="color-1">Phone:</span> <?php echo $ar['phone']; ?></div>
                                <div class="font-16"><span class="color-1">D.O.B:</span> <?php echo $ar['dob']; ?></div>
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