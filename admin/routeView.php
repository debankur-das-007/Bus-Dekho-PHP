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
                <div class="flex align-center font-28 color-2">Routes >&nbsp;<div class="font-14">View</div></div>
                <div class="font-14 color-2">View your routes here</div>
            </div>
            <div class="flex flex-column gap-16">
                <?php
                    $query = "SELECT * FROM `route_master`";
                    $data = mysqli_query($connection, $query);
                    while($ar = mysqli_fetch_array($data))
                    {
                ?>
                        <div class="flex align-center gap-16 px-16 py-8 br-8 bs-8 bg-color-2">
                            <div class="flex flex-column gap-8 w100-percent">
                                <div class="font-18"><span class="color-1"><?php echo $ar['route_name']; ?></div>
                                <div class="flex flex-column">
                                    <div class="font-16"><span class="color-1">From:</span> <?php echo $ar['from']; ?></div>
                                    <div class="flex justify-center my-8"><img src="./../res/icons/arrow-down.svg" alt=""></div>
                                    <div class="font-16"><span class="color-1">To:</span> <?php echo $ar['to']; ?></div>
                                </div>
                            </div>
                            <div class="flex flex-column gap-32">
                                <img class="cursor-pointer" src="./../res/icons/edit.svg" alt="" width="24px">
                                <a href="routeViewMap.php?route-id=<?php echo $ar['route_id']; ?>"><img class="cursor-pointer" src="./../res/icons/inspect.svg" alt="" width="24px"></a>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
    <script src="./../js/script.js"></script>
</html>