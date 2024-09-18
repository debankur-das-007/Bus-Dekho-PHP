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
                <div class="font-28 color-2">Routes</div>
                <div class="font-14 color-2">Manage your routes here</div>
            </div>
            <div class="flex flex-column gap-32">
                <div class="flex flex-column gap-8">
                    <div class="font-22" style="line-height: 20px;">Routes</div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div class="flex gap-8">
                        <a href="routeCreate.php"><div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2" onclick="toggleOverlay(0)">Create Route</div></a>
                        <a href="routeView.php"><div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2">View Routes</div></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="overlay flex align-center justify-center absolute">
            <form class="base-form flex flex-column gap-16 px-16 py-16 br-8 bs-8" method="POST">
                <div class="font-28 color-1">Add Bus Lineup</div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Select a bus lineup</div>
                    <select class="input-field font-16" name="lineup">
                        <option>Select a lineup</option>
                        <?php
                            $query = "SELECT * FROM `bus_lineup_master` WHERE `activity` = 1";
                            $data = mysqli_query($connection, $query);
                            while($ar = mysqli_fetch_array($data))
                            {
                        ?>
                                <option value="<?php echo $ar['lineup_id']; ?>"><?php echo $ar['color']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Bus name</div>
                    <input class="input-field font-16" type="text" name="lineup-color" placeholder="Enter bus name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Registration number</div>
                    <input class="input-field font-16" type="text" name="lineup-color" placeholder="Enter bus registration number">
                </div>
                <input class="input-field font-16" type="submit" name="submit">
                <input class="input-field font-16" type="button" value="Cancel" onclick="toggleOverlay(0)">
            </form>
        </div> -->
    </body>
    <script src="./../js/script.js"></script>
</html>