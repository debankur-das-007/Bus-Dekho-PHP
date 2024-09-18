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

        if($_FILES['geo-json']['name'] == '' || !isset($_REQUEST['from']) || $_REQUEST['from'] == "" || !isset($_REQUEST['to']) || $_REQUEST['to'] == "")
        {
            header("Location: routeCreate.php");
            exit();
        }
        $geoJSON = $_FILES['geo-json'];
        $extension = pathinfo($geoJSON['name'], PATHINFO_EXTENSION);
        if($extension != "geojson")
        {
            header("Location: ./routeCreate.php");
            exit();
        }
        $path = "./../routes/".$geoJSON['name'];
        if(move_uploaded_file($geoJSON['tmp_name'], $path))
        {
            $routeName = pathinfo($geoJSON['name'], PATHINFO_FILENAME);
            $from  = $_REQUEST['from'];
            $to = $_REQUEST['to'];
            $query = "INSERT INTO `route_master` SET `route_name` = '$routeName',
                                                     `from` = '$from',
                                                     `to` = '$to',
                                                     `geojson_path` = '$path'";
            $data = mysqli_query($connection, $query);
            if($data)
            {
                header("Location: ./routeCreate.php");
                exit();
            }
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
            <div style="margin-top: 56px; margin-bottom: 32px;">
                <div class="flex align-center font-28 color-2">Routes >&nbsp;<div class="font-14">Create</div></div>
                <div class="font-14 color-2">Create your routes here</div>
                <div class="font-14 color-2">It is recommended to use a large screen</div>
            </div>
            <iframe class="w100-percent resize-y br-8" height="512px" src="https://brouter.de/brouter-web/#map=11/28.6562/77.2277/standard&profile=car-eco" frameborder="0"></iframe>
            <form class="flex flex-column gap-16" method="POST" enctype="multipart/form-data">
                <div class="flex flex-column gap-8">
                    <div class="font-18">Save Route</div>
                    <div class="font-14">After creating the route export it with the route name and upload it here</div>
                    <input class="input-field font-16" type="file" accept=".geojson" name="geo-json" placeholder="Enter first name">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">From</div>
                    <input class="input-field font-16" type="text" name="from" placeholder="Enter origin location">
                </div>
                <div class="flex flex-column gap-8">
                    <div class="font-18">To</div>
                    <input class="input-field font-16" type="text" name="to" placeholder="Enter destination">
                </div>
                <input class="input-field font-16" type="submit" name="submit">
            </form>
        </div>
    </body>
    <script src="./../js/script.js"></script>
</html>