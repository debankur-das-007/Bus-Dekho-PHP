<?php
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: ./index.php");
        exit();
    }
    include("./../connection/connection.php");
    if(isset($_REQUEST['submit']))
    {
        if(!isset($_REQUEST['crew-type']) || !isset($_REQUEST['first-name']) || $_REQUEST['first-name'] == "" || !isset($_REQUEST['last-name']) || $_REQUEST['last-name'] == "" || !isset($_REQUEST['phone']) || !isset($_REQUEST['password']) || $_REQUEST['password'] == "" || !isset($_REQUEST['dob']) || $_REQUEST['dob'] == "")
        {
            header("Location: ./crews.php");
            exit();
        }
        $type = (int) $_REQUEST['crew-type'];
        if($type <1 && $type > 2)
        {
            header("Location: ./crews.php");
            exit();
        }

        $firstName = $_REQUEST['first-name'];
        try
        {
            $middleName = $_REQUEST['middle-name'];
        }
        catch(Exception $e)
        {
            $middleName = "";
        }
        $lastName = $_REQUEST['last-name'];
        $phone = (int) $_REQUEST['phone'];
        $password = md5($_REQUEST['password']);
        $dob = $_REQUEST['dob'];
        
        $table = ["driver_master", "conductor_master"];
        $query = "INSERT INTO `".$table[$type - 1]."` SET `first_name` = '$firstName',
                                                          `middle_name` = '$middleName',
                                                          `last_name` = '$lastName',
                                                          `phone` = '$phone',
                                                          `password` = '$password',
                                                          `dob` = '$dob'";
        $data = mysqli_query($connection, $query);
        if($data)
        {
            header("Location: ./crews.php");
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
                <div class="font-28 color-2">Crews</div>
                <div class="font-14 color-2">Manage your driver and conductors here</div>
            </div>
            <div class="flex flex-column gap-32">
                <div class="flex flex-column gap-8">
                    <div class="font-22" style="line-height: 20px;">Crews</div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div class="flex flex-wrap gap-8">
                        <div class="px-16 py-8 font-18 br-8 bs-8 cursor-pointer bg-color-2" onclick="toggleOverlay(0)">Register Crew</div>
                        <a href="crewViewDrivers.php"><div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2">View Drivers</div></a>
                        <a href="crewViewConductors.php"><div class="px-16 py-8 font-18 br-8 bs-8 bg-color-2">View Conductors</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay flex align-center justify-center absolute">
            <form class="base-form flex flex-column gap-16 px-16 py-16 br-8 bs-8" method="POST">
                <div class="font-28 color-1">Add Crew</div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">Crew Type</div>
                    <select class="input-field font-16" name="crew-type">
                        <option value="">Select a crew type</option>
                        <option value="1">Driver</option>
                        <option value="2">Conductor</option>
                    </select>
                </div>
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
    </body>
    <script src="./../js/script.js"></script>
</html>