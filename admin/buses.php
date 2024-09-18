<?php
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: ./index.php");
        exit();
    }
    include("./../connection/connection.php");
    if(isset($_REQUEST['add-bus']))
    {
        if(!isset($_REQUEST['lineup']) || (int) $_REQUEST['lineup'] == 0 || !isset($_REQUEST['bus-name']) || $_REQUEST['bus-name'] == "" || !isset($_REQUEST['reg-no']) || $_REQUEST['reg-no'] == "")
        {
            header("Location: ./buses.php");
            exit();
        }

        $lineup = (int) $_REQUEST['lineup'];
        $busName = $_REQUEST['bus-name'];
        $regNo = $_REQUEST['reg-no'];
        
        $query = "INSERT INTO `bus_master` SET `lineup_id` = '$lineup', `bus_name` = '$busName', `registration` = '$regNo'";
        $data = mysqli_query($connection, $query);
        if($data)
        {
            header("Location: ./buses.php");
            exit();
        }
    }
    if(isset($_REQUEST['add-lineup']))
    {
        if(!isset($_REQUEST['lineup-color']) || $_REQUEST['lineup-color'] == "" || !isset($_REQUEST['fuel-type']) || $_REQUEST['fuel-type'] == "" || !isset($_REQUEST['bus-type']) || $_REQUEST['bus-type'] == "" || !isset($_REQUEST['capacity']) || (int) $_REQUEST['capacity'] < 1)
        {
            header("Location: ./buses.php");
            exit();
        }

        $lineupColor = $_REQUEST['lineup-color'];
        $fuelType = $_REQUEST['fuel-type'];
        $busType = $_REQUEST['bus-type'];
        $capacity = $_REQUEST['capacity'];

        $query = "INSERT INTO `bus_lineup_master` SET `color` = '$lineupColor', `fuel_type` = '$fuelType', `bus_type` = '$busType', `capacity` = '$capacity'";
        $data = mysqli_query($connection, $query);
        if($data)
        {
            header("Location: ./buses.php");
            exit();
        }
    }
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
                <div class="font-28 color-2">Buses</div>
                <div class="font-14 color-2">Manage your buses and bus lineups here</div>
            </div>
            <div class="flex flex-column gap-32">
                <div class="flex flex-column gap-8">
                    <div class="font-22" style="line-height: 20px;">Bus</div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div class="flex gap-8">
                        <div class="px-16 py-8 font-18 br-8 bs-8 cursor-pointer bg-color-2" onclick="toggleOverlay(0)">Add Bus</div>
                        <a href="busView.php"><div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2">View Buses</div></a>
                    </div>
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-22" style="line-height: 20px;">Bus Lineup</div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div class="flex gap-8">
                        <div class="px-16 py-8 font-18 br-8 bs-8 cursor-pointer bg-color-2" onclick="toggleOverlay(1)">Add Lineup</div>
                        <a href="busLineups.php"><div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2">View Lineups</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay flex align-center justify-center absolute">
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
                    <input class="input-field font-16" type="text" name="bus-name" placeholder="Enter bus name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Registration number</div>
                    <input class="input-field font-16" type="text" name="reg-no" placeholder="Enter bus registration number">
                </div>
                <input class="input-field font-16" type="submit" name="add-bus">
                <input class="input-field font-16" type="button" value="Cancel" onclick="toggleOverlay(0)">
            </form>
        </div>
        <div class="overlay flex align-center justify-center absolute">
            <form class="base-form flex flex-column gap-16 px-16 py-16 br-8 bs-8" method="POST">
                <div class="font-28 color-1">Add Bus Lineup</div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Lineup color</div>
                    <input class="input-field font-16" type="text" name="lineup-color" placeholder="Enter bus lineup color">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Fuel type</div>
                    <select class="input-field font-16" name="fuel-type">
                        <option>Select a fuel type</option>
                        <option value="CNG">CNG</option>
                        <option value="EV">EV</option>
                    </select>
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Bus type</div>
                    <select class="input-field font-16" name="bus-type">
                        <option>Select a bus type</option>
                        <option value="Non-AC">Non-AC</option>
                        <option value="AC">AC</option>
                    </select>
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Capacity</div>
                    <input class="input-field font-16" type="number" name="capacity" placeholder="Enter bus capacity">
                </div>
                <input class="input-field font-16" type="submit" name="add-lineup">
                <input class="input-field font-16" type="button" value="Cancel" onclick="toggleOverlay(1)">
            </form>
        </div>
    </body>
    <script src="./../js/script.js"></script>
</html>